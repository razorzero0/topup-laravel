<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tripay_reference',
        'method',
        'merchant_ref',
        'amount',
        'total_fee',
        'amount_received',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_items',
        'callback_url',
        'return_url',
        'status',
        'expired_time',
        'pay_url',
        'checkout_url',
        'instructions',
        'qr_url',
    ];


    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class, 'invoice_id', 'id');
    }
}
