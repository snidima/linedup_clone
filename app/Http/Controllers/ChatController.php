<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {

    }

    public function auth(Request $request)
    {
        return true;
    }

    public function sendMessage( Request $request )
    {

        if( Auth::user()->id == 5 ) {
            $chat = new Chat;
            $chat->from = 5;
            $chat->to = $chat->chanel = 1;
            $chat->message = $request->input('message');
            $chat->save();
        } else {
            $chat = new Chat;
            $chat->from = $chat->chanel = Auth::user()->id;
            $chat->to = User::find(5)->id;
            $chat->message = $request->input('message');
            $chat->save();
        }


        return response()->json('success');
    }

    public function getMessages()
    {
        $user = Auth::user();
        if( $user->id == 5 )
            $messages = Chat::where('chanel', 1)->get();
        else
            $messages = Chat::where('chanel', $user->id)->get();

        return $messages;
    }
}
