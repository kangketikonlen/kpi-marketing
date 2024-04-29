<?php

namespace App\Services;

use App\Models\System\ModuleCustom;
use App\Models\System\ModuleCustomUser;

/**
 * Class ModuleCustomUserService.
 */
class ModuleCustomUserService
{
    protected $service;

    public function __construct(ModuleCustomUser $service)
    {
        $this->service = $service::query();
    }

    public function create_module_custom_user(array $formFields, ModuleCustom $moduleCustom)
    {
        foreach ($formFields['user_id'] as $user) {
            $moduleCustomUser['user_id'] = $user;
            $moduleCustomUser['module_custom_id'] = $moduleCustom->id;
            $isExists = $this->service->where($moduleCustomUser)->first();
            if (empty($isExists)) {
                $this->service->create($moduleCustomUser);
            }
        }
    }
}
