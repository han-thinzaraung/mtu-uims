<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResultRequest extends FormRequest
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
            'department_id' => [
                'required',
                'exists:departments,id',
                Rule::unique('results')->ignore($this->result->id)->where(function ($query) {
                    return $query->where('year_id', $this->input('year_id'));
                })
            ],
            'year_id' => [
                'required',
                'exists:years,id',
                Rule::unique('results')->ignore($this->result->id)->where(function ($query) {
                    return $query->where('department_id', $this->input('department_id'));
                })
            ],

        ];
        
    }
    }

