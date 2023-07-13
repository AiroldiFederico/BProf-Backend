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
        $userId = Auth::user()->id;
        $user = User::where('user_id', $userId)->get();

        return view('admin.teachers.index', compact('users', 'userId',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher)
    {
        $users = User::All();
        $subject = Subject::All();

        return view('admin.teachers.create', compact('teacher', 'users', 'subject',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $form_data = $request->All();

        if($request->hasFile('profile_picture')){
            $path = Storage::disk('public')->put('photos', $request->profile_picture);

            $form_data['profile_picture'] = $path;
        }

        $new_teacher = new Teacher();
        $new_teacher->fill($form_data);
        
        if($request->has('subjects')){
            $new_teacher->subjects()->attach($request->subjects);
        }
        $new_teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', "Il tuo profilo è stato aggiunto alla piattaforma");
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
