<nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
{{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> --}}
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
      </li>
    </ul>
{{-- 
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="@lang('navbar.search').." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> --}}
    </form>

    @auth
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            {{-- <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div> --}}
            {{-- <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a> --}}
            {{-- <div class="dropdown-divider"></div> --}}
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Keluar</button>
            </form>
            {{-- <a href="#" class=" dropdown-footer">See All Notifications</a> --}}
          </div>
        </li>
      </ul>
      @endauth
</nav>