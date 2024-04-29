<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Support\Str;
use App\Models\System\AppInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    protected string $url = "/administration/maintenance";

    public function index(): View
    {
        $data['appInfo'] = AppInfo::first();
        return view('pages.administration.maintenance.index', $data);
    }

    public function process(): RedirectResponse
    {
        $randomSecret = Str::random(32);
        $appInfo = AppInfo::first();

        if (app()->isDownForMaintenance()) {
            Artisan::call('up');
            $data['is_maintenance'] = 0;
            $message = "Maintenance mode is now OFF.";
            $appInfo?->update($data);
        } else {
            Artisan::call('down --secret=' . $randomSecret);
            $data['is_maintenance'] = 1;
            $message = "Maintenance mode is now ON.";
            $appInfo?->update($data);
            return redirect($randomSecret)->with('alert', ['message' => $message, 'status' => 'danger']);
        }

        return redirect($this->url)->with('alert', ['message' => $message, 'status' => 'danger']);
    }
}
