@extends('layouts.master')

@section('title', 'Status Pembayaran')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
                {{-- expr --}}
            @if($status > '0')
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header bg-primary text-white">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nama Program : {{ $status->nm_program }}</p>
                        <p class="card-text">Nama Pengajar : {{ $status->nm_pengajar }}</p>
                        <p class="card-text">Hari : {{ $status->hari }}</p>
                        <p class="card-text">Waktu : {{ $status->waktu }}</p>
                        <p class="card-text">Biaya Pendidikan : Rp.{{ number_format($status->harga,0,',','.') }}</p>
                        <p class="card-text text-primary">Status : {{ $status->status }}</p>
                        @if ($status->status == 'Belum Terverifikasi' && $status->struk)
                            <p class="card-text text-danger">* Tunggu Verifikasi Dari Admin.</p>
                        @endif
                    </div>
                </div>
            </div>

            @if ($status->status == 'Belum Terverifikasi' && $status->struk == '')
            <div class="col-md-12">
                <br>
                <div class="text-center">Tanda Bukti Pembayaran</div>
                <form action="{{ route('update.struk', $status->user_id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
            <center>
            <br/>
            <div class="form-group" {{$errors->has('struk') ? ' has-error' : ''}}>
            <img id="preview" src="{{ asset('images/default-image.png') }}" width="230px" height="220px"/><br/>
            <input type="file" name="struk" id="image" style="display: none;"/>
            <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
            <a href="javascript:changeProfile()">Pilih</a> |
            <a style="color: red" href="javascript:removeImage()">Remove</a> <br> <br>
            <span>Silahkan Upload Struk Pembayaran</span> <br>
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
            $('#preview').attr('src', '{{ asset('images/default-image.png') }}');
            //      $("#remove").val(1);
            }
            </script>
            </div>
            <button class="btn btn-sm btn-primary mx-auto mt-2 mb-4">Upload</button>

                </form>
            </div>

            @elseif($status->status == 'Terverifikasi')

            @endif

            {{-- @elseif($pembayaran->struk) --}}

            {{-- Jika yang sudah mempunyai pembayaran dan juga join grup --}}
            {{-- <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Hanya Ketua yang dapat melihat pembayaran.</p>
                    </div>
                </div>
            </div> --}}


            {{-- Jika sudah jadi member grup --}}
            @elseif($status < '0' && $member)
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Hanya Ketua yang dapat melihat pembayaran.</p>
                    </div>
                </div>
            </div>

            {{-- @endif --}}

            {{-- Jika tidak mempunyai pembayaran --}}
            @elseif($status < '0')
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header bg-primary text-white">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Anda belum mendaftar program</p>
                        <a href="{{ route('daftar.index') }}" class="btn btn-primary">Daftar Program</a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
