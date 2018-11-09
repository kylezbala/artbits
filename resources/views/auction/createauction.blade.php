@extends('layout.master')
@section('content')
    @include('layout.navbar2')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form action="{{url('auction/create')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main main-raised">
            <div class="container-fluid">
                <div class="row">
                    <div class="display-3">
                        Auction
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <div class="container">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)

                                        {{$error}}<br>


                                    @endforeach
                                </div>

                            @endif

                            <br>
                            Event Name<input type="text"
                                             name="eventName" class="form-control"></td></tr><br>

                            Event Description<input type="text"
                                                    name="eventDescription" class="form-control"></td></tr><br>

                            Event Venue<input type="text"
                                              name="eventVenue" class="form-control"></td></tr><br>
                            <div class="form-group">
                                <label class="label-control">Event Date</label>
                                <input type="datetime-local" name="eventDate" class="form-control" value="10/05/2016"/>
                            </div>
                            <br>
                                Bidding Increment<input type="text"
                                                  name="incrementbid" class="form-control"></td></tr><br>


                        </div>
                    </div>
                    <div class="col-6">


                        <div class="card-title"><h3>Make your lot</h3></div>
                        {{--VALIDATION DISPLAY--}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)

                                    {{$error}}<br>


                                @endforeach
                            </div>

                        @endif
                        {{--VALIDATION DISPLAY--}}
                        <h4 >Art</h4><input type="file"
                                                                         class="form-control-file"
                                                                         name="Art" id="Art"></td></tr>

                        <h4 >Art Title</h4><input type="text"
                                                                               class="form-control"
                                                                               name="artTitle"></td></tr>

                        <h4 >Art Description</h4>
                        <textarea class="form-control" type="text" cols="50" rows="10"
                                  name="artDescription"></textarea></td></tr>


                        <h4 >Art Price</h4>
                        <textarea class="form-control" type="text" class="form-control-file"
                                  name="price"></textarea></td></tr>

                        <h4 >Art Bid Price</h4>
                        <textarea class="form-control" type="text" class="form-control-file"
                                  name="openPrice"></textarea></td></tr>

                        <h4 >Art Category</h4><select class="form-control"
                                                                                   name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->Name}}</option>
                            @endforeach
                        </select></td></tr>


                        <br/>

                        <button type="Submit" class="btn btn-primary" name="submit"
                                value="Enter information">Create Auction
                        </button>

                    </div>
                </div>
            </div>


        </div>


    </form>
@endsection