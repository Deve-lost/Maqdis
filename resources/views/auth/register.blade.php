<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Maqdis - Register</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('landingpage/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{asset('landingpage/css/agency.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/css/style.css')}}" rel="stylesheet">
  </head>
  <body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{ route('welcome') }}">Maqdis</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('welcome') }}">Program</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('welcome') }}">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn "  href="{{ route('register') }}">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-warning btn-sm login"  href="{{ route('login') }}">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Contact -->
    <section class="page-section daftar" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Daftar Akun</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form action="{{ route('post.register') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                    <input class="form-control" id="nama" value="{{ old('name') }}" type="text" name="name" placeholder="Masukan Nama" required="required">

                    @if($errors->has('name'))
                      <span class="help-block text-danger">{{$errors->first('name')}}</span>
                    @endif

                  </div>
                  <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                    <input class="form-control" id="email" value="{{ old('email') }}" type="email" name="email" placeholder="Email *" required="required">

                    @if($errors->has('email'))
                      <span class="help-block text-danger">{{$errors->first('email')}}</span>
                    @endif

                  </div>
                  <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                    <input class="form-control" id="password" type="password" placeholder="Masukan Password" required="required" name="password" value="{{ old('password') }}">

                    @if($errors->has('password'))
                      <span class="help-block text-danger">{{$errors->first('password')}}</span>
                    @endif

                  </div>

                  <div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
                    <p>*Tempat Tanggal Lahir</p>
                    <input class="form-control" id="ttl" type="text" placeholder="Kab/Kota, Tanggal Bulan Tahun" required="required" name="ttl" value="{{ old('ttl') }}">
                    @if($errors->has('ttl'))
                      <span class="help-block text-danger">{{$errors->first('ttl')}}</span>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('jk') ? ' has-error' : ''}}">
                    <p>*Jenis Kelamin</p>
                    <select class="form-control" id="jk" name="jk">
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>

                    @if($errors->has('jk'))
                      <span class="help-block text-danger">{{$errors->first('jk')}}</span>
                    @endif
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group {{$errors->has('kontak') ? ' has-error' : ''}}">
                    <input class="form-control" id="kontak" type="text" placeholder="No.Hp / Whatsapp" required="required" name="kontak" value="{{ old('kontak') }}">

                    @if($errors->has('kontak'))
                      <span class="help-block text-danger">{{$errors->first('kontak')}}</span>
                    @endif

                  </div>

                  <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                    <textarea class="form-control" id="alamat" placeholder="Alamat" required="required"  name="alamat">{{ old('alamat') }}</textarea>

                    @if($errors->has('alamat'))
                      <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
                    @endif

                  </div>

                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button class="btn btn-primary btn-md text-uppercase" type="submit">Daftar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('landingpage/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Plugin JavaScript -->
  <script src="{{asset('landingpage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Contact form JavaScript -->
  <script src="{{asset('landingpage/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('landingpage/js/contact_me.js')}}"></script>
  <!-- Custom scripts for this template -->
  <!-- <script src="{{asset('landingpage/js/agency.js')}}"></script> -->


</body>
</html>
