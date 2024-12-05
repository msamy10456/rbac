<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends  BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:200',
            'password'=>request()->method('put')? 'nullable|confirmed|min:6' :'required|confirmed|min:6',
            'email'=>'required|email|unique:admins,email,'.request()->route('manager'),
        ];
    }
}
