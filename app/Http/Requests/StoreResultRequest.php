<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
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

            return [
                'department_id' => 'required|exists:departments,id|unique:results,department_id,NULL,id,year_id,' . $this->input('year_id'),
                'year_id' => 'required|exists:years,id|unique:results,year_id,NULL,id,department_id,' . $this->input('department_id')
            ];
    }
}
