<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreScoreRequest extends FormRequest
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
            'year_id' => 'required|exists:years,id',
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
                Rule::unique('scores')->where(function ($query) {
                    return $query->where('year_id', $this->year_id);
                }),
            ],
            'highest_score' => 'required|integer',
            'lowest_score' => 'required|integer',
        ];
    }
}
