<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurplusListing;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surplusListings()
    {
        return $this->hasMany(SurplusListing::class, 'business_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favouritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favourites');
    }

    protected $fillable = [
        'business_name',
        'business_type',
        'address',
        'city',
        'eircode',
        'email',
        'description',
        'opening_hours',
        'image',
    ];
}
