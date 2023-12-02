<nav class="navbar navbar-dark navbar-expand-lg bg-purple">
    <div class="container flex justify-content-betwen">
      <a class="navbar-link" href="{{ route('home')}}">
        <img class="h-32px" src="{{ url('assets/images/temancuslogo.png')}}" alt="" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-o mx-lg-3">
          <li class="nav-item d-block d-lg-none d-xl-block">
            <a class="nav-link {{ Route::currentRouteName()=== 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName()=== 'disscusion' ? 'active' : '' }}" aria-current="page" href="{{ route('disscusion')}}">Disscussion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-nowrap" aria-current="page" href="#">About Us</a>
          </li>
        </ul>
        <form class="d-flex w-100 me-4 my-2 my-lg-0" role="search" action="#" method="GET">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><img src="{{ url('assets/images/cari.png')}}" alt="search"></span>
            <input class="form-control border-start-0 ps-0" type="search" placeholder="Search" aria-label="Search">
            </div>
        </form>
        <ul class="navbar-nav ms-auto my-2 my-lg-0">
            <li class="nav-item my-auto">
                <a class="nav-link text-nowrap {{ Route::currentRouteName()=== 'login' ? 'active' : '' }}" href="{{ route('login')}}">Log In</a>
            </li>
            <li class="nav-item ps-1 pe-0">
                <a class="btn btn-primary-white" href="{{ route('sign-up')}}">Sign Up</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>