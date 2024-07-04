<?php

namespace App\Http\Controllers;

use App\Events\TestMessage;
use Illuminate\Http\Request;
use Illuminate\Mail\TextMessage;

class WsBroadcastTest extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        broadcast(new TestMessage($message))->toOthers();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
