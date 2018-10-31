<?php

namespace App\Http\Controllers;

use App\Commission;
use App\User;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = Commission::all();

        return view('commission.commission', ['commissions' => $commission]);
    }

    public function accept(Request $request)
    {

        $commission = Commission::find($request->id);
        $commission->accepted_by = session('user')['id'];
        $commission->status = 0;
        $commission->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('commission.commissioncreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commission = $request->all();
        $commission['User_id'] = session('user')['id'];
        Commission::create($commission);
        return redirect('commissions');
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
        $commission = Commission::find($id);
        return view('commission.commissionedit', ['commissions' => $commission]);
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
        $commission = Commission::find($id);
        $commission->setPrice = $request['setPrice'];
        $commission->artTitle = $request['artTitle'];
        $commission->artDesc = $request['artDesc'];

        $commission->save();

        return redirect('/home');
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
