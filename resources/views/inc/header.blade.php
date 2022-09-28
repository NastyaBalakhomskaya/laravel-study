<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Laravel_DZ</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About-us</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact-us</a></li>

        @if (!auth()->check())
            <li class="nav-item"><a href="{{ route('sign-up.form') }}" class="nav-link">Sign Up</a></li>
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Sign In</a></li>
        @endif

        @if(auth()->check())
            <li class="nav-item"><a href="{{ route('film.create.form') }}" class="nav-link">Create Film</a></li>
            <li class="nav-item"><a href="{{ route('film.list') }}" class="nav-link">Films List</a></li>
            <li class="nav-item"><a href="{{ route('zhanr.create.form') }}" class="nav-link">Create Zhanr</a></li>
            <li class="nav-item"><a href="{{ route('zhanr.list') }}" class="nav-link">Zhanrs List</a></li>
            <li class="nav-item"><a href="{{ route('actor.create.form') }}" class="nav-link">Create Actor</a></li>
            <li class="nav-item"><a href="{{ route('actor.list') }}" class="nav-link">Actors List</a></li>
            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        @endif

    </ul>


</header>
