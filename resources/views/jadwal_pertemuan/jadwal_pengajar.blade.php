@extends('layouts.master')

@section('title', 'Jadwal Mengajar')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Jadwal Mengajar
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama Peserta</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Hari</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembayarans as $pembayaran)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td class="sorting_1">{{ $pembayaran->user->name }}</td>
                                    <td class="sorting_1">{{ $pembayaran->nm_program }}</td>
                                    <td class="sorting_1">{{ $pembayaran->hari }}</td>
                                    <td class="sorting_1">{{ $pembayaran->waktu }}</td>
                                </tr>
                                @empty
                                <tr role="row" class="odd">
                                    <td class="sorting_1" colspan="8">Anda Belum Memiliki Jadwal.</td>
                                </tr>
                                @endforelse
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
