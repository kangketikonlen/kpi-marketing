<?php

namespace App\Services;

use App\Models\Setting\IndicatorWeight;

/**
 * Class IndicatorWeightService.
 */
class IndicatorWeightService
{
    protected $service;

    public function __construct(IndicatorWeight $service)
    {
        $this->service = $service::query();
    }

    public function get_paginated(string|null $query)
    {
        $this->service->where('type', 'like', '%' . $query . '%');
        return $this->service->paginate(10)->appends(request()->query());
    }

    public function find_by_type(string $type)
    {
        $this->service->where('type', $type);
        return $this->service->first();
    }

    public function store(array $formFields)
    {
        $this->service->create($formFields);
    }

    public function delete(IndicatorWeight $data)
    {
        $data->delete();
    }

    public function option(string|null $query)
    {
        $this->service->select('id', 'type as description');
        return $this->service->where('type', 'like', '%' . $query . '%')->get();
    }
}
