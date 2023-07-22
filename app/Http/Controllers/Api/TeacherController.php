<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subject;
use App\Models\Admin\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = Teacher::with('user','subjects')->get();

        if ($request->sort == 'reviews') {

            $teachers = Teacher::with('user','subjects','reviews')->whereHas('subjects', function($q) use ($request){
                $q->where('subject_id', '=', $request->subject_id);
            })->withCount('reviews')->orderBy('reviews_count', 'desc')->get();

        }elseif ($request->sort == 'rating') {
            $teachers = Teacher::with('user','subjects','reviews')->whereHas('subjects', function($q) use ($request){
                $q->where('subject_id', '=', $request->subject_id);
            })->withCount(['reviews as average_rate' => function($q){
                $q->select(DB::raw('coalesce(avg(rate),0)'));
            }])->orderBy('average_rate', 'desc')->get();
        }elseif ($request->has('subject_id')) {
            $teachers = Teacher::with('user','subjects','reviews')->whereHas('subjects', function($q) use ($request){
                $q->where('subject_id', '=', $request->subject_id);
            })->get();
        }

        return response()->json([
            'success' => true,
            'results' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
    }
}
