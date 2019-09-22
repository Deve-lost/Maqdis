@extends('layouts.master')

@section('title', 'Rekap Kehadiran Pengajar Dan Peserta')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb bg-primary">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
            </li>
            <li class="breadcrumb-item active text-white">Rekap Kehadiran</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-table"></i>
                Rekap Kehadiran Pengajar Dan Peserta
            </div>
            <div class="card-body">
              <!-- Tab -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-pengajar" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pengajar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-peserta" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Peserta</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <!-- Pengajar -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-pengajar">
                  <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Nama Pengajar</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Tanggal Kegiatan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Absensi</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($absensipeng as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nm_pengajar }}</td>
                                    <td>{{ $data->nm_program }}</td>
                                    <td>{{ $data->tgl_kegiatan }}</td>
                                    <td>{{ $data->absensi }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-nm="{{ $data->user->name }}" data-nmprog="{{ $data->nm_program }}" data-tglkegiatan="{{ $data->tgl_kegiatan }}" data-absensi="{{ $data->absensi }}" data-materi="{{ $data->materi }}" data-foto="{{ $data->fotokegiatan}}" data-toggle="modal" data-target="#showabsensi"><i class="fa fa-eye"></i>
                                    </td>
                                </tr>
                            @endforeach
                           </tbody>
                        </table></div></div>
                    </div>
                </div>
                </div>
                <!-- /pengajar -->
                <!-- Peserta -->
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-peserta">
                  <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Nama Peserta</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Program</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Tanggal Kegiatan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Absensi</th>
                                    @if(auth()->user()->role == 'Developer')
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Opsi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($absensipes as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->nm_program }}</td>
                                    <td>{{ $data->tgl_kegiatan }}</td>
                                    <td>{{ $data->absensi }}</td>
                                    @if(auth()->user()->role == 'Developer')
                                    <td>
                                        <a href="{{ route('dp.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table></div></div>
                    </div>
                </div>
                </div>
                <!-- /peserta -->
              </div>
              <!-- /tab -->
            </div>
        </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="showabsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rekap Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('konfirmasipem.update', 'test') }}">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="dfp_id" id="dfpid" value="">
          @include('absensi.vabsensi')
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
