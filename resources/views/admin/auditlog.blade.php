@extends('layout.master')
@section('content')
    @include('layout.navbar')

    <div class="page-header header-filter clear-filter" data-parallax="true"
         style="background-image: url('assets/img/bgplain.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1 class="display-1 shadow">Audit log</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">

        <div class="section section-basic">

            <div class="container">



                    <div class="title display-2">Audit Log</div>
                    <div class="row">
                        <div class="col-12">
                            <table id="log" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Audit ID</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Activity</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($log as $auditlog)
                                    <tr>
                                        <td>{{$auditlog->id}}</td>
                                        <td>{{$auditlog->user->Firstname}} {{$auditlog->user->Lastname}}</td>
                                        <td>{{$auditlog->created_at}}</td>
                                        <td>{{$auditlog->activity}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

            </div>

        </div>
    </div>
@endsection