<!-- START HEADER -->
<header>
  <div class="navbar-fixed">
    <!-- Dropdown Structure -->
    <ul id="ads" class="dropdown-content">
      @if (Auth::user())
        <li><a href="{{route('ads.create')}}">Add new post</a></li>
        <li><a href="{{route('ads.index')}}">Show my posts</a></li>
      @endif
      <li><a href="{{route('ads.all')}}">See Advertisements</a></li>
    </ul>
    <ul id="transactions" class="dropdown-content">
        <li><a href="{{route('transaction.checkout')}}">Need Transactions</a></li>
        <li><a href="{{route('transaction.done')}}">Done Transactions</a></li>
    </ul>
    <ul id="orders" class="dropdown-content">
        <li><a href="{{route('order.myOrder')}}">Order</a></li>
        <li><a href="{{route('order.myAcc')}}">Ongoing Order</a></li>
        <li><a href="{{route('order.done')}}">Done Order</a></li>
    </ul>
    <ul id="settings" class="dropdown-content">
      <li><a href="{{ route('profile')}}">Profile</a></li>
      <li><a href="{{ route('instagram.create')}}">Instagram</a></li>
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
        <a href="/" class="brand-logo"> <img src="{{asset('img/logo-app.png')}}" class="responsive-img nav-logo" style="padding-bottom: 10px"> </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="#!" data-activates="ads">Advertisers <i class="material-icons right">arrow_drop_down</i></a></li>
          @if (Auth::user())
          <li><a class="dropdown-button" href="#!" data-activates="transactions">Transactions <i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" href="#!" data-activates="orders">Order <i class="material-icons right">arrow_drop_down</i></a></li>
          @endif
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
