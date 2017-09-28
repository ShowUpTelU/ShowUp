<!doctype html>
<html>
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
  <style media="screen">
    .full-heigth{
      height: 100%;
      background-color: white;
      padding: 20px;
      border-radius: 25px;
    }
  </style>
</head>
<body style="background-color: #00A859;">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{route('index')}}">Show Up!</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('index')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('survey')}}">Survey</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container full-heigth">
      <div class="row">
        <div class="col-lg-12">
          <h1>Hasil Survey Show Up!</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 ">
          <h5>Daftar Koresponden</h5>
          <table class="table">
            <tr>
              {{-- <th>Email</th> --}}
              <th>Umur</th>
              <th>Alamat</th>
              <th>Pekerjaan</th>
              <th>Hobi</th>
              <th>Sosial Media</th>
              <th>Saran</th>
            </tr>
            @foreach ($data as $row)
              <tr>
                {{-- <td>{{$row->email}}</td> --}}
                <td>{{$row->age}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->job}}</td>
                <td>{{$row->hobby}}</td>
                <td>{{$row->socmed}}</td>
                <td>{{$row->suggestion}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h5>Aspek Sistem</h5>
          <table class="table">
            <tr>
              <th>Pertanyaan</th>
              <th>Hasil</th>
            </tr>
            <tr>
              <td>Tampilan Show Up! mudah dikenali</td>
              <td>@if ($system->avg('interface') > 2)
                Sangat Setuju
              @elseif ($system->avg('interface') > 1)
                Setuju
              @else
                Tidak Setuju
              @endif </td>
            </tr>
            <tr>
              <td>Show Up! mudah dioperasikan</td>
              <td>
                @if ($system->avg('operation') > 2)
                  Sangat Setuju
                @elseif ($system->avg('operation') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Warna pada Show Up! nyaman dilihat dan tidak membosankan</td>
              <td>
                @if ($system->avg('color') > 2)
                  Sangat Setuju
                @elseif ($system->avg('color') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Penempatan menu pada Show Up! mudah dikenali</td>
              <td>
                @if ($system->avg('placement') > 2)
                  Sangat Setuju
                @elseif ($system->avg('placement') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Adanya error pada Show Up!</td>
              <td>
                @if ($system->avg('error') > 2)
                  Sangat Setuju
                @elseif ($system->avg('error') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h5>Aspek Pengguna</h5>
          <table class="table">
            <tr>
              <th>Pertanyaan</th>
              <th>Hasil</th>
            </tr>
            <tr>
              <td>Kesulitan mempromosikan barang</td>
              <td>
                @if ($user->avg('promotion') > 2)
                  Sangat Setuju
                @elseif ($user->avg('promotion') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Simbol pada Show Up! mudah dipahami</td>
              <td>
                @if ($user->avg('symbol') > 2)
                  Sangat Setuju
                @elseif ($user->avg('symbol') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Karakter pada Show Up! mudah dipahami</td>
              <td>
                @if ($user->avg('character') > 2)
                  Sangat Setuju
                @elseif ($user->avg('character') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h5>Aspek Interaksi</h5>
          <table class="table">
            <tr>
              <th>Pertanyaan</th>
              <th>Hasil</th>
            </tr>
            <tr>
              <td>Reaksi pertama pengguna mengenai Show Up!</td>
              <td>
                @if ($interaction->avg('first_impression') > 2)
                  Sangat Setuju
                @elseif ($interaction->avg('first_impression') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Menu dan animasi pada Show Up! merespon dengan cepat</td>
              <td>
                @if ($interaction->avg('animation') > 2)
                  Sangat Setuju
                @elseif ($interaction->avg('animation') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Menurut pengguna seberapa besar pengaruh tampilan grafis dalam suatu aplikasi</td>
              <td>
                @if ($interaction->avg('graphic') > 2)
                  Sangat Setuju
                @elseif ($interaction->avg('graphic') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Pengguna ingin menggunakan Show Up! kembali</td>
              <td>
                @if ($interaction->avg('come_back') > 2)
                  Sangat Setuju
                @elseif ($interaction->avg('come_back') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h5>Aspek Kompetitor</h5>
          <table class="table">
            <tr>
              <th>Pertanyaan</th>
              <th>Show Up!</th>
              <th>Lainnya</th>
            </tr>
            <tr>
              <td>Portal lowongan kerja</td>
              <td>
                @if ($ShowUp->avg('job_vacancy') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('job_vacancy') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                @if ($others->avg('job_vacancy') > 2)
                  Sangat Setuju
                @elseif ($others->avg('job_vacancy') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Data security</td>
              <td>
                {{-- $ShowUp->avg('data_security') --}}
                @if ($ShowUp->avg('data_security') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('data_security') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                {{-- $others->avg('data_security') --}}
                @if ($others->avg('data_security') > 2)
                  Sangat Setuju
                @elseif ($others->avg('data_security') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Editing poster dan video untuk iklan</td>
              <td>
                {{-- $ShowUp->avg('editing') --}}
                @if ($ShowUp->avg('editing') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('editing') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                {{-- $others->avg('editing') --}}
                @if ($others->avg('editing') > 2)
                  Sangat Setuju
                @elseif ($others->avg('editing') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Customer care 24 jam</td>
              <td>
                {{-- $ShowUp->avg('cs') --}}
                @if ($ShowUp->avg('cs') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('cs') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                {{-- $others->avg('cs') --}}
                @if ($others->avg('cs') > 2)
                  Sangat Setuju
                @elseif ($others->avg('cs') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Harga terjangkau</td>
              <td>
                {{-- $ShowUp->avg('price') --}}
                @if ($ShowUp->avg('price') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('price') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                {{-- $others->avg('price') --}}
                @if ($others->avg('price') > 2)
                  Sangat Setuju
                @elseif ($others->avg('price') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
            <tr>
              <td>Penyesuaian lokasi pengguna</td>
              <td>
                {{-- $ShowUp->avg('location') --}}
                @if ($ShowUp->avg('location') > 2)
                  Sangat Setuju
                @elseif ($ShowUp->avg('location') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
              <td>
                {{-- $others->avg('location') --}}
                @if ($others->avg('location') > 2)
                  Sangat Setuju
                @elseif ($others->avg('location') > 1)
                  Setuju
                @else
                  Tidak Setuju
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>

  {{-- START FOOTER --}}
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
  {{-- END FOOTER --}}

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('js/new-age.min.js')}}"></script>
<script type="text/javascript">

</script>
</body>
</html>
