<?php

namespace Database\Seeders\System;

use Database\Seeders\System\Subnavbar\AdministrationSubnavbarSeeder;
use Database\Seeders\System\Subnavbar\MasterSubnavbarSeeder;
use Database\Seeders\System\Subnavbar\ReportSubnavbarSeeder;
use Database\Seeders\System\Subnavbar\SettingSubnavbarSeeder;
use Illuminate\Database\Seeder;

class SubnavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General
        $this->call(MasterSubnavbarSeeder::class);
        $this->call(SettingSubnavbarSeeder::class);
        $this->call(AdministrationSubnavbarSeeder::class);
        $this->call(ReportSubnavbarSeeder::class);
    }
}
