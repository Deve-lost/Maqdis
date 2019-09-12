<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Maqdis - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  {{-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> --}}
  {{-- <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css"> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
</head>

<body id="page-top">
  <!-- Navbar -->
  @include('layouts.includes._navbar')
  <!-- /navbar -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.includes._sidebar')

    <div id="content-wrapper">
    @yield('content')

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tinggalkan Halaman?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout Untuk Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

  {{-- <script src="{{asset('admin/js/script.js')}}"></script> --}}

  {{-- <script src="{{asset('admin/js/demo/script.js')}}"></script> --}}
  <!-- Toastr -->
  <script src="{{asset('toastr/toastr.js')}}"></script>
  <!-- Sweet Alert -->
  <script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>

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
  <script src="{{asset('admin/js/script.js')}}"></script>
   <!-- Modal -->
    <script>
        $('#show').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var nm = button.data('nm')
          var pendidikan = button.data('pendidikan')
          var kontak = button.data('kontak')
          var jk = button.data('jk')
          var ttl = button.data('nm')
          var pengalaman = button.data('pengalaman')
          var alamat = button.data('alamat')

          var modal = $(this)

          modal.find('.modal-body #nm').val(nm);
          modal.find('.modal-body #pendidikan').val(pendidikan);
          modal.find('.modal-body #kontak').val(kontak);
          modal.find('.modal-body #jk').val(jk);
          modal.find('.modal-body #ttl').val(ttl);
          modal.find('.modal-body #pengalaman').val(pengalaman);
          modal.find('.modal-body #alamat').val(alamat);
        })
    </script>
    <!-- /modal -->

    <script>
        $('#showpeserta').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var nm = button.data('nm')
          var jk = button.data('jk')
          var kontak = button.data('kontak')
          var email = button.data('email')
          var ttl = button.data('ttl')
          var alamat = button.data('alamat')

          var modal = $(this)

          modal.find('.modal-body #nm').val(nm);
          modal.find('.modal-body #jk').val(jk);
          modal.find('.modal-body #kontak').val(kontak);
          modal.find('.modal-body #email').val(email);
          modal.find('.modal-body #ttl').val(ttl);
          modal.find('.modal-body #alamat').val(alamat);
        })
    </script>
    <!-- /modal -->


  <script>
      $('#showjadwal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nm = button.data('nm')
        var jk = button.data('jk')
        var ttl = button.data('ttl')
        var pendidikan = button.data('pendidikan')
        var kontak = button.data('kontak')
        var pengalaman = button.data('pengalaman')
        var alamat = button.data('alamat')

        var modal = $(this)

        modal.find('.modal-body #nm').val(nm);
        modal.find('.modal-body #jk').val(jk);
        modal.find('.modal-body #kontak').val(kontak);
        modal.find('.modal-body #ttl').val(ttl);
        modal.find('.modal-body #pendidikan').val(pendidikan);
        modal.find('.modal-body #pengalaman').val(pengalaman);
        modal.find('.modal-body #alamat').val(alamat);
      })
  </script>


  @yield('footer')
</body>
</html>
