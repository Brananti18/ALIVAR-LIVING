<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

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

        // Ambil penghuni yang belum memiliki kamar (room_id = null)
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
     * Menyimpan kamar baru & sinkronisasi ke penghuni/properti.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => ['required', 'integer', 'exists:properties,id'],
            'room_number' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'status'      => ['required', 'in:tersedia,terisi,maintenance'],
            'tenant_id'   => ['nullable', 'integer', 'exists:tenants,id'],
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

        // Jika penghuni dipilih, pastikan status kamar otomatis terisi
        if (!empty($validated['tenant_id'])) {
            $validated['status'] = 'terisi';
        }

        $room = Room::create([
            'property_id' => $validated['property_id'],
            'room_number' => $validated['room_number'],
            'price'       => $validated['price'],
            'status'      => $validated['status'],
        ]);

        // Tetapkan kamar ke penghuni jika dipilih
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
     * Memperbarui kamar & sinkronisasi ke penghuni/properti.
     */
    public function update(Request $request, Room $room)
    {
        $this->authorizeRoom($room);

        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'status'      => ['required', 'in:tersedia,terisi,maintenance'],
            'tenant_id'   => ['nullable', 'integer', 'exists:tenants,id'],
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

        if (!empty($validated['tenant_id'])) {
            $validated['status'] = 'terisi';
        } elseif ($validated['status'] === 'terisi') {
            $validated['status'] = 'tersedia';
        }

        $room->update([
            'room_number' => $validated['room_number'],
            'price'       => $validated['price'],
            'status'      => $validated['status'],
        ]);

        // Lepas penghuni lama yang menempati kamar ini
        Tenant::where('room_id', $room->id)->update(['room_id' => null]);

        // Tetapkan penghuni baru jika dipilih
        if (!empty($validated['tenant_id'])) {
            Tenant::where('id', $validated['tenant_id'])->update([
                'room_id' => $room->id,
            ]);
        }

        $this->syncPropertyRoomCounts($room->property);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil diperbarui.');
    }

    /**
     * Menghapus kamar & melepaskan penghuni agar kembali ke empty state.
     */
    public function destroy(Room $room)
    {
        $this->authorizeRoom($room);

        $property = $room->property;

        // Pastikan penghuni kembali "tanpa kamar" (room_id = null)
        Tenant::where('room_id', $room->id)->update(['room_id' => null]);

        $room->delete();

        $this->syncPropertyRoomCounts($property);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil dihapus.');
    }

    /**
     * Sinkronisasi jumlah kamar terisi ke tabel properties.
     */
    private function syncPropertyRoomCounts(Property $property): void
    {
        $occupiedCount = $property->rooms()->where('status', 'terisi')->count();
        $totalCount    = $property->rooms()->count();

        $property->update([
            'occupied_rooms' => $occupiedCount,
            'total_rooms'    => max($property->total_rooms, $totalCount),
        ]);
    }

    /**
     * Memastikan kamar milik properti pengguna yang login.
     */
    private function authorizeRoom(Room $room): void
    {
        abort_unless(
            (int) $room->property->user_id === (int) auth()->id(),
            403
        );
    }
}