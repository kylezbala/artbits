@extends('layout.master')
@section('content')
    <br>
    <form action="{{URL::to('/register')}}" method="post">
        @csrf
        <br>
        <br>
        <br>
        <div class="main main-raised">
        <div class="container">

            {{--VALIDATION DISPLAY--}}
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)

                        {{$error}}<br>


                    @endforeach
                </div>

            @endif
            {{--VALIDATION DISPLAY--}}

            <br>
            Last Name<input type="text"
                            name="Lastname" class="form-control"></td></tr><br>

            First Name<input type="text"
                             name="Firstname" class="form-control"></td></tr><br>

            Middle Name<input type="text"
                              name="Middlename" class="form-control"></td></tr><br>

            Username<input type="text"
                           name="Username" class="form-control"></td></tr><br>

            Password<input type="password"
                           name="Password" class="form-control"></td></tr><br>


            Gender<select
                    name="Gender" class="form-control">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select></td></tr><br>


            <div class="form-group">
                <label class="label-control">Birth Date</label>
                <input type="date" name="Birthdate" class="form-control" value="10/05/2016"/>
            </div>


            Address<input type="text"
                          name="Address" class="form-control"></td></tr><br>


            Mobile<input type="text" name="MobileNo" class="form-control"><br>

            Email<input type="text"
                        name="Email" class="form-control"></td></tr><br>

            <input type="hidden" name="_token" value="{{ Session::token() }}">

            <input type="Submit" name="submit" value="Create Account" class="col-lg-offset-5 btn btn-primary";/>
        </div>
        </div>

    </form>
    </div>
@endsection

