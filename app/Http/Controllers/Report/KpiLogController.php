<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use App\Services\TasklistService;
use Illuminate\Http\Request;

class KpiLogController extends Controller
{
    protected EmployeeService $employeeService;
    protected TasklistService $tasklistService;

    public function __construct(TasklistService $tasklistService, EmployeeService $employeeService)
    {
        $this->tasklistService = $tasklistService;
    }

    public function index(Request $request)
    {
        $data['performances'] = $this->tasklistService->generate_performance_report();
        $data['performanceChartData'] = $this->tasklistService->generate_performance_report_chart_data();
        $data['tasklistPerformances'] = $this->tasklistService->generate_tasklist_performances_report();
        $data['tasklistPerformanceChartData'] = $this->tasklistService->generate_tasklist_performances_chart();
        return view('pages.report.kpi-log.index', $data);
    }
}
