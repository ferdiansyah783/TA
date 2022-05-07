<nav class="navbar navbar-dark navbar-expand-md fixed-top container-fluid" style="background: rgba(0,153,255,0.57);">
    <div class="container-fluid"><a class="navbar-brand" href="{{ env('APP_URL') }}"><img
                class="img-fluid d-inline-block align-top" src="{{ asset('assets/img/tutwuri.png') }}" width="30"
                height="30">&nbsp;<strong>SMK
                GO!!!</strong></a><button data-bs-toggle="collapse" class="navbar-toggler"
            data-bs-target="#navcol-menu"><span class="visually-hidden">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">DASHBOARD</a>
                    </li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('schools.index') }}">INFO SMK</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                        data-bs-toggle="dropdown" href="#">ACCOUNT</a>
                    <div class="dropdown-menu">
                        @if (Auth::check())
                            <a class="dropdown-item"
                                href="{{ route('users.show', Auth::user()->username) }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">LOGIN</a>
                            <a class="dropdown-item" href="{{ route('register') }}">REGISTER</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
