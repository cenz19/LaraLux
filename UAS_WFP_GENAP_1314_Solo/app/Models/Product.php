<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function facilities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Facility::class, 'product_id','id');
    }

    public function hotel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
