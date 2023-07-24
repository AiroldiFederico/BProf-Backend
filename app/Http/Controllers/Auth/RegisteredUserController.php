<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subject;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $subjects = Subject::all();

        return view('auth.register', compact('subjects'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate(
            [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'city' => ['required', 'string', 'max:255',  'min:3'],
            'address' => ['required', 'string', 'max:255',  'min:3'],
            'cap' => 'required|max:99999',
            'subject' => ['required', 'string', 'max:255', new \App\Rules\SubjValRule()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
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
            'subject.required' => 'La materia è obbligatoria.',
            'subject.string' => 'La materia deve essere una stringa.',
            'subject.max' => 'La materia deve essere di massimo 255 caratteri.',
            'email.required' => 'L\'email è obbligatoria.',
            'email.string' => 'L\'email deve essere una stringa.',
            'email.email' => 'L\'email deve essere un indirizzo email valido.',
            'email.max' => 'L\'email deve essere di massimo 255 caratteri.',
            'email.unique' => 'L\'email è già presente.',
            'password.required' => 'La password è obbligatoria.',
            'password.confirmed' => 'Le password non coincidono.',
            'password.min' => 'La password deve essere di almeno 8 caratteri.',
            'password.max' => 'La password deve essere di massimo 64 caratteri.',
            ]
    
    );
        
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'address' => $request->address,
            'cap' => $request->cap,
            'subject' => $request->subject,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
