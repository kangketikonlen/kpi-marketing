<?php

namespace Database\Seeders\System\Module;

use Database\Seeders\System\Module\Administrator\KpiManagementSeeder;
use Illuminate\Database\Seeder;

class AdministratorModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(KpiManagementSeeder::class);
    }
}
