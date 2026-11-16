<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['tenant_id', 'room_id', 'title', 'category', 'description', 'status', 'admin_note'];

    public function tenant() { return $this->belongsTo(Tenant::class); }
    public function room()   { return $this->belongsTo(Room::class); }
}
