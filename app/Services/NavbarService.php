<?php

namespace App\Services;

use App\Models\System\Navbar;

/**
 * Class NavbarService.
 */
class NavbarService
{
    protected $service;

    public function __construct(Navbar $service)
    {
        $this->service = $service::query();
    }

    public function get_all_navbars()
    {
        return $this->service->all();
    }
}
