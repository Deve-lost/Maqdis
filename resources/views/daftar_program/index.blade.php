@extends('layouts.master')

@section('title', 'Daftar Program')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a>Daftar Program</a>
                </li>
            </ol> --}}
        </div>
    </div>
    <!-- Icon Cards-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
        Daftar Program
    </div>
        <div class="card-body">
            <h4>Pilihan Program</h4>
            <blockquote class="blockquote text-center">
                <p class="mb-0">Pilih kelas yang sesuai dengan keingan anda & jarak rumah anda ke kantor Maqdis</p>
            </blockquote>
            <form class="form-data" method="POST" action="{{ route('cp') }}" id="data-form">
                @csrf
            <div class="row">
                @forelse($program as $data)
                {{-- <div class="col-md-3 grid-wrapper">
                    <div class="card-wrapper">
                        <input class="c-card" name="program" type="radio" id="{{ $satu++ }}" value="{{ $dua++ }}">
                        <div class="card-content">
                            <div class="card-state-icon"></div>
                            <label for="{{ $tiga++ }}"> --}}
                                {{-- <div class="image"></div> --}}
                                {{-- <h4>{{ $data->nm_program }}</h4>
                                <p class="small-meta dim">{{ $data->deskripsi }}</p>
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-3">
                    <label>
                        <input type="radio" id="program[{{ $data->id }}]" data-id="{{ $data->id }}" value="{{ $data->id }}{{ old('program') }}" name="program" class="card-input-element" />
                        <div class="panel panel-default card-input tinggi" style="height: 200px">
                            <div class="panel-heading">{{ $data->nm_program }}</div>
                            <div class="panel-body">
                                {{ $data->deskripsi }}
                            </div>
                        </div>
                    </label>
                </div>
                @empty
                Data Tidak ada.
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="hari" id="" class="form-control">
                        <option value=" " disabled selected="">Pilih Hari</option>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jum'at</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="jam" id="" class="form-control">
                        <option value="" disabled selected="">Pilih Jam</option>
                        <option value="08.00 WIB">08.00 WIB</option>
                        <option value="13.00 WIB">13.00 WIB</option>
                        <option value="10.00 WIB">10.00 WIB</option>
                        <option value="15.30 WIB">15.30 WIB</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <select name="jml_org" id="" class="form-control">
                        <option value=" " disabled selected="">Jumlah Orang</option>
                        <option value="1000">1 Orang</option>
                        <option value="2000">2 Orang</option>
                        <option value="3000">3 Orang</option>
                        <option value="4000">4 Orang</option>
                        <option value="5000">5 Orang</option>
                        <option value="6000">6 Orang</option>
                        <option value="7000">7 Orang</option>
                        <option value="8000">8 Orang</option>
                        <option value="9000">9 Orang</option>
                        <option value="10000">10 Orang</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <select name="kecamatan" id="pilihKecamatan" class="form-control cari">
                        <option value="" disabled selected="">Pilih Kecamatan</option>
                        @foreach($kecamatan as $data)
                        <option value="{{ $data->status }}">{{ $data->nm_kecamatan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <select name="kelas" class="form-control cari">
                        <option value="" disabled="" selected="">Pilih Kelas</option>
                    </select>
                </div>

                <div class="col-md-12 mt-3" id="add">
                    <button id="search" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Cari Pengajar</button>
                </div>

            </div>
        </div>
    </form>



    </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript">

    $(document).ready(function() {
        $("#search").attr("disabled", "disabled");
        var kecamatan = $(this).find('select[name="kecamatan"]').val();
        $('select[name="kecamatan"]').on('change', function() {
            var stateID = $(this).val();
            var validated = true;
            if(stateID) {
                $.ajax({
                    url: "{{ url('/test')}}/"+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="kelas"]').empty();
                        $.each(data, function(key, value) {
                            if (value.status == 'Dekat') {
                                $('select[name="kelas"]').append('<option value="Dekat">Dekat</option>');
                            }else{
                                $('select[name="kelas"]').append('<option value="Jauh">Jauh</option><option value="Malam">Malam</option><option value="Jauh+Malam">Jauh + Malam</option>');
                            }
                            $('#search').removeAttr("disabled");
                        });

                    }
                });

            }else{
                $('select[name="kelas"]').empty();
            }
        });



    });

</script>
@endsection
