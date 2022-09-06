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
        <li class="nav-item"><a href="{{ route('film.create.form') }}" class="nav-link">Create Film</a></li>
        <li class="nav-item"><a href="{{ route('film.list') }}" class="nav-link">Films List</a></li>

    </ul>
</header>
