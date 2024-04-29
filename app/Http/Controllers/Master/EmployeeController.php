<?php

namespace App\Http\Controllers\Master;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Master\Employee;

class EmployeeController extends Controller
{
    protected string $url = "/master/employee";
    protected EmployeeService $service;

    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['employees'] = $this->service->get_paginated($data['query']);
        return view('pages.master.employee.index', $data);
    }

    public function create(): View
    {
        return view('pages.master.employee.create');
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->store($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been saved!', 'status' => 'success']);
    }

    public function edit(Employee $employee): View
    {
        $data['employee'] = $employee;
        return view('pages.master.employee.edit', $data);
    }

    public function update(Employee $employee, UpdateEmployeeRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->update($employee, $formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function delete(Employee $employee): RedirectResponse
    {
        $this->service->delete($employee);

        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }

    public function options(Request $request): string|false
    {
        $query = $request->input('q');
        $data = $this->service->option($query);
        return json_encode($data);
    }
}
