<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCenter extends Model
{
    /** @use HasFactory<\Database\Factories\DonationCenterFactory> */
    use HasFactory;

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
