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
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            You have successfully purchased the item!

                            You may now deposit your payment in our Bank Account:
                            <br>
                            BPI:
                            <br>
                            Account Name:
                            ArtBits
                            <br>
                            Account Number:
                            2779 1405 15

                        </div>
                        <div class="card-footer">
                            <div class="justify-content-end">
                                <a href="{{url('/home')}}" class="btn btn-success">Done</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div>
@endsection