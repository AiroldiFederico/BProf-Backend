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
            'cap' => ['required', 'int', 'max:99999'],
            'subject' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
        [
            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome deve essere una stringa.',
            'name.max' => 'Il nome deve essere di massimo 255 caratteri.',
            'name.min' => 'Il nome deve essere di almeno 2 caratteri.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'surname.string' => 'Il cognome deve essere una stringa.',
            'surname.max' => 'Il cognome deve essere di massimo 255 caratteri.',
            'surname.min' => 'Il cognome deve essere di almeno 2 caratteri.',
            'city.required' => 'La città è obbligatoria.',
            'city.string' => 'La città deve essere una stringa.',
            'city.max' => 'La città deve essere di massimo 255 caratteri.',
            'city.min' => 'La città deve essere di almeno 3 caratteri.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.string' => 'L\'indirizzo deve essere una stringa.',
            'address.max' => 'L\'indirizzo deve essere di massimo 255 caratteri.',
            'address.min' => 'L\'indirizzo deve essere di almeno 3 caratteri.',
            'cap.required' => 'Il CAP è obbligatorio.',
            'cap.int' => 'Il CAP deve essere un numero.',
            'cap.max' => 'Il CAP deve essere di massimo 99999.',
            'email.required' => 'L\'email è obbligatoria.',
            'email.string' => 'L\'email deve essere una stringa.',
            'email.email' => 'L\'email deve essere un indirizzo email valido.',
            'email.max' => 'L\'email deve essere di massimo 255 caratteri.',
            'email.unique' => 'L\'email deve essere unica.',
        ];
    
    }
}
