<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Menampilkan daftar properti dan statistik dashboard.
     */
    public function index()
    {
       $properties = Property::where('user_id', auth()->id())
    ->orderBy('created_at', 'desc')
    ->get();

        // Statistik dihitung dari properti milik pengguna yang login.
        $totalProperties = $properties->count();
        $totalRooms = $properties->sum('total_rooms');
        $occupiedRooms = $properties->sum('occupied_rooms');
        $vacantRooms = $totalRooms - $occupiedRooms;

        return view('dashboard.pemilik', compact(
            'properties',
            'totalProperties',
            'totalRooms',
            'occupiedRooms',
            'vacantRooms'
        ));
    }

    /**
     * Menyimpan properti baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:100'],
            'total_rooms' => ['required', 'integer', 'min:0'],
            'occupied_rooms' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:aktif,maintenance,nonaktif'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($validated['occupied_rooms'] > $validated['total_rooms']) {
            return back()
                ->withErrors([
                    'occupied_rooms' =>
                        'Kamar terisi tidak boleh melebihi total kamar.',
                ])
                ->withInput();
        }

        $validated['user_id'] = $request->user()->id;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('properties', 'public');
        }

        Property::create($validated);

        return redirect()
            ->route('dashboard.pemilik')
            ->with('success', 'Properti berhasil ditambahkan.');
    }

    /**
     * Memperbarui properti yang sudah tersimpan.
     */
    public function update(Request $request, Property $property)
    {
        $this->authorizeProperty($request, $property);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:100'],
            'total_rooms' => ['required', 'integer', 'min:0'],
            'occupied_rooms' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:aktif,maintenance,nonaktif'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($validated['occupied_rooms'] > $validated['total_rooms']) {
            return back()
                ->withErrors([
                    'occupied_rooms' =>
                        'Kamar terisi tidak boleh melebihi total kamar.',
                ])
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $oldImage = $property->image;

            $validated['image'] = $request->file('image')
                ->store('properties', 'public');

            // Hapus foto lama hanya jika tersimpan di Laravel Storage.
            if (
                $oldImage &&
                str_starts_with($oldImage, 'properties/')
            ) {
                Storage::disk('public')->delete($oldImage);
            }
        } else {
            // Foto lama tetap digunakan jika tidak ada foto baru.
            unset($validated['image']);
        }

        $property->update($validated);

        return redirect()
            ->route('dashboard.pemilik')
            ->with('success', 'Properti berhasil diperbarui.');
    }

    /**
     * Menghapus properti yang sudah tersimpan.
     */
    public function destroy(Request $request, Property $property)
    {
        $this->authorizeProperty($request, $property);

        // Hapus foto dari Laravel Storage jika berada di sana.
        if (
            $property->image &&
            str_starts_with($property->image, 'properties/')
        ) {
            Storage::disk('public')->delete($property->image);
        }

        $property->delete();

        return redirect()
            ->route('dashboard.pemilik')
            ->with('success', 'Properti berhasil dihapus.');
    }

    /**
     * Memastikan properti milik pengguna yang sedang login.
     */
    private function authorizeProperty(
        Request $request,
        Property $property
    ): void {
        abort_unless(
            (int) $property->user_id === (int) $request->user()->id,
            403
        );
    }
}
