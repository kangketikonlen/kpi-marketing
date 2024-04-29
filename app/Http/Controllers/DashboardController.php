<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\System\Module;
use App\Models\System\ModuleCustom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard.superadmin');
    }

    public function administrator(): View
    {
        return view('pages.dashboard.administrator');
    }

    public function task(): View
    {
        return view('pages.dashboard.task');
    }

    public function switch(Request $request): RedirectResponse
    {
        $module = Module::where('code', $request->get('mod'))->first();
        if (!empty($module)) {
            $session = array(
                'code' => $module->id,
                'module_name' => $module->description,
                'role_navbars' => $module->navbars,
                'role_subnavbars' => $module->subnavbars,
                'role_url' => '/dashboard/task',
                'role_page' => 0,
                'additional_page' => 1
            );

            Session::put($session);

            return redirect($session['role_url'])->with('alert', ['status', 'success', 'message' => "Session changed!"]);
        }
        return redirect('/')->with('alert', ['status', 'danger', 'message' => "Session failed to change!"]);
    }

    public function switch_task(Request $request): RedirectResponse
    {
        $module = ModuleCustom::where('code', $request->get('code'))->first();
        if (!empty($module)) {
            $session = array(
                'code' => $module->id,
                'module_name' => $module->description,
                'role_navbars' => $module->navbars,
                'role_subnavbars' => $module->subnavbars,
                'role_url' => '/dashboard/task',
                'role_page' => 0,
                'additional_page' => 1
            );

            Session::put($session);

            return redirect($session['role_url'])->with('alert', ['status', 'success', 'message' => "Session changed!"]);
        }
        return redirect('/')->with('alert', ['status', 'danger', 'message' => "Session failed to change!"]);
    }

    public function reset(): RedirectResponse
    {
        $user = auth()->user();
        $session = array(
            'role_id' => $user?->role_id,
            'role_name' => $user?->roles?->name,
            'role_description' => $user?->roles?->description,
            'role_url' => $user?->roles?->dashboard_url,
            'role_page' => $user?->roles?->is_landing,
            'module_name' => null,
            'role_navbars' => null,
            'role_subnavbars' => null,
            'additional_page' => 0
        );
        Session::put($session);
        return redirect('/')->with('alert', ['status', 'success', 'message' => "Session changed!"]);
    }
}
