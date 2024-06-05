<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateScoreRequest extends FormRequest
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
        {
            // Get the score ID from the route parameter
            $scoreId = $this->route('score');
    
            return [
                'year_id' => 'required|exists:years,id',
                'gender' => [
                    'required',
                    Rule::in(['male', 'female']),
                    Rule::unique('scores')->ignore($scoreId)->where(function ($query) {
                        return $query->where('year_id', $this->year_id);
                    }),
                ],
                'highest_score' => 'required|integer',
                'lowest_score' => 'required|integer',
            ];
        }
    
    }
}
