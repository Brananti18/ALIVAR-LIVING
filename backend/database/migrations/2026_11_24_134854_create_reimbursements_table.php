<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();

            // Data pengajuan
            $table->foreignId('admin_id')->constrained('users')->cascadeOnDelete();
            $table->string('category');
            $table->decimal('amount', 15, 2);
            $table->text('description');
            $table->string('receipt_path');

            // Persetujuan Admin
            $table->enum('approval_status', [
                'Menunggu',
                'Disetujui',
                'Ditolak',
            ])->default('Menunggu');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('approved_at')->nullable();

            // Pembayaran oleh Pemilik
            $table->enum('payment_status', [
                'Belum Dibayar',
                'Sudah Dibayar',
            ])->default('Belum Dibayar');
            $table->foreignId('paid_by')->nullable()
                ->constrained('users')->nullOnDelete();
            $table->timestamp('paid_at')->nullable();

            // Konfirmasi dana oleh Admin
            $table->enum('completion_status', [
                'Belum Selesai',
                'Selesai',
            ])->default('Belum Selesai');
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reimbursements');
    }
};
