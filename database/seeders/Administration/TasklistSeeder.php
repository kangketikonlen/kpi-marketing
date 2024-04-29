<?php

namespace Database\Seeders\Administration;

use App\Models\Administration\Tasklist;
use App\Models\Setting\IndicatorWeight;
use Illuminate\Database\Seeder;

class TasklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salesWeight = IndicatorWeight::where('type', 'Sales')->first();
        $reportWeight = IndicatorWeight::where('type', 'Report')->first();

        $count = 1;
        Tasklist::create([
            'employee_id' => 1,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-09",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 1,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-08",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 1,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-07",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 1,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-12",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 2,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-09",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 2,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-09",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 2,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-07",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 2,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-07",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 3,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-12",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 3,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-09",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 3,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-12",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 4,
            'description' => "Tasklist " . $count,
            'indicator' => "Report",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-09",
            'indicator_target' => $reportWeight->target,
            'indicator_weight' => $reportWeight->weight_percentage,
            'indicator_late' => $reportWeight->late_percentage,
        ]);

        $count += 1;
        Tasklist::create([
            'employee_id' => 4,
            'description' => "Tasklist " . $count,
            'indicator' => "Sales",
            'deadline' => "2022-01-10",
            'actual_date' => "2022-01-12",
            'indicator_target' => $salesWeight->target,
            'indicator_weight' => $salesWeight->weight_percentage,
            'indicator_late' => $salesWeight->late_percentage,
        ]);
    }
}
