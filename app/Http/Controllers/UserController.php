<?php

namespace App\Http\Controllers;

use App\Art;
use App\User;
use App\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $art = Art::all();
        return view('index')->with('art', $art);
    }

    public function store(Request $request)
    {
        $user = $request->except('_token');
        $user['role'] = 3;
        Users::create($user);
       return redirect('/home');
    }
}
