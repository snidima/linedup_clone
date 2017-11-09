<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {

    }

    public function sendMessage()
    {
        $to = User::find(5);
        $from = User::find(1);
        $message = 'message message message';
        event( new ChatEvent($to, $from, $message) );
    }
}
