<?php

namespace Database\Seeders\System\Module\Administrator;

use App\Models\System\Module;
use App\Models\System\Navbar;
use Illuminate\Database\Seeder;
use App\Models\System\Subnavbar;

class KpiManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navbars = Navbar::get();
        $subnavbars = Subnavbar::get();
        //
        $count = Module::count() + 1;
        $code = 'mod-' . str_pad(strval($count), 4, "0", STR_PAD_LEFT);
        //
        $navbarArray = [];
        foreach ($navbars as $navbar) {
            if (in_array('kpi', explode(',', $navbar->roles))) {
                $navbarArray[] = $navbar->id;
            }
        }
        $subnavbarArray = [];
        foreach ($subnavbars as $subnavbar) {
            if ($subnavbar->roles === 'kpi') {
                $subnavbarArray[] = $subnavbar->id;
            }
        }
        Module::create([
            'code' => $code,
            'icon' => 'fa-chart-simple',
            'description' => 'KPI Management',
            'url' => '/dashboard/switch?mod=' . $code,
            'navbars' => implode(',', $navbarArray),
            'subnavbars' => implode(',', $subnavbarArray),
            'roles' => 2,
            'role_code' => 'kpi'
        ]);
    }
}
