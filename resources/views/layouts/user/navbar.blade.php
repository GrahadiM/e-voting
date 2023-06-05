<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <img src="{{ asset('images') .'/Logo SMAN5.png' }}" alt="" width="85" /><span class="text-1000 fs-1 ms-2 fw-medium">
            <span class="fw-bold">E</span>-Voting</span>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.index') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.vote*') ? 'active' : '' }}" href="{{ route('frontend.vote') }}">Vote</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.perolehan_suara') ? 'active' : '' }}" href="{{ route('frontend.perolehan_suara') }}">Perolehan Suara</a></li>
            </ul>
            <form class="d-flex py-3 py-lg-0">
                <!-- <button class="btn btn-link text-1000 fw-medium order-1 order-lg-0" type="button">Sign in</button>
                <button class="btn btn-outline-danger rounded-pill order-0" type="submit">Sign Up</button> -->
                <button class="btn btn-outline-danger rounded-pill order-0" type="submit">Masuk</button>
            </form>
        </div>
    </div>
</nav>
