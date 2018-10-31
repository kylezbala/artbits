@extends('layout.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="main main-raised">
        <form action="{{url('/commission/'.$commissions->id.'/save')}}" method="post">
            @method('PUT')
            @csrf
            <div class="container">
                <br>
                Set Price<input type="text"
                                 name="setPrice" value="{{$commissions->setPrice}}" class="form-control"></td></tr><br>

                Art Title<input type="text"
                                        name="artTitle" value="{{$commissions->artTitle}}" class="form-control"></td></tr><br>

                Art Description<input type="text"
                                  name="artDesc" value="{{$commissions->artDesc}}" class="form-control"></td></tr><br>





                <input type="Submit" name="submit" value="Save Job" class="col-lg-offset-5 btn btn-primary"/>
            </div>
        </form>
    </div>


@endsection