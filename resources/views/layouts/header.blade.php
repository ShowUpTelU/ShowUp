<!-- START HEADER -->
<header>
  <div class="navbar-fixed">
    <!-- Dropdown Structure -->
    <ul id="ads" class="dropdown-content">
      @if (Auth::user())
        <li><a href="{{route('ads')}}">Post Your IG</a></li>
        <li><a href="{{route('myAds')}}">My Post</a></li>
      @endif
      <li><a href="#!">Find Advertisers</a></li>
    </ul>
    <ul id="settings" class="dropdown-content">
      <li><a href="{{ route('profile')}}">Profile</a></li>
      <li><a href="{{ route('instagram')}}">Instagram</a></li>
      <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
    {{-- End Dropdown Structure --}}
    <nav>
      <div class="nav-wrapper green">
        <a href="/" class="brand-logo"> <img src="{{asset('img/white-logo-main.png')}}" class="responsive-img nav-logo"> </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="#!" data-activates="ads">Advertisers <i class="material-icons right">arrow_drop_down</i></a></li>
          @if (Auth::id())
            <li><a class="dropdown-button" href="#!" data-activates="settings"><i class="material-icons">settings</i></a></li>
          @else
            <li><a href="{{route('login')}}">Login</a></li>
          @endif
        </ul>
      </div>
    </nav>
  </div>
  <ul class="side-nav" id="mobile-demo">
    <li><a href="{{route('index')}}">Advertisers</a></li>
    <li><a href="{{route('index')}}">Products</a></li>
    @if (Auth::id())
      <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    @else
      <li><a href="{{route('login')}}">Login</a></li>
    @endif
  </ul>
</header>
<!-- END HEADER -->
