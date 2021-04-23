<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div id="reloading" class="lds-ring"><div></div><div></div><div></div><div></div></div>
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">

            @if (Auth::user()->role_id == 1)
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            @endif
            @if (Auth::user()->role_id == 1)
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            @endif

          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            @if (Auth::user()->role_id == 1)
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            @endif

            <div class="search-backdrop"></div>
            <div class="search-result">

            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                @if ($notif != null)

                @foreach ($notif as $item)
                    @if (Auth::user()->role_id == 1)
                        <a href="{{ route('disccusion.show') }}/{{$item->profile_id}}" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-bell"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                Diskusi dari {{ $item->name }} belum dibaca
                            <div class="time text-primary">{{ $item->created_at }}</div>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('disccusion.show.user') }}" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-bell"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                Diskusi dari Admin belum dibaca
                            <div class="time text-primary">{{ $item->created_at }}</div>
                            </div>
                        </a>
                    @endif
                @endforeach

                @endif


              </div>
              <div class="dropdown-footer text-center">
                {{-- <a href="#">View All <i class="fas fa-chevron-right"></i></a> --}}
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img src="{{ Auth::user()->photoProfile() }}" class="rounded-circle mr-1" style="float:left">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Group: {{ $globalRole }}</div>
              <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="{{ route('profile.password.view') }}" class="dropdown-item has-icon">
                <i class="fas fa-lock"></i> Change Password
              </a>
            <a href="{{ route('history.show') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              {{-- <a href="{{ url('/setting') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                <i class="fas fa-sign-out-alt"></i>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </nav>
