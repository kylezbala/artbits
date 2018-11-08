@extends('layout.master')
@section('content')
    @include('layout.navbar2')

    <div class="page-header header-filter"
         style="background-image: url('assets/img/nbg.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="card" style="overflow-y: auto;height: 500px">
                <div class="card-body">
                    <div class="card-title"><h3>Messages</h3></div>
                    {{--VALIDATION DISPLAY--}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif

                    @foreach($users as $r)
                        @if($r->sender != session('user')['id'])
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">{{$r->usersender->Firstname}}</div>
                                    <div class="left">{{$r->message}}</div>
                                    <p>{{\Carbon\Carbon::parse($r->created_at)->format('F j, Y - h:i A')}}</p>
                                </div>
                                
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body text-right">
                                    <div class="card-title ">{{$r->usersender->Firstname}}</div>
                                    <p>{{ $r->message }}</p>
                                    <p>{{\Carbon\Carbon::parse($r->created_at)->format('F j, Y - h:i A')}}</p>

                                </div>

                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('message/send')}}" method="post">
                        @csrf
                        {{--VALIDATION DISPLAY--}}
                        <input type="hidden" placeholder="Receiver" name="receiver" value="{{$receiver}}">
                        <input type="hidden" placeholder="Receiver" name="sender" value="{{$sender}}"><br>
                        <textarea name="message" class="form-control"></textarea><br>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection