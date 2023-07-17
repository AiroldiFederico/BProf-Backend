<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $cities = [
            'Agrigento',
            'Alessandria',
            'Ancona',
            'Aosta',
            'Arezzo',
            'Ascoli Piceno',
            'Asti',
            'Avellino',
            'Bari',
            'Barletta-Andria-Trani',
            'Belluno',
            'Benevento',
            'Bergamo',
            'Biella',
            'Bologna',
            'Bolzano',
            'Brescia',
            'Brindisi',
            'Cagliari',
            'Caltanissetta',
            'Campobasso',
            'Carbonia-Iglesias',
            'Caserta',
            'Catania',
            'Catanzaro',
            'Chieti',
            'Como',
            'Cosenza',
            'Cremona',
            'Crotone',
            'Cuneo',
            'Enna',
            'Fermo',
            'Ferrara',
            'Firenze',
            'Foggia',
            'Forlì-Cesena',
            'Frosinone',
            'Genova',
            'Gorizia',
            'Grosseto',
            'Imperia',
            'Isernia',
            'La Spezia',
            "L'Aquila",
            'Latina',
            'Lecce',
            'Lecco',
            'Livorno',
            'Lodi',
            'Lucca',
            'Macerata',
            'Mantova',
            'Massa-Carrara',
            'Matera',
            'Messina',
            'Milano',
            'Modena',
            'Monza e Brianza',
            'Napoli',
            'Novara',
            'Nuoro',
            'Olbia-Tempio',
            'Oristano',
            'Padova',
            'Palermo',
            'Parma',
            'Pavia',
            'Perugia',
            'Pesaro e Urbino',
            'Pescara',
            'Piacenza',
            'Pisa',
            'Pistoia',
            'Pordenone',
            'Potenza',
            'Prato',
            'Ragusa',
            'Ravenna',
            'Reggio Calabria',
            'Reggio Emilia',
            'Rieti',
            'Rimini',
            'Roma',
            'Rovigo',
            'Salerno',
            'Sassari',
            'Savona',
            'Siena',
            'Siracusa',
            'Sondrio',
            'Taranto',
            'Teramo',
            'Terni',
            'Torino',
            'Trapani',
            'Trento',
            'Treviso',
            'Trieste',
            'Udine',
            'Varese',
            'Venezia',
            'Verbano-Cusio-Ossola',
            'Vercelli',
            'Verona',
            'Vibo Valentia',
            'Vicenza',
            'Viterbo'
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255', 'in:'.implode(',', $cities)],
            'subject' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'subject' => $request->subject,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
