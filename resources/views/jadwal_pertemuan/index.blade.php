@extends('layouts.master')

@section('title', 'Jadwal Pertemuan')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Jadwal Pertemuan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <!-- <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th> -->
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Hari</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Waktu</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Peserta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pembayaran > '0')
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><a class="nav-link" href="{{ route('kelompok.peserta', $pembayaran->user_id) }}">{{ $pembayaran->user->name }}</a></td>
                                    <td class="sorting_1">{{ $pembayaran->nm_pengajar }}</td>
                                    <td class="sorting_1">{{ $pembayaran->nm_program }}</td>
                                    <td class="sorting_1">{{ $pembayaran->hari }}</td>
                                    <td class="sorting_1">{{ $pembayaran->waktu }}</td>
                                    <td class="sorting_1 text-primary">{{ $pembayaran->status }}</td>
                                    <td class="sorting_1">
                                        @if ($jml == 0)
                                            <a href="{{ route('cek.peserta', auth()->user()->id) }}" class="btn btn-sm btn-primary disabled"> Tambah</a>
                                        @else
                                        <a href="{{ route('cek.peserta', auth()->user()->id) }}" class="btn btn-sm btn-primary"> Tambah</a>
                                        @endif
                                    </td>
                                </tr>
                                @else
                                <tr role="row" class="odd">
                                    <td class="sorting_1" colspan="8">Tidak ada jadwal.</td>
                                </tr>
                                @endif
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
