<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SurplusListing;

class SurplusListingSeeder extends Seeder
{
    public function run(): void
    {
        SurplusListing::factory(100)->create();
    }
}