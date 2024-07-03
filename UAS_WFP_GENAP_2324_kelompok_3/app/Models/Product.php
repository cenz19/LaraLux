<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function product_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function transactions(): BelongsToMany{
        return $this->belongsToMany(Transaction::class, 'product_transactions','product_id', 'transaction_id')->withPivot('quantity', 'total');
    }
}
