<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $user = auth()->user()->name;

        return view('admin.teachers.dashboard', compact('user'));
    }
}
