<?php

namespace Database\Seeders\System\Module;

use Illuminate\Database\Seeder;
use Database\Seeders\System\Module\Support\GeneralSettingSeeder;

class SupportModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GeneralSettingSeeder::class);
    }
}
