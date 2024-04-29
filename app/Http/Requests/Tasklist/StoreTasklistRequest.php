<?php

namespace App\Http\Requests\Tasklist;

use Illuminate\Foundation\Http\FormRequest;

class StoreTasklistRequest extends FormRequest
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
            'employee_id' => 'required',
            'description' => 'required',
            'indicator' => 'required',
            'deadline' => 'required',
            'actual_date' => 'required'
        ];
    }
}