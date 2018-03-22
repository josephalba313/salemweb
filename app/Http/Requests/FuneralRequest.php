<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuneralRequest extends FormRequest
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
            'name' => 'required',
            'funeral_date' => 'required',
            'death_date' => 'required',
            'birthday' => 'required'
        ];
    }
}
