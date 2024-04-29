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

    public function generate_performance_report_chart_data()
    {
        $salesWeight = IndicatorWeight::where('type', 'Sales')->first();
        $reportWeight = IndicatorWeight::where('type', 'Report')->first();

        $chartData = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'KPI',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => [],
                ],
            ],
        ];

        $employees = Employee::all();
        foreach ($employees as $employee) {
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

            $kpi = ($sWeight + $rWeight) - ($salesWeightLate + $reportWeightLate);

            // Add data to chartData
            $chartData['labels'][] = $employee->fullname;
            $chartData['datasets'][0]['data'][] = $kpi;
        }

        return $chartData;
    }

    public function generate_tasklist_performances_report()
    {
        return Employee::all()->map(function ($employee) {
            $onTimeCount = 0;
            $lateCount = 0;

            // Fetch tasklists for the employee
            $tasklists = Tasklist::where('employee_id', $employee->id)->get();

            foreach ($tasklists as $tasklist) {
                // Calculate the difference between actual and deadline
                $dateDiff = strtotime($tasklist->actual_date) - strtotime($tasklist->deadline);

                // Check if the tasklist is on time or late
                if ($dateDiff >= 0) {
                    $onTimeCount++;
                } else {
                    $lateCount++;
                }
            }

            // Calculate percentages
            $totalCount = count($tasklists);
            $percentOnTime = ($onTimeCount / $totalCount) * 100;
            $percentLate = ($lateCount / $totalCount) * 100;

            return [
                'employee_id' => $employee->id,
                'name' => $employee->fullname,
                'ontime_total' => $onTimeCount,
                'late_total' => $lateCount,
                'ontime_percentage' => $percentOnTime,
                'late_percentage' => $percentLate
            ];
        });
    }

    public function generate_tasklist_performances_chart()
    {
        // Initialize arrays to store data for the chart
        $employeeNames = [];
        $ontimePercentages = [];
        $latePercentages = [];

        // Fetch all employees
        $employees = Employee::all();

        // Iterate through each employee
        foreach ($employees as $employee) {
            $onTimeCount = 0;
            $lateCount = 0;

            // Fetch tasklists for the employee
            $tasklists = Tasklist::where('employee_id', $employee->id)->get();

            // Iterate through each tasklist
            foreach ($tasklists as $tasklist) {
                // Calculate the difference between actual and deadline
                $dateDiff = strtotime($tasklist->actual_date) - strtotime($tasklist->deadline);

                // Check if the tasklist is on time or late
                if ($dateDiff >= 0) {
                    $onTimeCount++;
                } else {
                    $lateCount++;
                }
            }

            // Calculate percentages
            $totalCount = count($tasklists);
            $percentOnTime = ($onTimeCount / $totalCount) * 100;
            $percentLate = ($lateCount / $totalCount) * 100;

            // Store data for the current employee
            $employeeNames[] = $employee->fullname;
            $ontimePercentages[] = $percentOnTime;
            $latePercentages[] = $percentLate;
        }

        // Prepare data in a format suitable for Chart.js
        $chartData = [
            'labels' => $employeeNames,
            'datasets' => [
                [
                    'label' => 'On Time',
                    'data' => $ontimePercentages,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Adjust colors as needed
                    'borderColor' => 'rgba(75, 192, 192, 1)', // Adjust colors as needed
                    'borderWidth' => 1
                ],
                [
                    'label' => 'Late',
                    'data' => $latePercentages,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Adjust colors as needed
                    'borderColor' => 'rgba(255, 99, 132, 1)', // Adjust colors as needed
                    'borderWidth' => 1
                ]
            ]
        ];

        return $chartData;
    }
}
