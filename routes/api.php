<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show']);
Route::post('/teachers/message', [TeacherController::class, 'store']);


Route::get('/subjects', [SubjectController::class, 'index']);
