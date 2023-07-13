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
        $user = Auth::user();
        $userId = Auth::id();

        return view('admin.teachers.index', compact('user', 'userId'));
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
        //
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
        //
        // if($request->hasFile('profile_picture')){
        //     $path = Storage::disk('public')->put('photos', $request->profile_picture);
        //     if( $teacher->profile_picture ){
        //         Storage::delete($teacher->profile_picture);
        //     }
        //     $form_data['profile_picture'] = $path;
        // }
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
