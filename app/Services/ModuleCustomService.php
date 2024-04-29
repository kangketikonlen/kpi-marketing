<?php

namespace App\Services;

use App\Services\SubnavbarService;
use App\Models\System\ModuleCustom;

/**
 * Class ModuleCustomService.
 */
class ModuleCustomService
{
    protected $service;
    protected SubnavbarService $subnavbarService;

    public function __construct(ModuleCustom $service, SubnavbarService $subnavbarService)
    {
        $this->service = $service::query();
    }

    public function get_paginate_module_custom()
    {
        return $this->service->paginate(10)->appends(request()->query());
    }

    public function create_module_custom(array $formFields)
    {
        $countData = $this->service->count();
        $code = "TSK-" . str_pad($countData + 1, 4, '0', STR_PAD_LEFT);

        $moduleData['code'] = $code;
        $moduleData['icon'] = "fa-list";
        $moduleData['url'] = '/dashboard/switch-task?code=' . $code;
        $moduleData['description'] = $formFields['description'];
        return $this->service->create($moduleData);
    }

    public function update_module_custom(ModuleCustom $moduleCustom, array $formFields)
    {
        $navbars = [];

        foreach ($formFields['subnavbars'] as $subnavbar) {
            $subnavbar = $this->subnavbarService->find_subnavbar_by_id($subnavbar);
            if (!in_array($subnavbar->navbar_id, $navbars)) {
                $navbars[] = $subnavbar->navbar_id;
            }
        }

        $formFields['navbars'] = implode(",", $navbars);
        $formFields['subnavbars'] = implode(",", $formFields['subnavbars']);

        $moduleCustom->update($formFields);
    }

    public function delete_module_custom(ModuleCustom $moduleCustom)
    {
        $moduleCustom->delete();
    }
}
