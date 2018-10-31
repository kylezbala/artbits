@extends('layout.master')
@section('content')
    @include('layout.navbar2')

    <br>
    <br>
    <br>


    <div class="page-index"
         style="background-image: url('assets/img/bg12.jpg'); background-size: cover;">
    <div class="container col-lg-6" style="width: 30%;">


        <div class="card shadow">
            <img src="{{asset('/storage/'. $art->Art)}}" class="card-img-top" height="350">
            <div class="card-body">


                <div class="card-title">
                    <p>Title: <b>{{$art->artTitle}}</b></p>
                    <p>Art by: <b>{{\App\Users::find($art->user_id)->Firstname}}</b></p>
                    <p>Date Posted: <b>{{$art->created_at}}</b></p>

                    <div class="card-footer pull-right">
                        <a class="btn btn-round btn-primary" href="{{url('/home')}}">Buy</a>
                </div>
                <p>Description: <b>{{$art->artDescription}}</b></p>
            </div>
                <br>
                <div id="sliderRegular" class="slider"></div>
        </div>
    </div>
    </div>
    </div>

@endsection



