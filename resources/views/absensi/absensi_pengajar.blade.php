@extends('layouts.master')

@section('title', 'Absensi Pengajar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong class="h4">Absensi</strong>
                    </div>
                    <div class="card-body">
                        @if($absensi > '0')
                        <form action="{{ route('absen.store_pengajar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pengajar_id" value="{{ $absensi->nm_pengajar }}">
                        <input type="hidden" name="nm_program" value="{{ $absensi->nm_program }}">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <td>Nama Program</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->nm_program }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td> : </td>
                                        <td class="pl-2">{{ $absensi->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Presensi</td>
                                        <td> : </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Hadir</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                            @elseif($absensi < '0')
                            <h5>Anda Belum Memiliki Jadwal.</h5>
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
            </div>
        </div>
        <div class="card-body">            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Absensi Saya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rekap Absensi Peserta</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Tanggal Kegiatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Absensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absn as $abs)
                                    <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $abs->user->name }}</td>
                                       <td>{{ $abs->nm_program }}</td>
                                       <td>{{ $abs->tgl_kegiatan }}</td>
                                       <td class="text-primary">{{ $abs->absensi }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Tanggal Kegiatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Absensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($abspes as $absp)
                                            <tr>
                                               <td>{{ $loop->iteration }}</td>
                                               <td>{{ $absp->user->name }}</td>
                                               <td>{{ $absp->nm_program }}</td>
                                               <td>{{ $absp->tgl_kegiatan }}</td>
                                               <td class="text-primary">{{ $absp->absensi }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>
</div>
@endsection
