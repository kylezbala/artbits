@extends('layout.master')
@section('content')
    @include('layout.navbar')
    <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('assets/img/bgplain.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1><strong>MY PROFILE</strong></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised bg-dark">
    <div class="container">
        <div class="row">
            <div class="card-deck">
                @foreach($art as $a)
                    <div class="col-4">
                        <div class="card hovereffect" style="width: 20rem; height: 18rem">
                            <img class="card-img-top" src="{{asset('/storage/'.$a->Art)}}" height="210"
                                 alt="Card image cap">
                            <div class="card-body">
                                <a href="{{URL::to('/display', $a->id)}}"><h5 class="card-title">{{$a->artTitle}}</h5>
                                </a>
                                <p class="card-text">{{$a->artDescription}}</p>
                                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection
