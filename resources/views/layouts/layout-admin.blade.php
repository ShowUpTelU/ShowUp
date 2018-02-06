<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <title>Up Everything You Want!</title>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="theme-color" content="#00A859">
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
      <ul id="slide-out" class="side-nav fixed">
        <li><div class="user-view">
          <div class="background green">
            {{-- <img src="{{url('storage/'.Auth::user()->photo)}}"> --}}
          </div>
          <a href="#!user"><img class="circle" src="{{url('storage/'.Auth::user()->photo)}}"></a>
          <span class="white-text name">{{Auth::user()->firstName}} {{Auth::user()->lastName}}</span>
          <span class="white-text email">{{Auth::user()->email}}</span>
        </div></li>
        <li><a href="{{route('user.index')}}"><i class="material-icons">people</i>Users</a></li>
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Advertisement<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{route('admin.advertisement')}}">List Advertisement</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Bid<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{route('admin.bidOngoing')}}">Bid ongoing</a></li>
                <li><a href="{{route('admin.bidDone')}}">Bid done</a></li>
                <li><a href="{{route('admin.bidPaid')}}">Bid paid</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Transaction<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="{{route('admin.transactionUnpaid')}}">Unpaid Transaction</a></li>
                <li><a href="{{route('admin.transactionConfirmation')}}">Confirmation Transaction</a></li>
                <li><a href="{{route('admin.transactionPaid')}}">Paid Transaction</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </ul>
      <div class="container-fluid">
        <div class="row">
          <header>
            @include('layouts.navbar-admin')
          </header>
          <main>
            <div class="col l12 s12 white">
              @yield('content')
            </div>
          </main>
          <footer class="page-footer grey darken-3">
              <div class="container">
                <div class="row">
                  <div class="col l6 s12">
                    <h5 class="white-text">Show Up!</h5>
                    <p class="grey-text text-lighten-4">Up Everything You Want!</p>
                  </div>
                  <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Hubungi Kami</h5>
                    <ul>
                      <li><a class="grey-text text-lighten-3" href="#!">Email : </a> public.relation@showup.id</li>
                      <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/showup.official/" target="_blank">Instagram :  @showup.official</a></li>
                      <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/Show-Up-113566795995243/" target="_blank">Facebook:  Show Up</a></li>
                      <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/showup.official/" target="_blank">LINE : @bnc3443w</a></li>
                      <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/showup.official/" target="_blank">Website : https://www.showup.id</a></li>
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
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
      <script type="text/javascript">
        $(".button-collapse").sideNav();
      </script>
      @stack('js')
    </body>
  </html>
