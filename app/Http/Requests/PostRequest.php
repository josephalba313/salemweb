<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'featured' => 'image',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'featured.image'  => 'Featured Image must be an image file',
            'content.required' => 'Content is required'
        ];
    }
}
