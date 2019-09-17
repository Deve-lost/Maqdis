@extends('layouts.master')

@section('title', 'Data Pengajar')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Pengajar</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Pengajar
                <div class="float-right">
                    <a href="{{ route('dp.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Nama Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Jenis Kelamin</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Pendidikan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Kontak</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengajar as $data)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td class="sorting_1">{{ $data->nm_pengajar }}</td>
                                    <td>{{ $data->jk }}</td>
                                    <td>{{ $data->pendidikan }}</td>
                                    <td>{{ $data->kontak }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-nm="{{ $data->nm_pengajar }}" data-jk="{{ $data->jk }}" data-pendidikan="{{ $data->pendidikan }}" data-kontak="{{ $data->kontak }}" data-ttl="{{ $data->ttl }}" data-pengalaman="{{ $data->pengalaman_kerja }}" data-alamat="{{ $data->alamat }}" data-toggle="modal" data-target="#show"><i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('dp.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger delete" pengajar-id="{{ $data->id }}" pengajar-nm="{{ $data->nm_pengajar }}"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Pengajar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="">
        @csrf
        <div class="modal-body">
          @include('data_pengajar.profile_pengajar')
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
            var pengajar_id = $(this).attr('pengajar-id');
            var nm_pengajar = $(this).attr('pengajar-nm');
            swal({
                  title: "Hapus!",
                  text: "Pengajar "+nm_pengajar+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy/"+pengajar_id+"/pengajar";
                  }
                });
        });
    </script>
@stop
