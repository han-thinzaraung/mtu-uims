<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $yearId = $this->route('year'); // Assuming 'year' is the route parameter

        return [
            'name' => [
                'required',
                Rule::unique('years')->ignore($yearId)->where(function ($query) {
                    return $query->where('semester', $this->semester);
                }),
            ],
            'semester' => [
                'required',
                Rule::in(['semester I', 'semester II']),
                Rule::unique('years')->ignore($yearId)->where(function ($query) {
                    return $query->where('name', $this->name);
                }),
            ],
        ];
    }

}
