<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    /**
     * Kolom yang boleh diisi melalui mass assignment.
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'location',
        'image',
        'total_rooms',
        'occupied_rooms',
        'status',
    ];

    /**
     * Tipe data atribut properti.
     */
    protected function casts(): array
    {
        return [
            'total_rooms' => 'integer',
            'occupied_rooms' => 'integer',
        ];
    }

    /**
     * Properti dimiliki oleh satu pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Properti memiliki banyak kamar.
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}