<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'room_number',
        'price',
        'status',
    ];

    /**
     * Relasi ke tabel properties.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Relasi ke tabel tenants (penghuni).
     */
    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }
}