<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_pengguna',
        'invoice_id',
        'ref_id',
        'customer_no',
        'customer_phone',
        'buyer_sku_code',
        'status',
        'buyer_last_saldo',
        'sn',
        'price'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kode_pengguna', 'id');
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
}
