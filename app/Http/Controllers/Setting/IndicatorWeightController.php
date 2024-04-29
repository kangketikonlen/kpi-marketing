<?php

namespace App\Http\Controllers\Setting;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Setting\IndicatorWeight;
use App\Services\IndicatorWeightService;
use App\Http\Requests\IndicatorWeight\StoreIndicatorWeightRequest;

class IndicatorWeightController extends Controller
{
    protected string $url = "/setting/indicator-weight";
    protected IndicatorWeightService $service;

    public function __construct(IndicatorWeightService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['indicatorWeights'] = $this->service->get_paginated($data['query']);
        return view('pages.setting.indicator-weight.index', $data);
    }

    public function create(): View
    {
        return view('pages.setting.indicator-weight.create');
    }

    public function store(StoreIndicatorWeightRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->store($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been saved!', 'status' => 'success']);
    }

    public function delete(IndicatorWeight $indicatorWeight): RedirectResponse
    {
        $this->service->delete($indicatorWeight);

        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }

    public function options(Request $request): string|false
    {
        $query = $request->input('q');
        $data = $this->service->option($query);
        return json_encode($data);
    }
}
