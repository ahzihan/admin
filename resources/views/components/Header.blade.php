<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item">
                    <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i
                            class="fas  fa-bars"></i></a>
                </li>
                <li class="nav-item m-l-10">
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item mt-3">{{ Auth::user()->name }}</li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}"
                                class="btn btn-sm btn-primary p-8 border-0 m-6">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}"
                                class="btn btn-sm btn-info p-8 border-0 m-6 text-white">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a class="dropdown-item btn btn-sm btn-danger text-center p-8 border-0 m-6"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- <a id="navbarDropdown" class="btn btn-sm btn-danger dropdown-toggle p-8 border-0 m-6" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                        </a> --}}

                        {{-- <div class="dropdown-menu dropdown-menu-end p-0 border-0" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item btn btn-sm btn-danger text-center p-8 border-0 m-6" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> --}}
                    </li>
                @endguest
            </ul>

            {{-- <ul class="navbar-nav my-lg-0">

                <li class="nav-item"><a href="" class="btn btn-sm btn-danger">Logout</a></li>
            </ul> --}}

        </div>
    </nav>
</header>
