@extends('layout.master')
@section('content')
    @include('layout.navbar2')
    <form action="{{URL::to('/upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="page-header header-filter"
             style="background-image: url('assets/img/nbg.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-title"><h3>Post an Art</h3></div>
                        {{--VALIDATION DISPLAY--}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)

                                            {{$error}}<br>


                                @endforeach
                            </div>

                        @endif
                        {{--VALIDATION DISPLAY--}}
                        <h4 style="font-family: Verdana;">Art</h4><input type="file" class="form-control-file"
                                                                         name="Art" id="Art"></td></tr>

                        <h4 style="font-family: Verdana;">Art Title</h4><input type="text" class="form-control"
                                                                               name="artTitle"></td></tr>

                        <h4 style="font-family: Verdana;">Art Description</h4>
                        <textarea class="form-control" type="text" cols="50" rows="10"
                                  name="artDescription"></textarea></td></tr>


                        <h4 style="font-family: Verdana;">Art Price</h4>
                        <textarea class="form-control" type="text" class="form-control-file"
                                  name="price"></textarea></td></tr>


                        <h4 style="font-family: Verdana;">Art Category</h4><select class="form-control"
                                                                                   name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->Name}}</option>
                            @endforeach
                        </select></td></tr>



                        <br/>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button type="Submit" class="btn btn-primary" name="submit" value="Enter information">Submit
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection