<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        if (session('admin')) {
            $item_id = Event::all();
            $users = App\Users::paginate(6);
            return view('admin.dashboard', compact(['events', 'users']));
        }else{
            return redirect('/home');
        }

    }
}
