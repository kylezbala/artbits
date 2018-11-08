{{--<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand profile-photo"href="{{URL::to('/home')}}"><img src="./assets/img/cutebits.png">A R T  B I T S</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-nav nav justify-content-center">
            @if(session('user'))
                <ul class="navbar-nav">
                    <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/upload')}}">UPLOAD <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/logout')}}">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/profile')}}">PROFILE</a>
                    </li>
                    <li class="nav-item">
                @if(Request::is('events'))
                    <a class="nav-link" href="{{URL::to('/events/create')}}">CREATE EVENT</a>
                    </li>
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/events')}}">EVENT</a>
                    </li>
                @endif
                        <li class="nav-item">
                    @if(Request::is('commissions'))
                        <a class="nav-link" href="{{URL::to('/commissions/create')}}">REQUEST ART</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/commissions')}}">COMMISSION</a>
                        </li>
                    @endif

            @else
                <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/login')}}">LOGIN</a>
                </li>
            @endif
                    <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModalLong">
                    ABOUT US
                </a>
                    </li>
                </ul>
            <form class="form-inline ml-auto">
                <div class="form-group has-white bmd-form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                    <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-nav-tabs">
            <div class="modal-content">
                <div class="card card-header-primary"><br>
                        <strong>ABOUT ARTBITS</strong>
                    <br>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p style="color: black"> Our product aims to solve the problem of limited exposure of young and aspiring talents including their works and to provide a platform for users to easily find, appreciate, and purchase the works of our young artists.
                    <br>
                    Artbits will be an online platform providing accessibility and control for artists to monetize their work that will solve the problems:
                    <br><br>
                    •market volume
                        <br>
                    •transaction time
                        <br>
                    •travel time
                        <br>
                    •limited real life gallery spaces
                        <br>
                    •limited exposure of new artists
                        <br>
                    •travel cost.
                        <br>
                    •locating artworks
                        <br><br>


                    Artbits was built and developed by:
                        <br><br>

                    Javie Agbing
                        <br>
                    Reymand Alcaraz
                        <br>
                    Daun Sayson
                        <br>
                    Kyle Zabala
                        <br>
                    </p>
                        <footer class="blockquote-footer">From the team of <cite title="Source Title">ARTBITS</cite></footer>
                    </blockquote>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>--}}


<nav class="navbar navbar-color-on-scroll bg-dark fixed-top navbar-expand-lg navbar-transparent" color-on-scroll="100"
     id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand profile-photo" href="{{URL::to('/home')}}"><img src="{{asset('assets/img/cutebits.png')}}">A R T
                B I T S</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @if(session('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/logout')}}">LOGOUT</a>
                    </li>

                    @if(session('admin') == 'eventofficer')
                        <li class="nav-item">

                            <a class="nav-link" href="{{URL::to('/events/create')}}">CREATE EVENT</a>
                        </li>
                    @endif

                @endif

                @if(session('user') && !session('admin'))
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/upload')}}">UPLOAD <span
                                        class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/logout')}}">LOGOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/profile')}}">PROFILE</a>
                        </li>
                        @if(Request::is('events'))
                            <li class="nav-item">

                                <a class="nav-link" href="{{URL::to('/events/create')}}">CREATE EVENT</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/events')}}">EVENT</a>
                            </li>
                        @endif
                        @if(Request::is('commissions'))
                            <li class="nav-item">

                                <a class="nav-link" href="{{URL::to('/commissions/create')}}">REQUEST ART</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/commissions')}}">COMMISSION</a>
                            </li>
                        @endif

                        @elseif(!session('user') && !session('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/login')}}">LOGIN</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#exampleModalLong">
                                ABOUT US
                            </a>
                        </li>
                    </ul>

            </ul>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-nav-tabs">
                <div class="modal-content">
                    <div class="card card-header-primary"><br>
                        <strong>ABOUT ARTBITS</strong>
                        <br>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p style="color: black"> Our product aims to solve the problem of limited exposure of young
                                and aspiring talents including their works and to provide a platform for users to easily
                                find, appreciate, and purchase the works of our young artists.
                                <br>

                                Artbits was built and developed by:
                                <br><br>

                                Javie Agbing
                                <br>
                                Reymand Alcaraz
                                <br>
                                Daun Sayson
                                <br>
                                Kyle Zabala
                                <br>
                            </p>
                            <footer class="blockquote-footer">From the team of <cite title="Source Title">ARTBITS</cite>
                            </footer>
                        </blockquote>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


{{--
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{URL::to('/home')}}">ArtBits</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a type="button" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalLong">
        About Us
    </a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @if(session('user'))
                <a class="nav-item nav-link active" href="{{URL::to('/upload')}}">Upload <span
                            class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{URL::to('/logout')}}">Log Out</a>
                <a class="nav-item nav-link" href="{{URL::to('/profile')}}">Profile</a>

                @if(Request::is('events'))
                    <a class="nav-item nav-link" href="{{URL::to('/events/create')}}">Create Event</a>
                @else
                    <a class="nav-item nav-link" href="{{URL::to('/events')}}">Events</a>
                @endif
            @else

                <a class="nav-item nav-link" href="{{URL::to('/login')}}">Log In</a>
            @endif
            --}}
{{-- <a class="nav-item nav-link" href="#">Pricing</a>
             <a class="nav-item nav-link disabled" href="#">Disabled</a>--}}{{--

        </div>
    </div>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Artbits</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Our product aims to solve the problem of limited exposure of young and aspiring talents including their works and to provide a platform for users to easily find, appreciate, and purchase the works of our young artists.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</nav>--}}
