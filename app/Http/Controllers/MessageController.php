<?php

namespace App\Http\Controllers;

use App\Events\MessagePushed;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $user = User::findOrFail($request->get('user'));
        event(new MessagePushed($request->get('message'), $user));
        return response()->json([
            'message' => $request->get('message'),
        ]);
    }
}
