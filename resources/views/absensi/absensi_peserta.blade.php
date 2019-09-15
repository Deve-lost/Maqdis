@extends('layouts.master')
@section('title', 'Absensi Peserta')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <strong class="h4">Absensi</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pengajar_id" value="{{ $absensi->pengajar_id }}">
                        <p>Nama Program : {{ $absensi->program->nm_program }}</p>
                        <p>Nama Pengajar : {{ $absensi->pengajar->nm_pengajar }}</p>
                        <p>Kelas : {{ $absensi->kelas }}</p>

                            {{-- expr --}}
        {{-- {{ \Carbon\Carbon::parse($hari)->formatLocalized('%A, %d %B %Y %H:%I:%S')}} --}}
        <?php $h = \Carbon\Carbon::parse($hari)->formatLocalized('%A') ?>

                        @if ($absensi->hari === $h )
                        <button class="btn btn-sm btn-primary">Absen</button>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
    </div>

    @if ($abs > '0')
        {{-- expr --}}
    <div class="row">
        <div class="col-md-12">
             <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Absensi
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
                                @php
                                    $no=1;
                                @endphp
                                <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $abs->user->name }}</td>
                                   <td>{{ $absensi->pengajar->nm_pengajar }}</td>
                                   <td>{{ $absensi->program->nm_program }}</td>
                                   <td>{{ $abs->tgl_kegiatan }}</td>
                                   <td class="text-primary">{{ $abs->status }}</td>
                                </tr>
                            </tbody>
                        </table></div></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    @else

    @endif


</div>
@endsection