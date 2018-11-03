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
                                    <h3 class="card-title">Summary of Order</h3>
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Art Name</th>
                                            <th>Seller</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><img src="{{asset('/storage/'.$art->Art)}}" width="200" class="img-fluid" alt="" ></td>
                                            <td>{{$art->artTitle}}</td>
                                            <td>{{$art->user->Firstname}}&nbsp;{{$art->user->Lastname}}</td>
                                            <td>{{number_format($art->price, 0)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="card-title">Place Order</h3>
                            <form action="{{action('CheckoutController@checkout')}}" method="post">
                                @csrf
                                <input type="hidden" name="art_id" value="{{$art->id}}">
                                <input type="hidden" name="user_id" value="{{session('user')['id']}}">
                                <p class="text-black-50 text-body">Please Confirm the transaction by clicking on "Place Order"</p>

                                <button class="btn btn-primary" onclick="return confirm('Are you sure?')" type="submit">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection