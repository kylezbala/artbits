<?php

namespace App\Http\Controllers;

use App\Auditlog;
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

        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has accepted an art commission';
        $audit->save();
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
        $request->validate([
            'setPrice' => 'required|numeric',
            'artTitle' => 'required|max:100|min:5',
            'artDesc' => 'required|max:500'
        ]);
        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has created an art request';
        $audit->save();

        $commission = $request->all();
        $commission['status'] = 1;
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

        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has updated an art request';
        $audit->save();

        return redirect('/commissions');
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
