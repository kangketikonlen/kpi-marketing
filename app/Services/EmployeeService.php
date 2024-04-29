<?php

namespace App\Services;

use App\Models\Master\Employee;

/**
 * Class EmployeeService.
 */
class EmployeeService
{
    protected $service;

    public function __construct(Employee $service)
    {
        $this->service = $service::query();
    }

    public function get_paginated(string|null $query)
    {
        $this->service->where('fullname', 'like', '%' . $query . '%');
        return $this->service->paginate(10)->appends(request()->query());
    }

    public function store(array $formFields)
    {
        $this->service->create($formFields);
    }

    public function update(Employee $data, array $formFields)
    {
        $data->update($formFields);
    }

    public function delete(Employee $data)
    {
        $data->delete();
    }

    public function option(string|null $query)
    {
        $this->service->select('id', 'fullname as description');
        return $this->service->where('fullname', 'like', '%' . $query . '%')->get();
    }
}
