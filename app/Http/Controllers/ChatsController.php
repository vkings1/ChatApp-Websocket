<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        return view('chats');
    }
    public function fetchmessage()
    {   
        return Message::with('user')->get();
    }
    public function sendmessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'text' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
       
    }
}
