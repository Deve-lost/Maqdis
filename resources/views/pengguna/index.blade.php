@extends('layouts.master')

@section('title', 'Data Pengguna')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Pengguna</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Pengguna
                <div class="float-right">
                    <a href="{{ route('pengguna.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Nama Pengguna</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Role</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Reset Password</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse($pengguna as $data)
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">{{ $loop->iteration }}</td>
                                      <td>{{ $data->name }}</td>
                                      <td>{{ $data->email }}</td>
                                      <td>{{ $data->role }}</td>
                                      <td>
                                          <a href="#" class="btn btn-sm btn-primary reset" rs-id="{{ $data->id }}" rs-name="{{ $data->name }}">Reset Password</a>
                                      </td>
                                      <td>
                                          <a href="" class="btn btn-sm btn-info" data-nm="{{ $data->name }}" data-email="{{ $data->email }}" data-role="{{ $data->role }}" data-avatar="{{ $data->avatar }}" data-toggle="modal" data-target="#showprofpeng"><i class="fa fa-eye"></i>
                                          </a>
                                          <a href="{{ route('pengguna.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                          <a href="#" class="btn btn-sm btn-danger delete" nm-peng="{{ $data->name }}" peng-id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
                                      </td>
                                  </tr>
                                  @empty
                                  <tr role="row" class="odd">
                                      <td class="sorting_1" colspan="5">Data tidak ditemukan.</td>
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
<div class="modal fade" id="showprofpeng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="">
        @csrf
        <div class="modal-body">
          @include('pengguna._profile_pengguna')
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
            var peng_id = $(this).attr('peng-id');
            var nm_peng = $(this).attr('nm-peng');
            swal({
                  title: "Hapus!",
                  text: "Pengguna "+nm_peng+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy/"+peng_id+"/pengguna";
                  }
                });
        });
    </script>

    <!-- Resert Pw -->
    <script type="text/javascript">
        $('.reset').click(function(){
            var rs_id = $(this).attr('rs-id');
            var rs_nm = $(this).attr('rs-name');
            swal({
                  title: "Yakin!",
                  text: "Reset Password "+rs_nm+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/reset/"+rs_id+"/password";
                  }
                });
        });
    </script>
    <!-- /reset pw -->
@stop