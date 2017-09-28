<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Show Up! Up Everything You Want!">
    <meta name="author" content="ShowUp!">

    <title>Up Everything You Want!</title>
     <link rel="shortcut icon" href="{{asset('img/ico.ico')}}" />
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/new-age.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Show Up!</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Target</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#join">Join</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('survey')}}">Survey</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead" style="height: 100%">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Search, Find, Take Up Everything You Want!</h1>
              <h5> <a href="{{route('survey')}}">Help us to improve our services. Take the survey ...</a> </h5>
              {{-- <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a> --}}
            </div>
          </div>
        </div>
      </div>
    </header>

    <section style="background-color: #00A859" class="download text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <!-- <h2 class="section-heading">Discover what all the buzz is about!</h2> -->
            <img src="{{asset('img/logo-1.png')}}"class="img img-responsive" style="max-width: 75%">
            <hr style="color: white">
            <p style="color: white">Show Up is headquartered in Indonesia where the Co-Founder Taufan, Yusuf, Niken are the pioneer of Show Up. Show Up! was founded in 23 August 2017 to help people advertise and promote everything they want to. Besides that, Show Up come with a unique concepts and appearances to get their goals.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Client</h2>
          <p class="text-muted"></p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-4 my-auto">
            <img src="{{asset('img/client.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="feature-item">
                    <h3>Why Show Up! ?</h3>
                    <p class="text-muted">Discover everything you want to show up. Get the unique atmosphere from anyone around the world</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Business</h2>
          <p class="text-muted"></p>
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="feature-item">
                    <h3>What you get?</h3>
                    <p class="text-muted">Make your best choices to promote everything you want. Get your easy payment, organizing, data security, content editor and also insight your profit.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <img src="{{asset('img/bussines.png')}}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section>

    <section style="background-color: #00A859" class="contact" id="join">
      <div class="container">
        <a href="#join" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2017 ShowUp! Team. All Rights Reserved.</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> : public.relation@showup.id</a>
          </li>
          <li class="list-inline-item">
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> : @showup.official</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/new-age.min.js')}}"></script>

  </body>

</html>
