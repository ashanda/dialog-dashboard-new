 <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{ route('admin.home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('habour-location.index') }}">
              <i class="ni ni-pin-3 text-orange"></i> Habour Location
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.users_edit',Auth::user()->id) }} ">
              <i class="ni ni-single-02 text-yellow"></i> Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="examples/tables.html">
              <i class="ni ni-album-2 text-primary"></i> Media
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users')}}">
              <i class="ni ni-user-run text-info"></i> All users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.register') }}">
              <i class="ni ni-circle-08 text-pink"></i> Add Users
            </a>
          </li>
        </ul>