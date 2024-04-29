<?php

namespace Database\Seeders\Master;

use App\Models\Master\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create(['fullname' => 'Budi']);
        Employee::create(['fullname' => 'Adi']);
        Employee::create(['fullname' => 'Rara']);
        Employee::create(['fullname' => 'Doni']);
    }
}
