<?php

namespace Database\Seeders\System;

use App\Models\System\AppInfo;
use Illuminate\Database\Seeder;

class AppInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppInfo::create([
            'name' => 'KPI Marketing Insight',
            'description' => 'KPI Marketing Insight: Solusi analisis pemasaran dengan antarmuka mudah dan kemampuan analitik yang kuat untuk profesional pemasaran.',
            'dev' => 'Kangketik Dev',
            'dev_url' => 'https://kangketik.online',
            'registered' => 'Kangketik Developer'
        ]);
    }
}
