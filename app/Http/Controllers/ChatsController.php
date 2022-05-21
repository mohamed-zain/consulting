<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        // Show just the users and not the admins as well
        $users = User::where('is_admin', false)->orderBy('id', 'DESC')->get();

        if (auth()->user()->is_admin == false) {
            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        }

        return view('home', [
            'users' => $users,
            'messages' => $messages ?? null
        ]);
    }

    public function show($id) {
//        if (auth()->user()->is_admin == false) {
//            abort(404);
//        }

        $sender = User::findOrFail($id);

        $users = User::with(['message' => function($query) {
            return $query->orderBy('created_at', 'DESC');
        }])->where('is_admin', false)
            ->orderBy('id', 'DESC')
            ->get();

        if (auth()->user()->is_admin == false) {
            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        } else {
            $messages = Message::where('user_id', $sender)->orWhere('receiver', $sender)->orderBy('id', 'DESC')->get();
        }

        return view('show', [
            'users' => $users,
            'messages' => $messages,
            'sender' => $sender,
        ]);
    }
}
