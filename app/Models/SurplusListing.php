<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurplusListing extends Model
{
    /** @use HasFactory<\Database\Factories\surplus-listingFactory> */
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

    protected $fillable = [
        'title',
        'description',
        'original_price',
        'discounted_price',
        'quantity_available',
        'pickup_start',
        'pickup_end',
        'status',
    ];
}
