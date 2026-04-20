<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surplus-listings()
    {
        return $this->hasMany(surplus-listing::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favouritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favourites');
    }
}
