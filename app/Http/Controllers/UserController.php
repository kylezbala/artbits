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

        $request->validate([
            'Lastname' => 'required|string|max:50',
            'Firstname' => 'required|string|max:50',
            'Middlename' => 'required|string|max:50',
            'Username' => 'required|min:5|max:30',
            'Password' => 'required|min:8|max:200',
            'Address' => 'required|min:5|max:500',
            'MobileNo' => 'required||min:11|max:13',
            'Email' => 'required|email|unique'
        ]);

        $user = $request->except('_token');
        $user['role'] = 3;
        Users::create($user);
       return redirect('/home');
    }
}

