<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index(Request $request){

        if ($request->has('subject_id')) {
            $teachers = Teacher::with('user','subjects','reviews')->whereHas('subjects', function($q) use ($request){
                $q->where('subject_id', '=', $request->subject_id);
            })->get();
        }else{
            $teachers = Teacher::with('user','subjects','reviews')->get();
        }

        $sponsorships = DB::table('sponsorship_teacher')->get();
        $sponsoredTeacher = [];

        foreach ($teachers as $teacher) {
            foreach ($sponsorships as $sponsor) {
                if ($teacher->id == $sponsor->teacher_id) {
                    array_push($sponsoredTeacher, $teacher);
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => $sponsoredTeacher
        ]);
    }
}
