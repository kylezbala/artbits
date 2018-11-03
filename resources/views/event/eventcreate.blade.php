@extends('layout.master')
@section('content')
@include('layout.navbar2')
<br>
<br>
<br>
<br>
<br>

    <form action="{{url('/events')}}" method="post">
        @csrf
        <br>
        <br>
        <div class="main main-raised">
        <div class="container">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)

                        {{$error}}<br>


                    @endforeach
                </div>

            @endif

            <br>
            Event Name<input type="text"
                            name="eventName" class="form-control"></td></tr><br>

            Event Description<input type="text"
                             name="eventDescription" class="form-control"></td></tr><br>

            Event Venue<input type="text"
                              name="eventVenue" class="form-control"></td></tr><br>
            <div class="form-group">
                <label class="label-control">Event Date</label>
                <input type="datetime-local" name="eventDate" class="form-control" value="10/05/2016"/>
            </div>
            <br>

            <input type="hidden" name="_token" value="{{ Session::token() }}">

            <input type="Submit" name="submit" value="Create Event" class="col-lg-offset-5 btn btn-primary"/>
        </div>
        </div>

    </form>


@endsection