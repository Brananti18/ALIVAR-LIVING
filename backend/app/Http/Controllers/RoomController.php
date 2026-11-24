<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Menampilkan daftar kamar milik pemilik yang login.
     */
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())
            ->with('rooms')
            ->latest()
            ->get();

        $rooms = Room::whereHas('property', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with(['property', 'tenant'])
            ->latest()
            ->get();

        $availableTenants = Tenant::with('user')
            ->whereNull('room_id')
            ->get();

        return view('dashboard.kamar', compact(
            'properties',
            'rooms',
            'availableTenants'
        ));
    }

    /**
     * Menyimpan kamar baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => ['required', 'integer', 'exists:properties,id'],
            'room_number' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'status'      => ['required', 'in:tersedia,terisi,maintenance'],
            'tenant_id'   => ['nullable', 'integer', 'exists:tenants,id'],
            'photo'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $property = Property::where('user_id', auth()->id())
            ->findOrFail($validated['property_id']);

        $exists = Room::where('property_id', $property->id)
            ->where('room_number', $validated['room_number'])
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'room_number' => 'Nomor kamar sudah digunakan di properti ini.',
                ])
                ->withInput();
        }

        if (!empty($validated['tenant_id'])) {
            $validated['status'] = 'terisi';
        }

        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('rooms', 'public')
            : null;

        $room = Room::create([
            'property_id' => $validated['property_id'],
            'room_number' => $validated['room_number'],
            'price'       => $validated['price'],
            'photo'       => $photoPath,
            'status'      => $validated['status'],
        ]);

        if (!empty($validated['tenant_id'])) {
            Tenant::where('id', $validated['tenant_id'])->update([
                'room_id' => $room->id,
            ]);
        }

        $this->syncPropertyRoomCounts($property);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil ditambahkan.');
    }

    /**
     * Memperbarui kamar.
     */
    public function update(Request $request, Room $room)
    {
        $this->authorizeRoom($room);

        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'status'      => ['required', 'in:tersedia,terisi,maintenance'],
            'tenant_id'   => ['nullable', 'integer', 'exists:tenants,id'],
            'photo'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $exists = Room::where('property_id', $room->property_id)
            ->where('room_number', $validated['room_number'])
            ->where('id', '!=', $room->id)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'room_number' => 'Nomor kamar sudah digunakan di properti ini.',
                ])
                ->withInput();
        }

        $tenantId = $validated['tenant_id'] ?? null;

        if ($validated['status'] !== 'terisi') {
            $tenantId = null;
        }

        if ($validated['status'] === 'terisi' && !$tenantId) {
            return back()
                ->withErrors([
                    'tenant_id' => 'Pilih penghuni untuk kamar yang berstatus terisi.',
                ])
                ->withInput();
        }

        // Simpan foto baru jika ada upload.
        $photoPath = $room->photo;

        if ($request->hasFile('photo')) {
            $newPhotoPath = $request->file('photo')->store('rooms', 'public');

            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }

            $photoPath = $newPhotoPath;
        }

        // Lepaskan penghuni lama.
        Tenant::where('room_id', $room->id)
            ->update(['room_id' => null]);

        $room->update([
            'room_number' => $validated['room_number'],
            'price'       => $validated['price'],
            'status'      => $validated['status'],
            'photo'       => $photoPath,
        ]);

        if ($tenantId) {
            Tenant::where('id', $tenantId)->update([
                'room_id' => $room->id,
            ]);
        }

        $this->syncPropertyRoomCounts($room->property);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil diperbarui.');
    }

    /**
     * Menghapus kamar dan melepaskan penghuni.
     */
    public function destroy(Room $room)
    {
        $this->authorizeRoom($room);

        $property = $room->property;

        Tenant::where('room_id', $room->id)
            ->update(['room_id' => null]);

        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }

        $room->delete();

        $this->syncPropertyRoomCounts($property);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil dihapus.');
    }

    /**
     * Sinkronisasi jumlah kamar ke properti.
     */
    private function syncPropertyRoomCounts(Property $property): void
    {
        $occupiedCount = $property->rooms()
            ->where('status', 'terisi')
            ->count();

        $totalCount = $property->rooms()->count();

        $property->update([
            'occupied_rooms' => $occupiedCount,
            'total_rooms'    => max($property->total_rooms, $totalCount),
        ]);
    }

    /**
     * Memastikan kamar milik pemilik yang login.
     */
    private function authorizeRoom(Room $room): void
    {
        abort_unless(
            (int) $room->property->user_id === (int) auth()->id(),
            403
        );
    }
}
