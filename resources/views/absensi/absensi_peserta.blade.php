@extends('layouts.master')

@section('title', 'Absensi Peserta')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="h4 text-white">Absensi</strong>
                    </div>
                    <div class="card-body">
                        @if($absensi > '0')
                        <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pengajar_id" value="{{ $absensi->nm_pengajar }}">
                        <input type="hidden" name="nm_program" value="{{ $absensi->nm_program }}">
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table">
                                    <tr>
                                        <td>Nama Pengajar</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->nm_pengajar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Program</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->nm_program }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Presensi</td>
                                        <td> : </td>
                                        <td class="pl-2">
                                            <button class="btn btn-sm btn-primary">Hadir</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset('images/avatar/'.$absensi->avatar) }}" alt="Foto Pengajar" class="img-thumbnail img-fluid">
                            </div>
                        </div>
                        
                        @elseif($peserta > '0')
                        <form action="{{ route('absen.storepes') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nm_program" value="{{ $peserta->pembayaran->nm_program }}">
                        <input type="hidden" name="pengajar_id" value="{{ $peserta->pembayaran->nm_pengajar }}">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <td>Nama Pengajar</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $peserta->pembayaran->nm_pengajar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Program</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $peserta->pembayaran->nm_program }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $peserta->pembayaran->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $peserta->pembayaran->waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Presensi</td>
                                        <td> : </td>
                                        <td class="pl-2">
                                            <button class="btn btn-sm btn-primary">Hadir</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                            @else
                            <p class="mt-3">Silahkan Verifikasi Pembayaran terlebih dahulu.</p>
                            <a  href="{{ route('status.pembayaran') }}" class="btn btn-sm btn-primary">Status Pembayaran</a>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
             <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-table"></i>
                Rekap Absensi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Tanggal Kegiatan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absn as $absen)
                                <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $absen->user->name }}</td>
                                   <td>{{ $absen->nm_pengajar }}</td>
                                   <td>{{ $absen->nm_program }}</td>
                                   <td>{{ $absen->tgl_kegiatan }}</td>
                                   <td class="text-primary">{{ $absen->absensi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table></div></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
