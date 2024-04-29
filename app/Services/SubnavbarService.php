<?php

namespace App\Services;

use App\Models\System\Subnavbar;

/**
 * Class SubnavbarService.
 */
class SubnavbarService
{
    protected $service;

    public function __construct(Subnavbar $service)
    {
        $this->service = $service::query();
    }

    public function find_subnavbar_by_id(int $id)
    {
        return $this->service->find($id);
    }
}
