@extends('layouts.master')

@section('title', 'Data Peserta')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Peserta</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Peserta
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                              <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                  <thead>
                                      <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 40px;">Nama Peserta</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Email</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Jenis Kelamin</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Kontak</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @forelse($peserta as $data)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td class="sorting_1">{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->jk }}</td>
                                    <td>{{ $data->kontak }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-nm="{{ $data->nama }}" data-jk="{{ $data->jk }}" data-email="{{ $data->email }}" data-kontak="{{ $data->kontak }}" data-ttl="{{ $data->ttl }}" data-alamat="{{ $data->alamat }}" data-toggle="modal" data-target="#showpeserta"><i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete" peserta-id="{{ $data->id }}" peserta-nm="{{ $data->name }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr role="row" class="odd">
                                    <td class="sorting_1" colspan="7">Data tidak ditemukan.</td>
                                </tr>
                                @endforelse
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
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="showpeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="">
        @csrf
        <div class="modal-body">
          @include('peserta.profile_peserta')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                  text: "Peserta "+peserta_nm+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy/"+peserta_id+"/peserta";
                  }
                });
        });
    </script>
@stop