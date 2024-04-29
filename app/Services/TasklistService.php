<?php

namespace App\Services;

use App\Models\Administration\Tasklist;

/**
 * Class TasklistService.
 */
class TasklistService
{
    protected $service;
    protected $indicatorWeightService;

    public function __construct(Tasklist $service, IndicatorWeightService $indicatorWeightService)
    {
        $this->service = $service::query();
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
}
