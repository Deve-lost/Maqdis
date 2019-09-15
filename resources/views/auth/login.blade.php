<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Maqdis - Login</title>
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
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">

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
    <section class="page-section" id="contact">
      <div class="container">
        <div class="row">
          <div  class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Masuk</h2>
            <h3 class="section-subheading text-muted" style="color: white !important;">Masukkan Email Dan Password.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form action="{{ route('post.login') }}" method="POST">
            @csrf
              <div class="row text-center">
                <div class="col-md-12">
                  <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                    <input class="form-control login" id="email" type="email" placeholder="Masukkan Email" required="required" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                      <span class="help-block text-danger">{{$errors->first('email')}}</span>
                    @endif
                  </div>
                  <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">

                    <input class="form-control login" id="password" type="password" placeholder="Masukkan Password" required="required" name="password">
                    @if($errors->has('password'))
                      <span class="help-block text-danger">{{$errors->first('password')}}</span>
                    @endif

                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-md text-uppercase" type="submit">Login</button>
                  </div>
                </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <ul class="bodoamat">
    <li>
      <a href="https://api.whatsapp.com/send?phone=6285" target="_BLANK" class="whatsapp"><i class="fab fa-whatsapp fa-2x"></i></a>
    </li>
    <li>
      <a href="http://instagram.com/" target="_BLANK" class="instagram"><i class="fab fa-instagram fa-2x"></i></a>
    </li>
  </ul>
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
  <!-- Toastr -->
  <script src="{{asset('toastr/toastr.js')}}"></script>

  <!-- Alert -->
    <script>
        @if(Session::has('sukses'))
            toastr.success("{{Session::get('sukses')}}")
        @endif
    </script>

    <script>
        @if(Session::has('error'))
            toastr.error("{{Session::get('error')}}")
        @endif
    </script>
    <!-- /alert -->
</body>
</html>
