<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Auditlog;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
//dd(bcrypt($request['Password']));
        $request->validate([
            'Username' => 'required',
            'Password' => 'required'
        ]);
        $user = Users::where('Username', $request['Username'])->first();


        $check = Hash::check($request['Password'], $user->Password);



        if ($check) {

            if ($user->role == 3) {
                if ($user->status == 1) {
                    session(['user' => $user]);
                    //Audit log
                    $audit = new Auditlog();
                    $audit->user_id = session('user')['id'];
                    $audit->activity = 'User has logged In';
                    $audit->save();
                    return redirect('/home');
                } else {

                    return redirect('/login')->with('status', 'Your account is suspended');
                }

            } elseif ($user->role != 3) {
                if ($user->role == 1) {
                    session(['user' => $user]);
                    session(['admin' => 'admin']);



                } else {
                    session(['user' => $user]);
                    session(['admin' => 'eventofficer']);


                }
                //Audit log
                $audit = new Auditlog();
                $audit->user_id = session('user')['id'];
                $audit->activity = 'User has logged In';
                $audit->save();
                return redirect('/admin');
            } else {
                return redirect()->back();
            }

        } else {
            return redirect('/login')->with('status', 'Wrong username or password');
        }


    }
}
