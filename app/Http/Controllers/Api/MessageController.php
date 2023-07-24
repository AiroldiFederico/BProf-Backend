<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $newMessage = new Message();
        $newMessage->teacher_id = $data['teacher_id'];
        $newMessage->name = $data['name'];
        $newMessage->email = $data['email'];
        $newMessage->message = $data['message'];
        $newMessage->save();

    }
}
