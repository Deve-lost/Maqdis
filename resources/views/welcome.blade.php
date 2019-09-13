<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Maqdis</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('landingpage/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{asset('landingpage/css/agency.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/css/style.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Maqdis</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Program</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('register') }}">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-warning btn-sm login"  href="{{ route('login') }}">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Selamat Datang Di Website</div>
        <div class="intro-heading text-uppercase">MAQDIS</div>
        <a class="btn btn-primary btn-md text-uppercase js-scroll-trigger" href="{{ route('register') }}">Daftar Sekarang</a>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Program Kita</h2>
          <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-book-reader fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Tahfidz</h4>
          <p class="text-muted">Program menghafal Al-Quran</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-books fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Tahsin</h4>
          <p class="text-muted">Program memperbaiki bacaan Al-Quran dengan target menjadi guru Al-Quran yang produktif</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-file-certificate fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Ihsan</h4>
          <p class="text-muted">Program belajar membaca Al-Quran dari dasar dengan target menjadi pembaca Al-Quran yang lancar, baik dan benar</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Maqomat (Irama)</h4>
          <p class="text-muted">Program memperindah bacaan Al-Quran'</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-book-open fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Bahasa Arabqu</h4>
          <p class="text-muted">Program bimbingan bahasa arab untuk menerjemahkan Al-Quran</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-graduation-cap fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">TakTik</h4>
          <p class="text-muted">Program Tafsir kajian tematik</p>
        </div>
      </div>
      <div class="row text-center">
         <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-book-reader fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Ta-Mat Al-Jazary</h4>
          <p class="text-muted">Program Talaqi Matan Al-Jazary</p>
        </div>
         <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-file-certificate fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Mahir Membaca Mushaf Madinah</h4>
          <p class="text-muted">Program penguasaan tanda-tanda baca dalam mushaf madinah</p>
        </div>
      </div>
    </div>
  </section>

  
  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
            <h4>Kay Garland</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
            <h4>Larry Parker</h4>
            <p class="text-muted">Lead Marketer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
            <h4>Diana Pertersen</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <span class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Developed by <a href="http://inovindoweb.com/" target="_blank"> INOVINDO WEB</a></span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('landingpage/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Plugin JavaScript -->
  <script src="{{asset('landingpage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Contact form JavaScript -->
  <script src="{{asset('landingpage/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('landingpage/js/contact_me.js')}}"></script>
  <!-- Custom scripts for this template -->
  <script src="{{asset('landingpage/js/agency.js')}}"></script>
</body>
</html>
