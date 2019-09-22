@extends('layouts.master')

@section('title', 'Jadwal Pengajar')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb bg-primary">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
            </li>
            <li class="breadcrumb-item active text-white">Jadwal Pengajar</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-table"></i>
                Jadwal Pengajar
                <div class="float-right">
                    <a href="{{ route('jp.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Nama Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Waktu</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Kelas</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse($jadwal as $data)
                              <tr role="row" class="odd">
                                  <td class="sorting_1">{{ $loop->iteration }}</td>
                                  <td>{{ $data->pengajar->nm_pengajar }}</td>
                                  <td>{{ $data->program->nm_program }}</td>
                                  <td>{{ $data->waktu }}</td>
                                  <td>{{ $data->kelas }}</td>
                                  <td>
                                      <a href="{{ route('jp.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                      <a href="#" class="btn btn-sm btn-danger delete" jd-id="{{ $data->id }}" jadwal-nm="{{ $data->pengajar->nm_pengajar }}"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              @empty
                              <tr role="row" class="odd">
                                  <td class="sorting_1" colspan="7">Data tidak ditemukan.</td>
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
@endsection

@section('footer')
    <script type="text/javascript">
        $('.delete').click(function(){
            var jd_id = $(this).attr('jd-id');
            var jd_nm = $(this).attr('jadwal-nm');
            swal({
                  title: "Hapus!",
                  text: "Jadwal "+jd_nm+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy/"+jd_id+"/jadwal-pengajar";
                  }
                });
        });
    </script>
@stop