<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

            <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('admin.profile') }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Profile
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
          <a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault();
          this.closest('form').submit();">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Log Out
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          </form>
          <div class="dropdown-divider"></div>
        </div>

      </li> --}}

      <li class="nav-item">
        <div class="dropdown">
            <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
                @if(Auth::user()->profile)
                <img src="{{ asset('storage/'.Auth::user()->profile) }}" class="img-circle elevation-2" alt="{{ asset(Auth::user()->name) }}" width="30" height="auto">
                @else
                <img src="{{ asset('storage/no-picture-taking.png') }}" alt="" srcset="" width="30" height="auto">
                @endif
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Profile
                        </h3>
                      </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                <a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                this.closest('form').submit();">
                    <!-- Message Start -->
                    <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Log Out
                        </h3>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                </form>
                <div class="dropdown-divider"></div>
            </div>
          </div>
      </li>

    </ul>
  </nav>
