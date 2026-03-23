<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surplusListing()
    {
        return $this->belongsTo(SurplusListing::class);
        return $this->belongsTo(SurplusListing::class, 'listing_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
