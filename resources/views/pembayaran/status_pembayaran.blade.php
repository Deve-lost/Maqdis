@extends('layouts.master')

@section('title', 'Status Pembayaran')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
                {{-- expr --}}
            @if($pembayaran > '0')
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Nama :  {{ $pembayaran->user->name }}</p>
                        <p class="card-text">Nama Program : {{ $pembayaran->nm_program }}</p>
                        <p class="card-text">Nama Pengajar : {{ $pembayaran->nm_pengajar }}</p>
                        <p class="card-text">Hari : {{ $pembayaran->hari }}</p>
                        <p class="card-text">Waktu : {{ $pembayaran->waktu }}</p>
                        <p class="card-text">Harga : {{ $pembayaran->harga }}</p>
                        <p class="card-text text-primary">Status : {{ $pembayaran->status }}</p>

                    </div>
                </div>
            </div>

            @if (!empty($pembayaran->struk))
                {{-- expr --}}
            @else
            <div class="col-md-12">
                <form action="{{ route('update.struk', $pembayaran->user_id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
            <center>
            <br/>
            <div class="form-group" {{$errors->has('struk') ? ' has-error' : ''}}>
            <img id="preview" src="{{ asset('images/default.svg') }}" width="230px" height="220px"/><br/>
            <input type="file" name="struk" id="image" style="display: none;"/>
            <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
            <a href="javascript:changeProfile()">Pilih</a> |
            <a style="color: red" href="javascript:removeImage()">Remove</a> <br>
            @if($errors->has('struk'))
              <span class="help-block text-danger">{{$errors->first('struk')}}</span>
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
            $('#preview').attr('src', '{{ asset('images/default.svg') }}');
            //      $("#remove").val(1);
            }
            </script>
            </div>
            <button class="btn btn-sm btn-primary mx-auto mt-3 mb-4">Upload</button>

                </form>
            </div>
            @endif

            @else
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Belum mendaftar program</p>
                        <a href="{{ route('daftar.index') }}" class="btn btn-primary">Daftar Program</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
