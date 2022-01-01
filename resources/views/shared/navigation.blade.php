<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Student Administration Application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/course">Courses</a>
                </li>
                @auth()
                    @if(auth()->user()->admin)
                        <li>
                            <a class="nav-link" href="/programmes">programmes</a>
                        </li>
                    @endif
                @endauth
            </ul>
            {{--  Auth navigation  --}}
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>Login</a>
                </li>
            @endguest
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#!" data-toggle="dropdown">
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
                        </form>
                        @if(auth()->user()->admin)
                        @endif
                    </div>
                </li>
                @endauth            </ul>
        </div>
    </div>
</nav>
