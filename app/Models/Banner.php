<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image', 'id');
    }
}
