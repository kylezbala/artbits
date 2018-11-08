<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index($id, $receiver, $sender)
    {

        $users = Message::where([
            ['sender', $sender], ['receiver', $receiver]])->orWhere([['sender', $receiver], ['receiver', $sender]])->get();

/*        $users = DB::select('SELECT * FROM `message` where (sender = ? and receiver = ?) or (sender = ? and receiver = ?)', [$sender, $receiver, $receiver, $sender]);*/


        return view('message.message', compact(['receiver', 'users', 'sender'])) ;
    }

    public function send(Request $request)
    {

        $request->validate([
            'message' => 'required|max:300',
        ]);

        $array = $request->all();

        Message::create($array);
        return redirect()->back();
    }
}
