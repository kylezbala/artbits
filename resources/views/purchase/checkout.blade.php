@extends('layout.master')

@section('content')
    @include('layout.navbar2')
    <br>
    <br>
    <br>
    <div class="page-index"
         style="background-image: url('assets/img/bg12.jpg'); background-size: cover;">
        <div class="container col-lg-6">
            <div class="row">
                <div class="col-9">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="card-title">Shipping Address</h3>
                                    <h4>The following item will be shipped to this address below</h4>
                                    <h4><b class="text-muted">{{$user->Address}}</b></h4>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="card-title">Checkout</h3>
                            <form action="{{action('CheckoutController@processing')}}" method="post">
                                @csrf
                                <input type="hidden" name="art_id" value="{{$art->id}}">
                                <input type="hidden" name="user_id" value="{{session('user')['id']}}">
                                <p class="text-black-50 text-body"></p>

                                <button class="btn btn-primary" onclick="return confirm('Are you sure?')" type="submit">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection