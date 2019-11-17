<?php

namespace App\Http\Requests\User;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            //
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255'],
            'role' => [
                Rule::in(Role::all()->transform(function($item, $key) {
                    return $item['id'];
                })),
            ],
        ];
    }
}
