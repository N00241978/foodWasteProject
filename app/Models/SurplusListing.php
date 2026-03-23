<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurplusListing extends Model
{
    /** @use HasFactory<\Database\Factories\SurplusListingFactory> */
    use HasFactory;

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
        return $this->hasMany(Order::class, 'listing_id');
    }
}
