<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'type', 'description'];
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
