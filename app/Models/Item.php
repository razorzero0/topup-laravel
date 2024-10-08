<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'product_id',
        'price',
        'total_price',
        'buyer_sku_code',
        'status',
        'stock',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function coupon(): HasMany
    {
        return $this->hasMany(Coupon::class, 'item_id', 'id');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image', 'id');
    }
}
