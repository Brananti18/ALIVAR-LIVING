<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
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
            ->with('property')
            ->latest()
            ->get();

        return view('dashboard.kamar', compact(
            'properties',
            'rooms'
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
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:tersedia,terisi,maintenance'],
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

        Room::create($validated);

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
            'price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:tersedia,terisi,maintenance'],
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

        $room->update($validated);

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil diperbarui.');
    }

    /**
     * Menghapus kamar.
     */
    public function destroy(Room $room)
    {
        $this->authorizeRoom($room);

        $room->delete();

        return redirect()
            ->route('dashboard.kamar')
            ->with('success', 'Kamar berhasil dihapus.');
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