<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityTrackingRequest extends FormRequest
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
     * 
     */
    public function rules(): array
    {
        return [
            'date'                      => 'required|date',
            'time'                      => 'required',
            'exercise_type'             => 'required|string',
            'resting_heart_rate'        => 'required|numeric',
            'max_heart_rate'            => 'required|numeric',
            'recovering_heart_rate'     => 'required|numeric',
            'systolic_pressure'         => 'required|numeric',
            'diastolic_pressure'        => 'required|numeric',
        ];
    }
}
