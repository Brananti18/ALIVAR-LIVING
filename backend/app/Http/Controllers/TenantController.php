<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TenantController extends Controller
{
    /**
     * Menampilkan penyewa milik pemilik yang sedang login.
     */
    public function index()
    {
        $userId = auth()->id();

        $properties = Property::where('user_id', $userId)
            ->with('rooms')
            ->latest()
            ->get();

        $propertyIds = $properties->pluck('id');

        $rooms = Room::whereIn('property_id', $propertyIds)
            ->with('property')
            ->orderBy('room_number')
            ->get();

        $tenants = Tenant::where('user_id', $userId)
            ->with('room.property')
            ->latest()
            ->get();

        return view('dashboard.penyewa', compact(
            'properties',
            'rooms',
            'tenants'
        ));
    }

    /**
     * Menyimpan penyewa baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'identity_number' => ['nullable', 'string', 'max:50'],
            'move_in_date' => ['nullable', 'date'],
            'move_out_date' => ['nullable', 'date', 'after_or_equal:move_in_date'],
            'status' => ['required', Rule::in(['aktif', 'keluar'])],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $room = Room::whereKey($validated['room_id'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->firstOrFail();

        if ($validated['status'] === 'aktif') {
            $alreadyOccupied = Tenant::where('room_id', $room->id)
                ->where('status', 'aktif')
                ->exists();

            if ($alreadyOccupied) {
                return back()
                    ->withErrors([
                        'room_id' => 'Kamar ini sudah memiliki penyewa aktif.',
                    ])
                    ->withInput();
            }
        }

        $validated['user_id'] = auth()->id();

        Tenant::create($validated);

        return redirect()
            ->route('dashboard.penyewa')
            ->with('success', 'Penyewa berhasil ditambahkan.');
    }

    /**
     * Memperbarui data penyewa.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $this->authorizeTenant($tenant);

        $validated = $request->validate([
            'room_id' => ['required', 'integer', 'exists:rooms,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'identity_number' => ['nullable', 'string', 'max:50'],
            'move_in_date' => ['nullable', 'date'],
            'move_out_date' => ['nullable', 'date', 'after_or_equal:move_in_date'],
            'status' => ['required', Rule::in(['aktif', 'keluar'])],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $room = Room::whereKey($validated['room_id'])
            ->whereHas('property', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->firstOrFail();

        if ($validated['status'] === 'aktif') {
            $alreadyOccupied = Tenant::where('room_id', $room->id)
                ->where('status', 'aktif')
                ->where('id', '!=', $tenant->id)
                ->exists();

            if ($alreadyOccupied) {
                return back()
                    ->withErrors([
                        'room_id' => 'Kamar ini sudah memiliki penyewa aktif.',
                    ])
                    ->withInput();
            }
        }

        $tenant->update($validated);

        return redirect()
            ->route('dashboard.penyewa')
            ->with('success', 'Data penyewa berhasil diperbarui.');
    }

    /**
     * Menghapus penyewa.
     */
    public function destroy(Tenant $tenant)
    {
        $this->authorizeTenant($tenant);

        $tenant->delete();

        return redirect()
            ->route('dashboard.penyewa')
            ->with('success', 'Data penyewa berhasil dihapus.');
    }

    /**
     * Memastikan penyewa milik pemilik yang sedang login.
     */
    private function authorizeTenant(Tenant $tenant): void
    {
        abort_unless(
            (int) $tenant->user_id === (int) auth()->id(),
            403
        );
    }
}
