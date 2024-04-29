<?php

namespace App\Services;

use App\Models\Administration\Tasklist;
use App\Models\Master\Employee;
use App\Models\Setting\IndicatorWeight;

/**
 * Class TasklistService.
 */
class TasklistService
{
    protected $service;
    protected $employeeService;
    protected $indicatorWeightService;

    public function __construct(Tasklist $service, EmployeeService $employeeService, IndicatorWeightService $indicatorWeightService)
    {
        $this->service = $service::query();
        $this->employeeService = $employeeService;
        $this->indicatorWeightService = $indicatorWeightService;
    }

    public function get_paginated(string|null $query)
    {
        $this->service->where('description', 'like', '%' . $query . '%');
        return $this->service->paginate(10)->appends(request()->query());
    }

    public function store(array $formFields)
    {
        $indicatorWeight = $this->indicatorWeightService->find_by_type($formFields['indicator']);
        $formFields['indicator_target'] = $indicatorWeight->target;
        $formFields['indicator_weight'] = $indicatorWeight->weight_percentage;
        $formFields['indicator_late'] = $indicatorWeight->late_percentage;
        $this->service->create($formFields);
    }

    public function update(Tasklist $data, array $formFields)
    {
        $data->update($formFields);
    }

    public function delete(Tasklist $data)
    {
        $data->delete();
    }

    public function option(string|null $query)
    {
        $this->service->select('id', 'description as description');
        return $this->service->where('description', 'like', '%' . $query . '%')->get();
    }

    public function generate_performance_report()
    {
        $salesWeight = IndicatorWeight::where('type', 'Sales')->first();
        $reportWeight = IndicatorWeight::where('type', 'Report')->first();

        return Employee::all()->map(function ($employee) use ($salesWeight, $reportWeight) {
            $salesTasklists = Tasklist::where(['employee_id' => $employee->id, 'indicator' => 'Sales']);
            $salesCount = $salesTasklists->count();

            $salesWeightLate = 0;
            foreach ($salesTasklists->get() as $salesTasklist) {
                if ($salesTasklist->actual_date > $salesTasklist->deadline) {
                    $salesWeightLate += $salesWeight->late_percentage;
                }
            }

            $reportTasklists = Tasklist::where(['employee_id' => $employee->id, 'indicator' => 'Report']);
            $reportCount = $reportTasklists->count();

            $reportWeightLate = 0;
            foreach ($reportTasklists->get() as $reportTasklist) {
                if ($reportTasklist->actual_date > $reportTasklist->deadline) {
                    $reportWeightLate += $reportWeight->late_percentage;
                }
            }

            $sWeight = ($salesCount / $salesWeight->target) * $salesWeight->weight_percentage;
            $rWeight = ($reportCount / $reportWeight->target) * $reportWeight->weight_percentage;

            return [
                'name' => $employee->fullname,
                'sales_target' => $salesWeight->target,
                'sales_actual_target' => $salesCount,
                'sales_achivement' => $salesWeight->weight_percentage * $salesCount,
                'sales_weight' => $sWeight,
                'sales_late' => $salesWeightLate,
                'sales_weight_total' => $sWeight + $salesWeightLate,
                'report_target' => $reportWeight->target,
                'report_actual_target' => $reportCount,
                'report_achivement' => $reportWeight->weight_percentage * $reportCount,
                'report_weight' => $sWeight,
                'report_late' => $reportWeightLate,
                'report_weight_total' => $rWeight + $reportWeightLate,
                'kpi' => ($sWeight + $rWeight) - ($salesWeightLate + $reportWeightLate)
            ];
        });
    }
}
