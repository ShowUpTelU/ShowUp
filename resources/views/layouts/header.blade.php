<!-- START HEADER -->
<header>
  <div class="navbar-fixed">
    <!-- Dropdown Structure -->
    <ul id="ads" class="dropdown-content">
      <li><a href="#!">Post Your IG</a></li>
      <li><a href="#!">Find Advertisers</a></li>
    </ul>
    <ul id="product" class="dropdown-content">
      <li><a href="#!">Post Yout Products</a></li>
      <li><a href="#!">Find Products</a></li>
    </ul>
    {{-- End Dropdown Structure --}}
    <nav>
      <div class="nav-wrapper green">
        <a href="#header" class="brand-logo"> <img src="{{asset('img/white-logo-main.png')}}" class="responsive-img nav-logo"> </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="#!" data-activates="ads">Advertisers <i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" href="#!" data-activates="product">Products <i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="{{route('login')}}">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul class="side-nav" id="mobile-demo">
    <li><a href="{{route('index')}}">Advertisers</a></li>
    <li><a href="{{route('index')}}">Products</a></li>
    <li><a href="{{route('index')}}">Login</a></li>
  </ul>
</header>
<div class="parallax-container section scrollspy"  id="header" class="">
  <div class="parallax "><img src="{{asset('img/header.png')}}"></div>
  <div class="row">
    <div class="col l11 offset-l1">
      <h3 class="white-text" style="margin-top: 25%">
        Search, Find, Take Up <br> Everything You Want!
      </h3>
    </div>
  </div>
</div>
<!-- END HEADER -->
