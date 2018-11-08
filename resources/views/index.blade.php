@extends('layout.master')
@section('content')
    @include('layout.navbar')
    {{-- <div class="index-page"
          style="background-image: url('assets/img/bg12.jpg'); background-size: cover;">--}}

    <div class="page-header header-filter clear-filter" data-parallax="true"
         style="background-image: url('assets/img/bgindex.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        {{--<h1><strong>ARTBITS</strong><img src="./assets/img/cutebits.png"></h1>
                        <h3><strong>IMAGINE, CREATE AND EXHIBIT.</strong></h3>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised bg-dark">
        <div class="container">

                @if($art->count() < 1)
                    <div class="alert alert-danger p-5">There are currently no art entries.</div>
                @else
                <div class="row">
                    @foreach($art as $a)
                        <div class="col-4">
                            <div class="card hovereffect" style="width: 20rem; height: 20rem">
                                <img class="card-img-top" style="object-fit: contain; background-color: white"
                                     src="{{asset('/storage/'.$a->Art)}}" height="220"
                                     alt="">
                                <div class="card-body">
                                    <a href="{{URL::to('/display', $a->id)}}">
                                        <h5 class="card-title">{{$a->artTitle}}</h5>
                                    </a>
                                    <p class="card-text">{{$a->artDescription}}</p>
                                    {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif

        </div>
    </div>
@endsection

{{--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect">
        <img class="img-responsive" src="http://placehold.it/350x200" alt="">
        <div class="overlay">
            <h2>Hover effect 1</h2>
            <a class="info" href="#">link here</a>
        </div>
    </div>
</div>--}}



