<?php

namespace App\Http\Requests\IndicatorWeight;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorWeightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'target' => 'required',
            'weight_percentage' => 'required',
            'late_percentage' => 'required',
            'type' => 'required|unique:indicator_weights,type'
        ];
    }
}
