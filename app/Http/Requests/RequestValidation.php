<?php

namespace App\Http\Requests;

use App\Rules\uppercase;
use Illuminate\Foundation\Http\FormRequest;

class RequestValidation extends FormRequest
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
            'name'=>new uppercase,
            'founded'=>'required|integer|min:0|max:2022',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpeg|max:5048',
        ];
    }
}
