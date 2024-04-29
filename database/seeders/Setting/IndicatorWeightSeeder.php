<?php

namespace Database\Seeders\Setting;

use App\Models\Setting\IndicatorWeight;
use Illuminate\Database\Seeder;

class IndicatorWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndicatorWeight::create([
            'target' => 2,
            'weight_percentage' => 50,
            'late_percentage' => -7,
            'type' => 'Sales'
        ]);
        IndicatorWeight::create([
            'target' => 2,
            'weight_percentage' => 50,
            'late_percentage' => -5,
            'type' => 'Report'
        ]);
    }
}
