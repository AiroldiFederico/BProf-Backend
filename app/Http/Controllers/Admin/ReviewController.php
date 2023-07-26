<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); //Da qui si ricava l'id dell'utente loggato
        $user = User::find($userId); //Da qui si prendono tutti i record del singolo utente

        $teacher = User::find($userId)->teacher; //Da qui si trovano i record della tabella teacher di un solo utente: quello loggato
        $teacherId = $teacher->id;

        $reviews = Review::with('teacher')->whereHas('teacher', function($q) use ($teacherId){
            $q->where('id','=',$teacherId);
        })->orderBy('created_at', 'desc')->get();

        return view('admin.teachers.reviews', compact('reviews'));
    }

    // Nuova funzione per restituire le recensioni in formato JSON per l'insegnante specificato
    public function getReviewsByTeacherId($teacherId)
    {
        $reviews = Review::where('teacher_id', $teacherId)->orderBy('created_at', 'desc')->get();
        return response()->json(['results' => $reviews]);
    }
}
