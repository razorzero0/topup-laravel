<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'slug',
        'category_id',
        'name',
        'company',
        'image',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function item(): HasMany
    {
        return $this->hasMany(Item::class, 'product_id', 'id');
    }

    public function popular(): HasOne
    {
        return $this->hasOne(Popular::class, 'product_id', 'id');
    }
}
