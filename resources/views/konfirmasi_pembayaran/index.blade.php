@extends('layouts.master')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb bg-primary">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
            </li>
            <li class="breadcrumb-item active text-white">Verifikasi Pembayaran</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-table"></i>
                Data Pembayaran
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
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembayaran as $data)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td class="sorting_1">{{ $data->user->name }}</td>
                                    <td>{{ $data->nm_program }}</td>
                                    <td>{{ $data->nm_pengajar }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-dfpid="{{ $data->id }}" data-nm="{{ $data->user->name }}" data-jmlorg="{{ $data->jml_org }} Orang" data-nmprog="{{ $data->nm_program }}" data-nmpeng="{{ $data->nm_pengajar }}" data-hari="{{ $data->hari }}" data-waktu="{{ $data->waktu }}" data-kelas="{{ $data->kelas }}" data-harga="{{ $data->harga }}" data-status="{{ $data->status }}" data-struk="{{ $data->struk}}" data-toggle="modal" data-target="#showkonfirmasipembayaran"><i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete" peserta-id="{{ $data->id }}" peserta-nm="{{ $data->user->name }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr role="row" class="odd">
                                    <td class="sorting_1" colspan="6">Tidak Ada Data</td>
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
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="showkonfirmasipembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('konfirmasipem.update', 'test') }}">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="dfp_id" id="dfpid" value="">
          @include('konfirmasi_pembayaran.konfirmasi')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </div>
     </form>
    </div>
  </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript">
        $('.delete').click(function(){
            var peserta_id = $(this).attr('peserta-id');
            var peserta_nm = $(this).attr('peserta-nm');
            swal({
                  title: "Hapus!",
                  text: "Pembayaran "+peserta_nm+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy/"+peserta_id+"/verifikasi-pembayaran";
                  }
                });
        });
    </script>
@stop