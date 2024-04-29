<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\System\Role;
use App\Models\System\AppInfo;
use Illuminate\Database\Seeder;
use App\Models\System\Institution;
use Database\Seeders\System\RoleSeeder;
use Database\Seeders\System\UserSeeder;
use Database\Seeders\System\ModuleSeeder;
use Database\Seeders\System\NavbarSeeder;
use Database\Seeders\System\AppInfoSeeder;
use Database\Seeders\System\SubnavbarSeeder;
use Database\Seeders\System\InstitutionSeeder;

class TestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeder = [];

        if (Role::count() == 0) {
            $seeder[] = RoleSeeder::class;
        }

        if (User::count() == 0) {
            $seeder[] = UserSeeder::class;
        }

        $seeder[] = NavbarSeeder::class;
        $seeder[] = SubnavbarSeeder::class;
        $seeder[] = ModuleSeeder::class;

        if (AppInfo::count() == 0) {
            $seeder[] = AppInfoSeeder::class;
        }

        if (Institution::count() == 0) {
            $seeder[] = InstitutionSeeder::class;
        }

        $this->call($seeder);
    }
}
