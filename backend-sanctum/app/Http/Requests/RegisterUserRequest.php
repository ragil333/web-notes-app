<?php

namespace App\Http\Requests;

use App\Models\UserRoleModel;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
        if ($this->request->has('kode_role')) {
            $role = UserRoleModel::where('kode_role', $this->request->get('kode_role'))->pluck('id')->first();
            $this->merge([
                'id_role' => $role,
            ]);
        }

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'id_role' => '',
            'kode_role' => 'required|exists:user_role,kode_role'
        ];
    }
}
