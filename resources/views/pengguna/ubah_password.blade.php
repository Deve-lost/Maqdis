<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Maqdis - Ubah Password</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Ubah Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
        </div>
        <form method="POST" action="{{ route('pengguna.up', $pengguna->id) }}">
           @csrf
          <div class="form-group {{$errors->has('oldPassword') ? ' has-error' : ''}}">
              <label for="oldPassword">Password Lama</label>
              <input type="password" class="form-control" name="oldPassword" id="oldPassword" value="{{ old('oldPassword') }}">
              <i class="ti-lock"></i>

              @if($errors->has('oldPassword'))
                  <span class="help-block text-danger">{{$errors->first('oldPassword')}}</span>
              @endif
          </div>

          <div class="form-group {{$errors->has('newPassword') ? ' has-error' : ''}}">
              <label for="newPassword">Password Baru</label>
              <input type="password" class="form-control" name="newPassword" id="newPassword">
              <i class="ti-lock"></i>

              @if($errors->has('newPassword'))
                  <span class="help-block text-danger">{{$errors->first('newPassword')}}</span>
              @endif
          </div>

          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('toastr/toastr.js')}}"></script>
  
  <!-- Alert -->
  <script>
      @if(Session::has('error'))
          toastr.error("{{Session::get('error')}}")
      @endif
  </script>
  <!-- /alert -->
</body>

</html>
