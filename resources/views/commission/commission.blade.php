@extends('layout.master')
@include('layout.navbar')
@section('content')
    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('assets/img/bgplain.jpg');">
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
                    @foreach($commissions as $commission)

                        <form action="{{url('/commissions/accept')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$commission->id}}">

                            <div class="col-5">
                                <div class="card shadow" style="width: 19rem;  height: 15rem">
                                    <div class="card-body">
                                        <div class="card-header card-header-primary">
                                            <h5 class="card-title">{{$commission->artTitle}}</h5>
                                        </div>
                                        <p class="card-text">{{$commission->artDesc}}</p>
                                        <p>Request by: <b>{{\App\Users::find($commission->User_id)->Firstname}}</b>
                                        </p>
                                        <p>Date Posted: <b>{{$commission->created_at}}</b></p>
                                        @if($commission->accepted_by != 0)

                                            <p>Accepted by:
                                                <b>{{\App\Users::find($commission->accepted_by)->Firstname}}</b>
                                            </p>

                                        @endif
                                        @if($commission->User_id != session('user')['id'] && $commission->status == 1)
                                            <div class="card-footer pull-right">
                                                <button class="btn btn-round btn-info" type="submit">Accept
                                                    Offer
                                                </button>
                                            </div>
                                        @endif

                                        {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                    </div>

                                    @if($commission->User_id == session('user')['id'])
                                        <div class="card-footer">
                                            <div class="row">

                                                <a class="btn btn-round btn-primary"
                                                   href="{{url('/commissions', $commission->id)}}">Edit</a>
                                            </div>

                                        </div>

                                    @endif
                                </div>
                            </div>
                        </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection