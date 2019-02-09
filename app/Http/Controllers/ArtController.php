<?php

namespace App\Http\Controllers;

use App\Art;
use App\Auditlog;
use App\Category;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('upload', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Art' => 'required|mimes:png,jpg,jpeg',
            'artTitle' => 'required|max:100|min:5',
            'artDescription' => 'required|max:500',
            'price' => 'numeric'
        ]);

        $art = $request->all();

        $file1 = $request->file('Art')->getClientOriginalName();
        $request->file('Art')->storeAs('/public', $file1);
        $art['Art'] = $file1;
        $art['user_id'] = session('user')['id'];


        Art::create($art);
        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has added an art';
        $audit->save();


        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
