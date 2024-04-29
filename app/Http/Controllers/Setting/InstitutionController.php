<?php

namespace App\Http\Controllers\Setting;

use Illuminate\View\View;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\System\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Institution\UpdateInstitutionRequest;
use App\Services\InstitutionService;

class InstitutionController extends Controller
{
    protected string $url = "/setting/institution";
    protected InstitutionService $service;

    public function __construct(InstitutionService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $data['institution'] = $this->service->get_single_instititution();
        return view('pages.setting.institution.index', $data);
    }

    public function update(UpdateInstitutionRequest $request): RedirectResponse
    {
        $formFields = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = '/storage/images/logo/';
            $real_path = 'public/images/logo/';

            $formFields['logo'] = $this->service->convert_image($file, $real_path, $path, 150, 150);
        }

        if ($request->hasFile('background')) {
            $file = $request->file('background');
            $path = '/storage/images/background/';
            $real_path = 'public/images/background/';

            $formFields['background'] = $this->service->convert_image($file, $real_path, $path, 1920, 1080);
        }

        $this->service->update_institution($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'warning']);
    }
}
