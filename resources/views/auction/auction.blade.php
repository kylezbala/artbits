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
                        <p>Art by: <b>{{$art->user->Firstname}}&nbsp;{{$art->user->Lastname}}</b></p>
                        <p>Art Price: <b>{{$art->price}}</b></p>
                        <p>Date Posted: <b>{{$art->created_at}}</b></p>
                        @if(\App\Purchase::all()->where('art_id', $art->id)->count() <= 0)
                            <div class="card-footer pull-right">

                                <form action="{{action('CheckoutController@order')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$art->id}}">
                                    <button class="btn btn-success" type="submit">Buy Art</button>
                                </form>


                            </div>
                            <p>Description: <b>{{$art->artDescription}}</b></p>
                        @endif
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection



