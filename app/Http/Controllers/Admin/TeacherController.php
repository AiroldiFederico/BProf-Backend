<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;
use App\Models\Admin\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userId = Auth::id(); //Da qui si ricava l'id dell'utente loggato
        $user = User::find($userId); //Da qui si prendono tutti i record del singolo utente

        $teacher = User::find($userId)->teacher; //Da qui si trovano i record della tabella teacher di un solo utente: quello loggato

        return view('admin.teachers.index', compact('user', 'teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $subjects = Subject::all();
        $city = auth()->user()->city;
        $address = auth()->user()->address;
        $cap = auth()->user()->cap;

        return view('admin.teachers.create', compact('userId', 'subjects', 'city', 'address', 'cap', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
            'phone_number' => 'required|min:10|max:13',       
            'profile_picture' => 'image|mimes:png,jpg,jpeg',
            'city' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'cap' => 'required|max:99999',
            'description' => 'required|min:3|max:255',
            'cv' => 'file|mimes:pdf',
            'price' => 'required|numeric:max:99999999',
            'remote' => 'required|boolean',
            'subjects' => 'required|array|min:1',
            ],
            [
            'phone_number.required' => 'Il numero di telefono è obbligatorio.',
            'phone_number.min' => 'Il numero di telefono deve essere di almeno 10 cifre.',
            'phone_number.max' => 'Il numero di telefono deve essere di massimo 13 cifre.',
            'profile_picture.image' => 'La foto profilo deve deve essere un file immagine.',
            'profile_picture.mimes' => 'La foto profilo deve essere un file PNG, JPEG o JPG.',
            'city.required' => 'La città è obbligatoria.',
            'city.min' => 'Il nome della città deve essere di almeno 3 caratteri.',
            'city.max' => 'Il nome della città deve essere di massimo 255 caratteri.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.min' => 'L\'indirizzo deve essere di almeno 3 caratteri.',
            'address.max' => 'L\'indirizzo deve essere di massimo 255 caratteri.',
            'cap.required' => 'Il CAP è obbligatorio.',
            'cap.max' => 'Il CAP deve essere massimo 99999.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min' => 'La descrizione deve essere di almeno 3 caratteri.',
            'description.max' => 'La descrizione deve essere di massimo 255 caratteri.',
            'cv.file' => 'Il CV deve essere un file.',
            'cv.mimes' => 'Il CV deve essere in formato PDF.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'remote.required' => 'Il lavoro deve essere remoto o meno.',
            'subjects.required' => 'Devi selezionare almeno una materia.',
            ]
        );
        
        $data = $request->all(); //Dati dal form
        // $img_path = Storage::disk('public')->put('uploads', $data['profile_picture']); //Path dell'immagine caricata
        $userId = Auth::id(); //user_id

        if($request->hasFile('profile_picture')){
            $img_path = Storage::disk('public')->put('uploads', $data['profile_picture']);
            $data['profile_picture'] = $img_path;
        } else {
            $data['profile_picture'] = null;
        }

        if($request->hasFile('cv')){
            $cv_path = Storage::disk('public')->put('uploads', $data['cv']);
            $data['cv'] = $cv_path;
        } else {
            $data['cv'] = null;
        }

        $newTeacher = new Teacher();
        $newTeacher->user_id = $userId;
        $newTeacher->phone_number = $data['phone_number'];
        $newTeacher->profile_picture = $data['profile_picture'];
        $newTeacher->city = $data['city'];
        $newTeacher->address = $data['address'];
        $newTeacher->cap = $data['cap'];
        $newTeacher->description = $data['description'];
        $newTeacher->cv = $data['cv'];
        $newTeacher->price = $data['price'];
        $newTeacher->remote = $data['remote'];
        $newTeacher->save();
        

        if ($request->has('subjects')) {
            $newTeacher->subjects()->attach($request->subjects);
        }


        return redirect()->route('teacher.index')->with('success', "Profilo creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::id(); 
        $user = User::find($userId); 
        $teacher = User::find($userId)->teacher;
        $subjects = Subject::all();
        $selectedSubjects = $teacher->subjects;

        return view('admin.teachers.edit', compact('teacher','subjects', 'selectedSubjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {

        $request->validate(
            [
            'phone_number' => 'required|min:10|max:13',
            'profile_picture' => 'image|mimes:png,jpg,jpeg',
            'city' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'cap' => 'required|max:99999',
            'description' => 'required|min:3|max:255',
            'cv' => 'file|mimes:pdf',
            'price' => 'required|numeric:max:99999999',
            'remote' => 'required|boolean',
            'subjects' => 'required|array|min:1',
            ],
            [
            'phone_number.required' => 'Il numero di telefono è obbligatorio.',
            'phone_number.min' => 'Il numero di telefono deve essere di almeno 10 cifre.',
            'phone_number.max' => 'Il numero di telefono deve essere di massimo 13 cifre    .',
            'profile_picture.image' => 'La foto profilo deve deve essere un file immagine.',
            'profile_picture.mimes' => 'La foto profilo deve essere un file PNG, JPEG o JPG.',
            'city.required' => 'La città è obbligatoria.',
            'city.min' => 'Il nome della città deve essere di almeno 3 caratteri.',
            'city.max' => 'Il nome della città deve essere di massimo 255 caratteri.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.min' => 'L\'indirizzo deve essere di almeno 3 caratteri.',
            'address.max' => 'L\'indirizzo deve essere di massimo 255 caratteri.',
            'cap.required' => 'Il CAP è obbligatorio.',
            'cap.max' => 'Il CAP deve essere massimo 99999.',
            'description.required' => 'La descrizione è obbligatoria.',
            'description.min' => 'La descrizione deve essere di almeno 3 caratteri.',
            'description.max' => 'La descrizione deve essere di massimo 255 caratteri.',
            'cv.file' => 'Il CV deve essere un file.',
            'cv.mimes' => 'Il CV deve essere in formato PDF.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero.',
            'remote.required' => 'Il lavoro deve essere remoto o meno.',
            'subjects.required' => 'Devi selezionare almeno una materia.',
            ]
        );

        $data = $request->all();

        $userId = Auth::id(); 
        $user = User::find($userId); 
        $teacher = User::find($userId)->teacher;
        

        if($request->hasFile('profile_picture')){
            $img_path = Storage::disk('public')->put('uploads', $request->profile_picture);
            $data['profile_picture'] = $img_path;
        } else {
            $data['profile_picture'] = $teacher->profile_picture;
        }

        if($request->hasFile('cv')){
            $cv_path = Storage::disk('public')->put('uploads', $request->cv);
            $data['cv'] = $cv_path;
        } else {
            $data['cv'] = $teacher->cv;
        }

        // Rimuovi le materie esistenti associate al docente
        $teacher->subjects()->detach();

        $teacher->subjects()->attach($request->subjects);

        $teacher->user_id = $userId;
        $teacher->phone_number = $data['phone_number'];
        $teacher->profile_picture = $data['profile_picture'];
        $teacher->description = $data['description'];
        $teacher->cv = $data['cv'];
        $teacher->city = $data['city'];
        $teacher->address = $data['address'];
        $teacher->cap = $data['cap'];
        $teacher->price = $data['price'];
        $teacher->remote = $data['remote'];
        $teacher->save();

        return redirect()->route('teacher.index')->with('success', "Profilo modificato con successo");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $userId = Auth::id(); 
        $user = User::find($userId); 
        $teacher = User::find($userId)->teacher;

        $teacher->delete();
        
        if($teacher->profile_picture){
            Storage::delete($teacher->profile_picture);
        }

        return redirect()->route('teacher.index')->with('success', "Profilo eliminato con successo");
    }
}
