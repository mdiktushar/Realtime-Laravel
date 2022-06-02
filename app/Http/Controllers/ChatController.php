<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\GretingSent;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showChat(Type $var = null)
    {
        return view('chat.show');
    }

    public function messageReceived(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        broadcast(new MessageSent($request->user(), $request->message));
        return response()->json(['Message Broadcasted'], 200);
    }

    public function greetReceived(Request $request, User $user)
    {
        broadcast(new GretingSent($user, "{$request->user()->name} greeted you"));
        broadcast(new GretingSent($request->user(), "You greeted {$user->name}"));
        return "greeting {$user->name} from {$request->user()->name}";
    }
}
