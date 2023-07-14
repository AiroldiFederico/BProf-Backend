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
        // $img_path = Storage::disk('public')->put('uploads', $data['profile_picture']); //Path dell'immagine caricata
        $userId = Auth::id(); //user_id

        if($request->hasFile('profile_picture')){
            $img_path = Storage::disk('public')->put('uploads', $data['profile_picture']);
            $data['profile_picture'] = $img_path;
        // }else{
        //     $data['profile_picture'] = 'NULL';
        }

        if($request->hasFile('cv')){
            $cv_path = Storage::disk('public')->put('uploads', $data['cv']);
            $data['cv'] = $cv_path;
        // }else{
        //     $data['cv'] = 'NULL';
        }

        $newTeacher = new Teacher();
        $newTeacher->user_id = $userId;
        $newTeacher->phone_number = $data['phone_number'];
        $newTeacher->profile_picture = $data['profile_picture'];
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
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->all();

        $userId = Auth::id(); 
        $user = User::find($userId); 
        $teacher = User::find($userId)->teacher;
        
        if($request->hasFile('profile_picture')){
            $img_path = Storage::disk('public')->put('uploads', $request->profile_picture);
            if( $teacher->profile_picture ){
                Storage::delete($teacher->profile_picture);
            }
            $data['profile_picture'] = $img_path;
        // } else {
        //     $data['profile_picture'] = 'NULL';
        }

        if($request->hasFile('cv')){
            $cv_path = Storage::disk('public')->put('uploads', $request->cv);
            if( $teacher->cv ){
                Storage::delete($teacher->cv);
            }
            $data['cv'] = $cv_path;
        // } else {
        //      $data['cv'] = 'NULL';
        }

        $teacher->user_id = $userId;
        $teacher->phone_number = $data['phone_number'];
        // $teacher->profile_picture = $data['profile_picture'];
        $teacher->description = $data['description'];
        // $teacher->cv = $data['cv'];
        $teacher->price = $data['price'];
        $teacher->save();

        return redirect()->route('teacher.index');
        
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

        return redirect()->route('teacher.index');
    }
}
