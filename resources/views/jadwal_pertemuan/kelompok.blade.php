@extends('layouts.master')

@section('title')
  Kelompok Peserta {{ $ketua->name }}
@stop

@section('content')
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header bg-primary text-white">
        <i class="fas fa-table"></i>
        Kelompok Peserta {{ $ketua->name }}
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
                    @if(auth()->user()->role == 'Admin')
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Opsi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @forelse($peserta as $data)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $loop->iteration }}</td>
                      <td class="sorting_1">{{ $data->peserta->name }}</td>
                      <td>{{ $data->peserta->email }}</td>
                      <td>{{ $data->peserta->jk }}</td>
                      <td>{{ $data->peserta->kontak }}</td>
                      @if(auth()->user()->role == 'Admin')
                      <td>
                          <a href="#" class="btn btn-sm btn-danger delete" peserta-id="{{ $data->id }}" peserta-nm="{{ $data->peserta->name }}" ketua-nm="{{ $ketua->name }}"><i class="fa fa-trash"></i></a>
                      </td>
                      @endif
                    </tr>
                    @empty
                    <tr role="row" class="odd">
                      <td class="sorting_1" colspan="6">Data tidak ditemukan.</td>
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
            var ketua_nm = $(this).attr('ketua-nm');
            swal({
                  title: "Hapus!",
                  text: "Peserta "+peserta_nm+" Dari Kelompok "+ketua_nm+"?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/Maqdis/destroy-peserta/"+peserta_id+"/kelompok";
                  }
                });
        });
    </script>
@stop
