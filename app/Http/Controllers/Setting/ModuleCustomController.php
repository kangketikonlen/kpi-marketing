<?php

namespace App\Http\Controllers\Setting;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\System\ModuleCustom;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleCustom\StoreModuleCutomRequest;
use App\Http\Requests\ModuleCustom\UpdateModuleCutomRequest;
use App\Http\Requests\ModuleCustomUser\StoreModuleCutomUserRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\ModuleCustomService;
use App\Services\ModuleCustomUserService;
use App\Services\NavbarService;
use App\Services\SubnavbarService;

class ModuleCustomController extends Controller
{
    protected string $url = "/setting/custom-module";
    protected ModuleCustomService $service;
    protected ModuleCustomUserService $moduleCustomUserService;
    protected NavbarService $navbarService;
    protected SubnavbarService $subnavbarService;

    public function __construct(ModuleCustomService $service, ModuleCustomUserService $moduleCustomUserService, NavbarService $navbarService, SubnavbarService $subnavbarService)
    {
        $this->service = $service;
        $this->moduleCustomUserService = $moduleCustomUserService;
        $this->navbarService = $navbarService;
        $this->subnavbarService = $subnavbarService;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['moduleCustoms'] = $this->service->get_paginate_module_custom();
        return view('pages.setting.module-custom.index', $data);
    }

    public function create(): View
    {
        return view('pages.setting.module-custom.create');
    }

    public function store(StoreModuleCutomRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $newModule = $this->service->create_module_custom($formFields);

        return redirect($this->url . '/' . $newModule->id . '/edit')->with('alert', ['message' => 'Data tersimpan, silahkan pilih daftar isi apa saja yang akan ditambahkan!', 'status' => 'success']);
    }

    public function add_user(ModuleCustom $moduleCustom): View
    {
        $data['moduleCustom'] = $moduleCustom;
        return view('pages.setting.module-custom.add-user', $data);
    }

    public function store_user(ModuleCustom $moduleCustom, StoreModuleCutomUserRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->moduleCustomUserService->create_module_custom_user($formFields, $moduleCustom);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function edit(ModuleCustom $moduleCustom): View
    {
        $data['moduleCustom'] = $moduleCustom;
        $data['navs'] = $this->navbarService->get_all_navbars();
        return view('pages.setting.module-custom.edit', $data);
    }

    public function update(ModuleCustom $moduleCustom, UpdateModuleCutomRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->update_module_custom($moduleCustom, $formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function delete(ModuleCustom $moduleCustom): RedirectResponse
    {
        $this->service->delete_module_custom($moduleCustom);

        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }
}
