<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
      <title>Up Everything You Want!</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style media="screen">
        .nav-logo{
        max-width: 50px;
        max-height: 50px;
        margin: 10px;
        margin-bottom: 5px;
        }
        .parallax-container {
          min-height: 650px;
        }
        .full-height{
          min-height: 650px;
          padding: 20px;
        }

      </style>
    </head>

    <body>
      <!-- START HEADER -->
      <header>
        <div class="navbar-fixed">
          <nav>
            <div class="nav-wrapper green">
              <a href="#header" class="brand-logo"> <img src="{{asset('img/white-logo-main.png')}}" class="responsive-img nav-logo"> </a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="#about">About</a></li>
                <li><a href="#target">Target</a></li>
                <li><a href="#join">Join</a></li>
                <li><a href="#">Survey</a></li>
              </ul>
            </div>
          </nav>
        </div>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#about">About</a></li>
          <li><a href="#target">Target</a></li>
          <li><a href="#join">Join</a></li>
          <li><a href="#">Survey</a></li>
        </ul>
      </header>
      <div class="parallax-container section scrollspy"  id="header" class="">
        <div class="parallax "><img src="{{asset('img/header.png')}}"></div>
        <div class="row">
          <div class="col l11 offset-l1">
            <h3 class="white-text" style="margin-top: 25%">
              Search, Find, Take Up <br> Everything You Want!
            </h3>
            <p><a href="{{route('survey')}}" class="yellow-text">Help us to improve our services. Take the survey ...</a></p>
          </div>
        </div>
      </div>
      <!-- END HEADER -->

      <!-- START CONTENT -->
      <div id="about" class="container-fluid full-height green valign-wrapper section scrollspy">
        <div class="row">
          <div class="col l6 offset-l3 center">
            <img src="{{asset('img/white-logo.png')}}" class="responsive-img">
            <p class="white-text">Show Up! is headquartered in Indonesia where the Co-Founder Taufan, Yusuf, Niken are the pioneer of Show Up!.
               Show Up! was founded in 23 August 2017 to help people advertise and promote everything they want to.
                Besides that, Show Up! come with a unique concepts and appearances to get their goals.</p>
          </div>
        </div>
      </div>

      <div id="target" class="container full-height center section scrollspy">
        <div class="row">
          <div class="col l12 s12">
            <h3>Client</h3>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col l6">
            <img src="{{asset('img/client.png')}}" class="responsive-img">
          </div>
          <div class="col l6" style="margin-top: 10%">
            <h5>Why Show Up! ?</h5>
            <p>Discover everything you want to show up.
               Get the unique atmosphere from anyone around the world</p>
          </div>
        </div>
        <div class="row">
          <div class="col l12 s12">
            <h3>Business</h3>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col l6" style="margin-top: 10%">
            <h5>What you get?</h5>
            <p>Make your best choices to promote everything you want.
               Get your easy payment, organizing, data security, content editor and also insight your profit.</p>
          </div>
          <div class="col l6">
            <img src="{{asset('img/business.png')}}" class="responsive-img">
          </div>
        </div>
      </div>

      <div id="join" class="container-fluid full-height green center section scrollspy">
        <div class="row">
          <div class="col l12" style="margin-top: 25%;">
            <button class="btn btn-large amber">Start now for free</button>
          </div>
        </div>
      </div>
      <!-- END CONTENT -->

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
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.parallax').parallax();
        $('.scrollspy').scrollSpy({
          scrollOffset : 30
        });
      });
      </script>
    </body>
  </html>
