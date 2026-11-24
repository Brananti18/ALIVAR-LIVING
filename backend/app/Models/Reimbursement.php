<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'admin_id',
    'category',
    'amount',
    'description',
    'receipt_path',
    'approval_status',
    'rejection_reason',
    'approved_at',
    'payment_status',
    'paid_by',
    'paid_at',
    'completion_status',
    'completed_at',
])]
class Reimbursement extends Model
{
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'approved_at' => 'datetime',
            'paid_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    // Admin yang mengajukan reimbursement
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Pemilik yang melakukan pembayaran
    public function payer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'paid_by');
    }
}
