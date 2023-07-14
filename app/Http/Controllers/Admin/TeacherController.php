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

        return view('admin.teachers.create', compact('userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $data = $request->all(); //Dati dal form
        $img_path = Storage::disk('public')->put('uploads', $data['profile_picture']); //Path dell'immagine caricata
        $userId = Auth::id(); //user_id

        $newTeacher = new Teacher();
        $newTeacher->user_id = $userId;
        $newTeacher->phone_number = $data['phone_number'];
        $newTeacher->profile_picture = $img_path;
        $newTeacher->description = $data['description'];
        $newTeacher->cv = $data['cv'];
        $newTeacher->price = $data['price'];
        $newTeacher->save();



        return redirect()->route('teacher.index')->with('success', "L'inserzione è stata creata con successo");
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

        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $userId = Auth::id(); 
        $user = User::find($userId); 
        $teacher = User::find($userId)->teacher;

        $teacher->update($data);

        return redirect()->route('teacher.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // if($teacher->profile_picture){
        //     Storage::delete($teacher->profile_picture);
        // }
    }
}
