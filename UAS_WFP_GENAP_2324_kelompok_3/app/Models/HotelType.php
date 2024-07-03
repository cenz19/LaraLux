<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelType extends Model
{
    use HasFactory;

    public function hotels(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Hotel::class, 'hotel_type_id','id');
    }
}
