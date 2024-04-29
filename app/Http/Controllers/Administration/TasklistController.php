<?php

namespace App\Http\Controllers\Administration;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\TasklistService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasklist\StoreTasklistRequest;
use App\Http\Requests\Tasklist\UpdateTasklistRequest;
use App\Models\Administration\Tasklist;
use Illuminate\Http\RedirectResponse;

class TasklistController extends Controller
{
    protected string $url = "/administration/tasklist";
    protected TasklistService $service;

    public function __construct(TasklistService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['tasklists'] = $this->service->get_paginated($data['query']);
        return view('pages.administration.tasklist.index', $data);
    }

    public function create(): View
    {
        return view('pages.administration.tasklist.create');
    }

    public function store(StoreTasklistRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->store($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been saved!', 'status' => 'success']);
    }

    public function edit(Tasklist $tasklist): View
    {
        $data['tasklist'] = $tasklist;
        return view('pages.administration.tasklist.edit', $data);
    }

    public function update(Tasklist $tasklist, UpdateTasklistRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->update($tasklist, $formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function delete(Tasklist $tasklist): RedirectResponse
    {
        $this->service->delete($tasklist);

        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }

    public function options(Request $request): string|false
    {
        $query = $request->input('q');
        $data = $this->service->option($query);
        return json_encode($data);
    }
}
