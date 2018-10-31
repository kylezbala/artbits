@extends('layout.master')
@section('content')
    @include('layout.navbar2')
    <br>
    <br>
    <br>
    <br>
    <br>

    <form action="{{url('/commissions')}}" method="post">
        @csrf
        <br>
        <br>
        <br>
        <div class="main main-raised">
            <div class="container">
                <br>
                Art Request Price<input type="text"
                                        name="setPrice" class="form-control"></td></tr><br>

                Art Request Title<input type="text"
                                        name="artTitle" class="form-control"></td></tr><br>

                Art Request Description<input type="text"
                                              name="artDesc" class="form-control"></td></tr><br>

                <input type="hidden" name="_token" value="{{ Session::token() }}">

                <input type="Submit" name="submit" value="Create Job" class="col-lg-offset-5 btn btn-primary"/>
            </div>
        </div>
    </form>


@endsection