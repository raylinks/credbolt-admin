<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Rules\ValidPassword;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        $availableRoles = [Role::ADMIN, Role::CUSTOMER_SUPPORT, Role::LOAN_RECOVERY_MANAGER,];

        return [
            'name' => 'required|string|min:3', //alpha_dash
            'email' => 'required|email|unique:users|unique:users',
            'password' => ['required', 'string', new ValidPassword()],
            'role' => ['required', 'string', Rule::exists('roles', 'name')->whereIn('name', $availableRoles)->where('is_active', true)],
        ];
    }

}