<?php

namespace Database\Seeders;

use App\Models\Administration\Tasklist;
use App\Models\Master\Employee;
use App\Models\Setting\IndicatorWeight;
use App\Models\User;
use App\Models\System\Role;
use App\Models\System\AppInfo;
use App\Models\System\Institution;
use Database\Seeders\Administration\TasklistSeeder;
use Database\Seeders\Master\EmployeeSeeder;
use Database\Seeders\Setting\IndicatorWeightSeeder;
use Database\Seeders\System\AppInfoSeeder;
use Database\Seeders\System\InstitutionSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\System\RoleSeeder;
use Database\Seeders\System\UserSeeder;
use Database\Seeders\System\ModuleSeeder;
use Database\Seeders\System\NavbarSeeder;
use Database\Seeders\System\SubnavbarSeeder;

class DatabaseSeeder extends Seeder
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

        if (Employee::count() == 0) {
            $seeder[] = EmployeeSeeder::class;
        }

        if (IndicatorWeight::count() == 0) {
            $seeder[] = IndicatorWeightSeeder::class;
        }

        if (Tasklist::count() == 0) {
            $seeder[] = TasklistSeeder::class;
        }

        $this->call($seeder);
    }
}
