<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "full_name" => "required|min:5|max:80",
            "email" => "required|min:5|max:80|unique:pending_users",
            "password" => "required|min:8",
            "role" => "required|".Rule::in(["student", "admin", "scheduler"]),
            "status" => "required|".Rule::in(["accepted", "rejected", "pending"])
        ];
    }

    public function messages(): array
    {
        return [
            "full_name.required" => "A teljes név megadása kötelező.",
            "full_name.min" => "A teljes név legalább 5 karakter hosszú kell legyen.",
            "full_name.max" => "A teljes név legfeljebb 80 karakter hosszú lehet.",

            "email.required" => "Az email cím megadása kötelező.",
            "email.min" => "Az email cím legalább 5 karakter hosszú kell legyen.",
            "email.max" => "Az email cím legfeljebb 80 karakter hosszú lehet.",
            "email.unique" => "Ez az email cím már használatban van.",

            "password.required" => "A jelszó megadása kötelező.",
            "password.min" => "A jelszónak legalább 8 karakter hosszúnak kell lennie.",

            "role.required" => "A szerepkör megadása kötelező.",
            "role.in" => "A szerepkör csak student, admin vagy scheduler lehet.",

            "status.required" => "Az állapot megadása kötelező.",
            "status.in" => "Az állapot csak accepted, rejected vagy pending lehet."
        ];
    }
}
