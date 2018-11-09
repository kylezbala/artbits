@extends('layout.master')
@section('content')

    <form action="{{URL::to('/login')}}" method="post">
        @csrf
        <div class="page-header header-filter"
             style="background-image: url('assets/img/nbg.jpg'); background-size: cover; background-position: top center;">


            <div class="container col-4">

                <div class="card card-login">
                    <form class="form" method="post" action="{{url('login')}}">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)

                                    {{$error}}<br>


                                @endforeach
                            </div>

                        @endif

                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Login</h4>
                        </div>
                        @if(session('status'))
                        <div class="alert alert-danger text-center" role="alert">{{session('status')}}</div>
                        @endif
                        <p class="description text-center">Welcome to Artbits</p>
                        <div class="card-body">
                <span class="bmd-form-group"><div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                </div></span>
                            <span class="bmd-form-group"><div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">

                      <i class="material-icons">mail</i>

                    </span>
                  </div>
                  <input type="text" class="form-control" name="Username" placeholder="Username">
                </div></span>
                            <span class="bmd-form-group"><div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="Password" placeholder="Password">
                </div></span>

                        </div>
                        <div class="footer text-center">
                            <div class="container">
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
                                <br>
                                <br>

                                <p align="center">Don't have an account yet? <a style="color: #9DE7D7  ;"
                                                                                href="{{URL::to('/register')}}">Register
                                        here</a>
                            </div>
                        </div>
                    </form>
                </div>
                {{--<div class="card shadow">
                    <div class="card-body">
                        <div class="title">
                            <h3>LOGIN</h3>
                        </div>
                        <h4 >Username</h4><input type="text" class="form-control" name="Username">
                        <h4 >Password</h4><input type="password" class="form-control" name="Password">
                        <p align="center">Don't have an account yet? <a style="color: #9DE7D7  ;" href="{{URL::to('/register')}}">Register here</a>
                            <div class="form-group">

                                <input type="submit" class="btn btn-block btn-success" name="submit" value="Login">

                        </div>

                    </div>
                </div>--}}
            </div>
        </div>
    </form>

@endsection
