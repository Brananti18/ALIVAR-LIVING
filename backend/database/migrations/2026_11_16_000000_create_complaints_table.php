<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $t) {
            $t->id();
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $t->string('title');
            $t->string('category')->default('lainnya');
            $t->text('description');
            $t->string('status')->default('pending'); // pending | diproses | selesai
            $t->text('admin_note')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('complaints'); }
};
