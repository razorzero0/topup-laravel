<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function item(): HasMany
    {
        return $this->hasMany(Item::class, 'image', 'id');
    }
    public function banner(): HasMany
    {
        return $this->hasMany(Banner::class, 'image', 'id');
    }
}
