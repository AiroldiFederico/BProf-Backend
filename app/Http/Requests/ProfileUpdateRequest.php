<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'city' => ['required', 'string', 'max:255',  'min:3'],
            'address' => ['required', 'string', 'max:255', 'min:3'],
            'cap' => ['required', 'int', 'max:91700'],
            'subject' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
