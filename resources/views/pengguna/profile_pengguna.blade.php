@extends('layouts.master')

@section('title', 'Profile Pengguna')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                Profile {{ $pengguna->name }}
            </div>
            <div class="card-body text-center">

                <form action="{{ route('update.foto', $pengguna->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
            <center>
            <br/>
            <div class="form-group" {{$errors->has('avatar') ? ' has-error' : ''}}>
            <img id="preview" src="{{ asset('images/avatar/'.$pengguna->avatar)}}" width="230px" height="220px"/><br/>
            <input type="file" name="avatar" id="image" style="display: none;"/>
            <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
            <a href="javascript:changeProfile()">Pilih</a> |
            <a style="color: red" href="javascript:removeImage()">Remove</a> <br>

            @if($errors->has('avatar'))
              <span class="help-block text-danger">{{$errors->first('avatar')}}</span>
            @endif
            </center>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
            function changeProfile() {
            $('#image').click();
            }
            $('#image').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
            else
            alert("Please select image file (jpg, jpeg, png).")
            });
            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            //              $("#remove").val(0);
            };
            }
            }
            function removeImage() {
            $('#preview').attr('src', '{{ asset('images/user.png') }}');
            //      $("#remove").val(1);
            }
            </script>
            </div>
            <button class="btn btn-sm btn-primary mt mb-3 mx-auto">Ganti Foto Profile</button>

                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-body">
                    Nama Pengguna : {{ $pengguna->name }}</b><br>
                    <b>Email : {{ $pengguna->email }}</b><br>
                    <p><b>Role : {{ $pengguna->role }}</b></p>
                    <a href="{{ route('pengguna.ubahpw', $pengguna->id) }}" class="btn btn-primary btn-sm">Ubah Password</a>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
