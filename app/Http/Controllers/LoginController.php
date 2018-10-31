<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guest() && !session('user')) {
            return view('login');
        } else {
            return redirect('home');
        }

    }

    public function store(Request $request)
    {

        $check = Users::all()->where('Username', '=', $request['Username'])->where('Password', '=', $request['Password'])->first();

        if ($check->role == 3) {
            if($check->status == 1){
                session(['user' => $check]);
                return redirect('/home');
            }else{

                return redirect('/login')->with('status', 'Your account is suspended');
            }

        } elseif ($check->role != 3) {
            if($check->role == 1){
                session(['user' => $check]);
                session(['admin' => 'admin']);

                return redirect('/admin');
            }else{
                session(['user' => $check]);
                session(['admin' => 'eventofficer']);

                return redirect('/admin');
            }

        } else {
            return redirect()->back();
        }

    }
}
