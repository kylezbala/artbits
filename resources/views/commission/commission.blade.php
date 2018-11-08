@extends('layout.master')
@include('layout.navbar')
@section('content')
    <div class="page-header header-filter clear-filter" data-parallax="true"
         style="background-image: url('assets/img/bgplain.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1><strong>C O M M I S S I O N</strong></h1>
                        <h3><strong></strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="main main-raised bg-dark">
        <div class="container">
            <div class="row">
                @if($commissions->count() < 1)
                    <div class="alert alert-danger p-5">There are currently no commission entries.</div>
                @else
                    @foreach($commissions as $commission)
                        <div class="col-4">



                                <div class="card shadow" style=" height: 300px">
                                    <div class="card-header card-header">
                                        <h5 class="card-title">{{$commission->artTitle}}</h5>
                                    </div>
                                    <div class="card-body">

                                        <p class="card-text" style="overflow-wrap:break-word ">{{$commission->artDesc}}</p>
                                        <p>Request by: {{\App\Users::find($commission->User_id)->Firstname}}
                                        </p>
                                        <p>Date Posted: <b>{{$commission->created_at}}</b></p>

                                        @if($commission->accepted_by != 0)

                                            <p>Accepted by:
                                                <b>{{\App\Users::find($commission->accepted_by)->Firstname}}</b>
                                            </p>

                                        @endif
                                        @if($commission->User_id != session('user')['id'] && $commission->status == 1)
                                            <form action="{{url('/commissions/accept')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$commission->id}}">
                                            <button class="btn btn-round btn-info" type="submit">Accept
                                                Offer
                                            </button>
                                            </form>
                                        @endif
                                        {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                        @if($commission->User_id == session('user')['id'])
                                            <a class="btn btn-round btn-primary"
                                               href="{{url('commissions', $commission->id)}}">Edit</a>
                                            @if($commission->accepted_by)
                                                <a class="btn btn-round btn-info"
                                                   href="{{url('message/'.$commission->id.'/'.$commission->accepted_by.'/'.$commission->User_id)}}">Message</a>
                                            @endif
                                        @endif
                                        @if($commission->accepted_by == session('user')['id'])
                                            <a class="btn btn-round btn-info"
                                               href="{{url('message/'.$commission->id.'/'.$commission->User_id.'/'.$commission->accepted_by)}}">Message</a>
                                        @endif
                                    </div>
                                </div>


                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>





@endsection