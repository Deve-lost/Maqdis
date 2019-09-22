@extends('layouts.master')

@section('title', 'Data Peserta')

@section('content')
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb bg-primary">
      <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
      </li>
      <li class="breadcrumb-item active text-white">Data Peserta</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header bg-primary text-white">
        <i class="fas fa-table"></i>
        Data Peserta
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                  <form action="/Maqdis/store/{{$idp->id}}/teman/{{$pembayaran->id}}" method="POST">
                    @csrf
                <input type="hidden" name="jmlorg" value="{{ $jml }}">
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
                      <td class="sorting_1">{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->jk }}</td>
                      <td>{{ $data->kontak }}</td>
                      <td>
                        <label class="btn btn-primary control-inline fancy-checkbox {{ $errors->has('add') ? 'has-error' : '' }}">
                          <input data-id="{{ $jml }}" type="checkbox" class="check" name="add[]" value="{{ $data->id }}">
                          <span></span>
                          @if($errors->has('add'))
                          <span class="help-block">
                            <p>{{ $errors->first('add') }}</p>
                          </span>
                          @endif
                        </label>
                      </td>
                    </tr>
                    @empty
                    <tr role="row" class="odd">
                      <td class="sorting_1" colspan="7">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <td class="border-right-0"></td>
                    <td class="border-right-0"></td>
                    <td class="border-right-0"></td>
                    <td class="border-right-0"></td>
                    <td></td>
                    <td>
                        <button id="tambah" type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </td>
                  </tr>
                </tfoot>
                </form>
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

    <script type="text/javascript">
        $(document).ready(function(){
            var n = $("input:checkbox").attr("data-id");
            if(n == 0){
             $("input:checkbox:not(:checked)").attr("disabled", true);
            } else {
             $("input:checkbox:not(:checked)").attr("disabled", false);
            }
        });

             $("input:checkbox").click(function() {
                var jml = $("input:checkbox").attr("data-id");
                var bol = $("input:checkbox:checked").length >= jml-1;
                $("input:checkbox").not(":checked").attr("disabled",bol);
            });
    </script>
@stop
