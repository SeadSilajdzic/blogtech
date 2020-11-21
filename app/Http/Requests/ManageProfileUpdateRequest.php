<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageProfileUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:25',
            'email' => 'required|email',
            'bio' => 'max:500',
            'facebook' => 'url',
            'instagram' => 'url',
            'linkedin' => 'url',
            'github' => 'url',
            'youtube' => 'url',
        ];
    }
}