<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProperties = Property::count();
        $totalRooms = Room::count();
        $totalTenants = Tenant::count();

        $totalAdmins = User::where('role', 'admin')->count();
        $totalOwners = User::where('role', 'pemilik')->count();
        $totalRegularUsers = User::where('role', 'user')->count();

        return view('dashboard.admin', compact(
            'totalUsers',
            'totalProperties',
            'totalRooms',
            'totalTenants',
            'totalAdmins',
            'totalOwners',
            'totalRegularUsers'
        ));
    }

    
    public function users(Request $request)
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'role' => ['nullable', 'in:admin,pemilik,user'],
        ]);

        $query = User::query()
            ->select(['id', 'name', 'email', 'role', 'created_at'])
            ->orderByDesc('created_at');

        if (!empty($validated['q'])) {
            $search = $validated['q'];

            $query->where(function ($builder) use ($search) {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (!empty($validated['role'])) {
            $query->where('role', $validated['role']);
        }

        $users = $query->paginate(10)->withQueryString();

        return view('dashboard.pengguna', compact('users'));
    }


public function monitoring()
{
    $properties = Property::with('user:id,name')
        ->withCount('rooms')
        ->latest()
        ->paginate(10, ['*'], 'properties_page')
        ->withQueryString();

    $rooms = Room::with('property:id,name')
        ->latest()
        ->paginate(10, ['*'], 'rooms_page')
        ->withQueryString();

    $tenants = Tenant::with('room:id,room_number,property_id')
        ->with('room.property:id,name')
        ->latest()
        ->paginate(10, ['*'], 'tenants_page')
        ->withQueryString();

    $totalProperties = Property::count();
    $totalRooms = Room::count();
    $totalTenants = Tenant::count();

    return view('dashboard.monitoring', compact(
        'properties',
        'rooms',
        'tenants',
        'totalProperties',
        'totalRooms',
        'totalTenants'
    ));
}

}
