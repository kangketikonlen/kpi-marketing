<?php

namespace Database\Seeders\System;

use App\Models\System\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institution::create([
            'name' => 'Kangketik Developer',
            'address' => 'Komplek Trusmiland Cempaka Blok C No. 48',
            'email' => 'info@kangketik.online',
            'website' => 'https://kangketik.online',
            'appUrl' => 'http://localhost:8000',
            'contact' => '085161284041'
        ]);
    }
}
