<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
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
    public function messages()
    {
        return [
            'app_name.required'=>'Application name is required.',
            'app_name.max'=>'Name must be up to 50 characters.',
            'puskesmas_image.image'=>'Select an image.',
            'favicon.image'=>'Select an image.',
        ];
    }
    public function rules()
    {
        return [
            'app_name'=>'required|max:50',
            'puskesmas_image'=>'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'favicon'=>'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
        ];
    }
}
