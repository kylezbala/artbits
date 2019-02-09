@extends('layout.master')
@include('layout.navbar')
@section('content')


    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('assets/img/bgplain.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1><strong>E V E N T S</strong></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="main main-raised bg-dark">
        <div class="container">

        <div class="row">
            <div class="card-columns">
                @if($events->count() < 1)
                    <div class="alert alert-danger p-5">There are currently no event.</div>
                @else
                @foreach($events as $event)
                    <div class="col-5">
                        <div class="card shadow" style="width: 19rem;  height: 15rem">
                            <div class="card-body">
                            <div class="card-header card-header-primary">
                                <h5 class="card-title">{{$event->eventName}}</h5>
                            </div>
                                <p class="card-text">{{$event->eventDescription}}</p>
                                <p>Event Start: <b>{{\Carbon\Carbon::parse($event->eventStart)->format('F d, Y - h:m')}}</b></p>
                                <p>Event End: <b>{{\Carbon\Carbon::parse($event->eventEnd)->format('F d, Y - h:m')}}</b></p>
                                <p>Date Posted: <b>{{$event->created_at}}</b></p>

                                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            </div>

                            @if($event->user_id == session('user')['id'])
                                <div class="card-footer pull-right">
                                    <a class="btn btn-round btn-primary" href="{{url('/events', $event->id)}}">Edit</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
        <br>
    </div>
    </div>
    </div>








@endsection