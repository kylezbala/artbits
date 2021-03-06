@extends('layout.master')
@section('content')
    @include('layout.navbar2')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="main main-raised">
    <form action="{{url('/events/'.$events->id.'/save')}}" method="post">
        @method('PUT')
        @csrf
        <div class="container">
            <br>
            Event Name<input type="text"
                            name="eventName" value="{{$events->eventName}}" class="form-control"></td></tr><br>

            Event Description<input type="text"
                             name="eventDescription" value="{{$events->eventDescription}}" class="form-control"></td></tr><br>

            Event Venue<input type="text"
                              name="eventVenue" value="{{$events->eventVenue}}" class="form-control"></td></tr><br>
            <div class="form-group">
                <label class="label-control">Event Start</label>
                <input type="datetime-local" name="eventStart" class="form-control" value="10/05/2016"/>

            </div>
            <label class="label-control">Event End</label>
            <input type="datetime-local" name="eventEnd" class="form-control" value="10/05/2016"/>
            <br>
            <input type="Submit" name="submit" value="Save Event" class="col-lg-offset-5 btn btn-primary"/>
        </div>
    </form>
    </div>


@endsection