<?php

namespace App\Http\Controllers;

use App\Auditlog;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all()->where('status', 1);
        return view('event.event', ['events' => $event]);
    }


    public function create()
    {
        return view('event.eventcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([
                'eventName' => 'required|max:100|min:5',
                'eventDescription' => 'required|max:100|min:5',
                'eventVenue' => 'required|max:100|min:5'
            ]);


        $event = $request->all();
        $event['user_id'] = session('user')['id'];
        $event['status'] = 2;
        $event['type'] = 1;
        $event['personIncharge'] = 'manager';
        Event::create($event);

        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has created an event';
        $audit->save();
        return redirect('events');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.eventedit', ['events' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->eventName = $request['eventName'];
        $event->eventDescription = $request['eventDescription'];
        $event->eventVenue = $request['eventVenue'];
        $event->eventStart = $request['eventStart'];
        $event->eventEnd = $request['eventEnd'];

        $event->save();

        //Audit log
        $audit = new Auditlog();
        $audit->user_id = session('user')['id'];
        $audit->activity = 'User has updated an event';
        $audit->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
