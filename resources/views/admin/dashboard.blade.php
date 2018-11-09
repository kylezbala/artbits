@extends('layout.master')
@section('content')
    @include('layout.navbar')

    <div class="page-header header-filter clear-filter" data-parallax="true"
         style="background-image: url('assets/img/bgplain.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1 class="display-1 shadow">Dashboard</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">

        <div class="section section-basic">

            <div class="container">


                @if(session('admin') == 'eventofficer')
                    <div class="title display-2">Events</div>
                    <div class="row">
                        <div class="col-12">
                            <table id="events" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Event Name</th>
                                    <th>Event Description</th>
                                    <th>Venue</th>
                                    <th>Event Date</th>
                                    <th>Person in Charge</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{$event->id}}</td>
                                        <td>{{$event->eventName}}</td>
                                        <td>{{$event->eventDescription}}</td>
                                        <td>{{$event->eventVenue}}</td>
                                        <td>{{$event->eventDate}}</td>
                                        <td>{{$event->personIncharge}}</td>
                                        <td>
                                            @if($event->status == 2)
                                                <div class="badge badge-warning">Pending</div>
                                            @elseif($event->status == 0)
                                                <div class="badge badge-danger">Inactive</div>
                                            @else
                                                <div class="badge badge-success">Active</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($event->status == 2 || $event->status == 1)
                                                <form action="{{url('change_status')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="type" value="event">
                                                    <input type="hidden" name="id" value="{{$event->id}}">

                                                    @if($event->status == 2)
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                                onclick="return confirm('Are you sure?')">Approve Event
                                                        </button>
                                                    @elseif($event->status == 1)
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure?')">Suspend Event
                                                        </button>
                                                    @endif

                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                @elseif(session('admin') == 'admin')
                    <div class="title display-2" id="users">Users</div>
                    <div class="row">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{$user->id}}</td>
                                    <td>{{$user->Firstname}}</td>
                                    <td>{{$user->Lastname}}</td>
                                    <td>{{$user->Email}}</td>
                                    <td>{{$user->Gender == 1 ? 'Male' : 'Female'}}</td>

                                    <td>
                                        @if($user->status == 0)
                                            <div class="badge badge-danger">Inactive</div>
                                        @else
                                            <div class="badge badge-success">Active</div>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{url('change_status')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="hidden" name="type" value="user">
                                            <button type="submit" class="btn btn-sm btn-info">Change Status</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                @endif
            </div>
            <br>
        </div>
    </div>




@endsection