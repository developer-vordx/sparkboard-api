<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Utils\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdatePasswordRequest extends BaseRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed|different:password',
        ];
    }
}
