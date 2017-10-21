<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <title>Up Everything You Want!</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style media="screen">
      header, main, footer {
        padding-left: 300px;
      }

      @media only screen and (max-width : 992px) {
        header, main, footer {
          padding-left: 0;
        }
      }
      </style>
      @stack('css')
    </head>
    <body>
      <div class="hide-on-large-only">
        @include('layouts.header')
      </div>
      <ul id="slide-out" class="side-nav fixed green">
        <li><div class="user-view">
          <div class="background">
            <img src="">
          </div>
          <a href="#!user"><img style="max-width: 200px;" src="{{asset('img/white-logo.png')}}"></a>
          <a href="#!name"><span class="white-text name">{{Auth::user()->firstName}} {{Auth::user()->lastName}}</span></a>
          <a href="#!email"><span class="white-text email">{{Auth::user()->email}}</span></a>
        </div></li>
        <li><div class="divider"></div></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header white-text">Accounts<i class="material-icons white-text">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('account.index')}}">Show all users</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header white-text">Advertisements<i class="material-icons white-text">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('ads.all')}}">Show all advertisements</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header white-text">Transaction<i class="material-icons white-text">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#!">Choosen bids</a></li>
                  <li><a href="#!">Confirmation payments</a></li>
                  <li><a href="#!">Confirmation tasks</a></li>
                  <li><a href="#!">Finish transaction</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
      <main>
        <nav class="hide-on-med-and-down">
          <div class="nav-wrapper green">
            <a href="#" class="brand-logo center"><img src="{{asset('img/logo-app.png')}}" class="responsive-img nav-logo" style="padding-bottom: 10px"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <i class="material-icons">exit_to_app</i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
            </ul>
          </div>
        </nav>
        @yield('content')
      </main>
      <!-- START FOOTER -->
      <footer class="page-footer grey darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Show Up!</h5>
                <p class="grey-text text-lighten-4">Up Everything You Want!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contact Us</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">email</i></a> public.relation@showup.id</li>
                  <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/showup.official/" target="_blank"><i class="tiny material-icons">photo_camera</i> @showup.official</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Show Up!
            <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
            </div>
          </div>
        </footer>
      <!-- END FOOTER -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
      <script type="text/javascript">
          $(".button-collapse").sideNav();
      </script>
      @stack('js')
    </body>
  </html>
