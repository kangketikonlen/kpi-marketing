<?php

namespace App\Services;

use App\Models\System\Institution;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class InstitutionService.
 */
class InstitutionService
{
    protected $service;

    public function __construct(Institution $service)
    {
        $this->service = $service::query();
    }

    public function get_single_instititution()
    {
        return $this->service->first();
    }

    public function convert_image($file, $real_path, $path, $height, $width)
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $filename = 'image-' . date("ymdhis") . '.' . $file->getClientOriginalExtension();
        $file->storeAs($real_path, $filename);
        $image_path = $path . $filename;

        // Resize the image
        $image = Image::make(public_path($image_path));
        $image->resize($height, $width);
        $image->save();

        return $image_path;
    }

    public function update_institution(array $formField)
    {
        $this->get_single_instititution()->update($formField);
    }
}
