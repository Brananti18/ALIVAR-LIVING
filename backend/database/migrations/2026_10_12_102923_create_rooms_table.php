
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel kamar.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            // Relasi kamar ke properti.
            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            // Nomor kamar dan harga sewa.
            $table->string('room_number');
            $table->unsignedBigInteger('price');

            // Status kamar.
            $table->enum('status', [
                'tersedia',
                'terisi',
                'maintenance',
            ])->default('tersedia');

            $table->timestamps();

            // Nomor kamar tidak boleh duplikat dalam satu properti.
            $table->unique(['property_id', 'room_number']);
        });
    }

    /**
     * Menghapus tabel kamar jika migration dibatalkan.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
