<?php

namespace App\Http\Requests;

use App\Core\Enums\PriorityEnum;
use App\Core\Enums\StatusEnum;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends  BaseFormRequest
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
            'name' => 'required|string|max:200',
            'permissions'=>'required|array|min:1',
            'permissions.*'=>'required|exists:permissions,id'

        ];
    }
}
