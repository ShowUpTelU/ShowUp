<!doctype html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Show Up! Up Everything You Want!">
  <meta name="author" content="ShowUp!">

  <title>ShowUp!</title>
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
<body>
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

  <header class="masthead" style="height: 100%">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">Search, Find, Take Up Everything You Want!</h1>
            {{-- <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a> --}}
          </div>
        </div>
      </div>
    </div>
  </header>

  {{-- START CONTENT --}}
  <section>
    <div class="container" style="height: 100%; padding: 50px">
      <form action="{{route('survey')}}" method="post">
        {{ csrf_field() }}
      <div class="row">
        <div class="col-lg-12">
          <h1> <center>Bantu kami untuk mengisi survey ini!</center> </h1>
          @if (session('status'))
            <div class="alert alert-success" role="alert"> <b>
              <h4>Terima Kasih</h4><br>
              {{ session('status') }}
              </b>
            </div>
          @endif
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
              <label>Umur</label>
              <input type="number" class="form-control" placeholder="Umur" name="age" required>
            </div>
            <div class="form-group">
              <label>Asal</label>
              <input type="text" class="form-control" placeholder="Asal" name="address" required>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" class="form-control" placeholder="Pekerjaan" name="job"  required>
            </div>
            <div class="form-group">
              <label>Hobi</label>
              <input type="text" class="form-control" placeholder="Hobi" name="hobi"  required>
            </div>
            <div class="form-group">
              <label>Sosial Media : </label>
              <label class="checkbox-inline"><input type="checkbox" value="Line" name="socmed[]">LINE</label>
              <label class="checkbox-inline"><input type="checkbox" value="Instagram" name="socmed[]">Instagram</label>
              <label class="checkbox-inline"><input type="checkbox" value="Facebook" name="socmed[]">Facebook</label>
              <label class="checkbox-inline"><input type="checkbox" value="Others" name="socmed[]">Lainnya</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              {{-- ASPEK SISTEM --}}
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Aspek Sistem
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                      </tr>
                      <tr>
                        <td>Tampilan Show Up! mudah dikenali</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="systemInterface" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemInterface" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemInterface" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Show Up! mudah dioperasikan</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="systemOperation" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemOperation" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemOperation" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Warna pada Show Up! nyaman dilihat dan tidak membosankan</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="systemColor" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemColor" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemColor" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Penempatan menu pada Show Up! mudah dikenali</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="systemPlacement" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemPlacement" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemPlacement" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Adanya error pada Show Up!</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="systemError" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemError" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="systemError" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              {{-- ASPEK PENGGUNA --}}
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      Aspek Pengguna
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                      </tr>
                      <tr>
                        <td>Kesulitan mempromosikan barang</td>
                        <td>
                          <label class="radio-inline"><input type="radio"  name="userPromotion" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio"  name="userPromotion" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio"  name="userPromotion" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Simbol pada Show Up! mudah dipahami</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="userSymbol" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="userSymbol" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="userSymbol" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Karakter pada Show Up! mudah dipahami</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="userCharacter" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="userCharacter" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="userCharacter" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              {{-- ASPEK INTERAKSI --}}
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      Aspek Interaksi
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                      </tr>
                      <tr>
                        <td>Reaksi pertama pengguna mengenai Show Up!</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="interactionFirstImpression" value='1'>Jelek</label>
                          <label class="radio-inline"><input type="radio" name="interactionFirstImpression" value='2'>Biasa</label>
                          <label class="radio-inline"><input type="radio" name="interactionFirstImpression" value='3'>Bagus</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Menu dan animasi pada Show Up! merespon dengan cepat</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="interactionAnimation" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionAnimation" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionAnimation" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Menurut pengguna seberapa besar pengaruh tampilan grafis dalam suatu aplikasi</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="interactionGraphic" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionGraphic" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionGraphic" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Pengguna ingin menggunakan Show Up! kembali</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="interactionComeBack" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionComeBack" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="interactionComeBack" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              {{-- ASPEK KOMPETITOR --}}
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      Aspek Kompetitor
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                    <table class="table">
                      <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                      </tr>
                      {{-- SHOW UP --}}
                      <tr>
                        <td colspan="2"> <b>Show up!</b> </td>
                      </tr>
                      <tr>
                        <td>Portal lowongan kerja</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SUJobVacancy" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUJobVacancy" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUJobVacancy" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Data security</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SUDataSecurity" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUDataSecurity" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUDataSecurity" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Editing poster dan video untuk iklan</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SUEditing" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUEditing" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUEditing" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Customer care 24 jam</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SUCS" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUCS" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUCS" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Harga terjangkau</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SUPrice" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUPrice" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SUPrice" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Penyesuaian lokasi pengguna</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="SULocation" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SULocation" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="SULocation" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      {{-- SOCMED --}}
                      <tr>
                        <td colspan="2"> <b>Media Sosial Lainnya</b> </td>
                      </tr>
                      <tr>
                        <td>Portal lowongan kerja</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="OJobVacancy" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OJobVacancy" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OJobVacancy" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Data security</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="ODataSecurity" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="ODataSecurity" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="ODataSecurity" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Editing poster dan video untuk iklan</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="OEditing" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OEditing" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OEditing" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Customer care 24 jam</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="OCS" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OCS" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OCS" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Harga terjangkau</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="OPrice" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OPrice" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OPrice" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                      <tr>
                        <td>Penyesuaian lokasi pengguna</td>
                        <td>
                          <label class="radio-inline"><input type="radio" name="OLocation" value='1'>Kurang Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OLocation" value='2'>Setuju</label>
                          <label class="radio-inline"><input type="radio" name="OLocation" value='3'>Sangat Setuju</label>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Saran</label>
          <textarea class="form-control" name="suggestion"></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-warning" type="submit">Simpan</button>
        </div>
        </form>
    </div>
  </section>

  {{-- END CONTENT --}}

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
