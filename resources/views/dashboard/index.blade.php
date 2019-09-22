@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb bg-primary">
		<li class="breadcrumb-item">
			<a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
		</li>
	</ol>

	@if(auth()->user()->role == 'Admin')
	<!-- Icon Cards-->
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-clipboard-check"></i>
					</div>
					<div class="mr-5">{{ $pembayaran }} Total Verifikasi Pembayaran</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('konfirmasipem.index') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-check-circle"></i>
					</div>
					<div class="mr-5">{{ $terverifikasi }} Total Pembayaran Terverifikasi</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('terverifikasi.index') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-users"></i>
					</div>
					<div class="mr-5">{{ $pengajar }} Total Pengajar</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('dp.index') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>

		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-users"></i>
					</div>
					<div class="mr-5">{{ $peserta }} Total Peserta</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('ds.index') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-users"></i>
					</div>
					<div class="mr-5">{{ $pengguna }} Total Pengguna</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="{{ route('pengguna.index') }}">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
	</div>
	@endif

	@if(auth()->user()->role == 'Pengajar')
	<div class="container-fluid">
    @if ($identitasguru->nm_panggilan == '')
        {{-- form --}}
        <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table"></i>
                    Assalamu'alaikum {{ auth()->user()->name }}. Identitas anda belum lengkap.
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                        <form class="form-inline" method="POST" action="/Maqdis/update/{{ auth()->user()->id }}/identitasguru">
                            <strong>Nama Panggilan</strong>
                        </div>
                        @csrf
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="nm_panggilan" placeholder="Masukkan Nama Panggilan">
                            </div>
                        </div>

                    </div>
<hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                            <strong>Nama Ayah Kandung</strong>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="nm_ayah_kandung" placeholder="Masukkan Nama Ayah Kandung">
                            </div>
                        </div>
                    </div>
<hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                            <strong>Nama Ibu Kandung</strong>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="nm_ibu_kandung" placeholder="Masukkan Nama Ibu Kandung">
                            </div>
                        </div>
                    </div>
<hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                            <strong>Nama Kakek Dari Ayah</strong>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="nm_kakek_dari_ayah" placeholder="Masukkan Nama Kakek Dari Ayah">
                            </div>
                        </div>
                    </div>

<hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                            <strong>No.KTP/SIM/PASSPORT</strong>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_ktp_sim_passport" placeholder="Masukkan No.KTP/SIM/PASSPORT">
                            </div>
                        </div>
                    </div>
<hr>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-4" >
                            <strong>Status</strong>
                        </div>
                        <div class="col-md-4" >
                            <select name="status" class="form-control">
                              <option value="Menikah">Menikah</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Janda/Duda">Janda/Duda</option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row mt-3 text-center">
                        <div class="col-md-12" >
                            <button class="btn btn-sm btn-primary">Perbaharui</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            @endif


		<div class="card mb-3">
			<div class="card-header bg-primary text-white">
				<i class="fas fa-table">
				Biaya Pendidikan
				</i>
			</div>
			<div class="card-body">
				<p class="text-primary"><b>Biaya Pendaftaran Rp.100.000</b></p>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row"><div class="col-sm-12">
									<table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
										<thead>
											<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
											<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Jumlah Peserta</th>
											<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Dekat</th>
											<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Jauh/Malam</th>
											<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Jauh + Malam</th>
										</tr>
									</thead>
									<tbody>
										@forelse($biayapendidikan as $bi)
										<tr role="row" class="odd">
											<td class="sorting_1">{{ $loop->iteration }}</td>
											<td class="sorting_1">{{ $bi->jml_peserta }}</td>
											<td>{{ $bi->dekat }}</td>
											<td>{{ $bi->jauh_malam }}</td>
											<td>{{ $bi->jauhdanmalam }}</td>
										</tr>
										@empty
										<tr role="row" class="odd">
											<td class="sorting_1" colspan="5">Tidak Ada Data</td>
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
		@endif

		@if(auth()->user()->role == 'Peserta')
    	<div class="container-fluid">
			<!-- Icon Cards-->
              @forelse ($konfirm as $data)
            <div class="alert alert-primary" role="alert">
                  {{ $data->user->name }} mengundang anda untuk bergabung!
                  <div class="float-right">

                <form action="{{ route('konfir.grup') }}" method="POST" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
                </form>
                  </div>
                  <div class="float-right mr-2">

                <form action="{{ route('konfir.delete') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                </form>
                  </div>
            </div>


            @empty

            @endforelse

            @if ($identitas->status == '')
                {{-- expr --}}
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table"></i>
                    Assalamu'alaikum {{ auth()->user()->name }}. Identitas anda belum lengkap.
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4" >
                        <form class="form-inline" method="POST" action="/Maqdis/update/{{ auth()->user()->peserta_id }}/identitas">
                            <strong>Pendidikan Terakhir</strong>
                        </div>
                        @csrf
                        <div class="col-md-4" >
                            <select name="pendidikan" class="form-control">
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="PT S1/S2/S3">PT S1/S2/S3</option>
                              <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-4" >
                            <strong>Pekerjaan</strong>
                        </div>
                        <div class="col-md-4" >
                            <select name="pekerjaan" class="form-control">
                              <option value="PNS">PNS</option>
                              <option value="TNI/Polri">TNI/Polri</option>
                              <option value="Peg.Swasta">Peg.Swasta</option>
                              <option value="Pelajar">Pelajar</option>
                              <option value="Mahasiswa">Mahasiswa</option>
                              <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-4" >
                            <strong>Status</strong>
                        </div>
                        <div class="col-md-4" >
                            <select name="status" class="form-control">
                              <option value="Menikah">Menikah</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Janda/Duda">Janda/Duda</option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row mt-3 text-center">
                        <div class="col-md-12" >
                            <button class="btn btn-sm btn-primary">Perbaharui</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            @endif



            <div class="card mb-3">
				<div class="card-header bg-primary text-white">
					<i class="fas fa-table"></i>
					Daftar Program
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-book-open fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Ihsan
							</h4>
							<p class="text-muted">Program belajar membaca Al-Quran dari dasar dengan target menjadi pembaca Al-Quran yang lancar, baik dan benar</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-praying-hands fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Tahsin
							</h4>
							<p class="text-muted">
								Program memperbaiki bacaan Al-Quran dengan target menjadi guru Al-Quran yang produktif
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-book-reader fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Tahfizh
							</h4>
							<p class="text-muted">
								Program menghafal Al-Quran
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-assistive-listening-systems fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Maqomat (Irama)
							</h4>
							<p class="text-muted">
								Program memperindah bacaan Al-Quran
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-kaaba fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Bahasa Arabqu
							</h4>
							<p class="text-muted">
								Program bimbingan bahasa arab untuk menerjemahkan Al-Quran
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-star-and-crescent fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								TakTik
							</h4>
							<p class="text-muted">
								Program Tafsir kajian tematik
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-mosque fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Ta-Mat Al-Jazary
							</h4>
							<p class="text-muted">
								Program Talaqi Matan Al-Jazary
							</p>
						</div>

						<div class="col-md-4 text-center" >
							<span class="fa-stack fa-4x">
								<i class="fas fa-circle fa-stack-2x text-primary"></i>
								<i class="fas fa-book-reader fa-stack-1x fa-inverse"></i>
							</span>
							<h4 class="service-heading">
								Mahir Membaca Mushaf Madinah
							</h4>
							<p class="text-muted">
								Program penguasaan tanda-tanda baca dalam mushaf madinah
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header bg-primary text-white">
					<i class="fas fa-table">
					Biaya Pendidikan
					</i>
				</div>
				<div class="card-body">
					<p class="text-primary"><b>Biaya Pendaftaran Rp.100.000</b></p>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
									<div class="row"><div class="col-sm-12">
										<table class="table table-bordered dataTable table-striped" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
											<thead>
												<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 6px;">No</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Jumlah Peserta</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 21px;">Dekat</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 74px;">Jauh/Malam</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 1px;">Jauh + Malam</th>
											</tr>
										</thead>
										<tbody>
											@forelse($biayapendidikan as $bi)
											<tr role="row" class="odd">
												<td class="sorting_1">{{ $loop->iteration }}</td>
												<td class="sorting_1">{{ $bi->jml_peserta }}</td>
												<td>{{ $bi->dekat }}</td>
												<td>{{ $bi->jauh_malam }}</td>
												<td>{{ $bi->jauhdanmalam }}</td>
											</tr>
											@empty
											<tr role="row" class="odd">
												<td class="sorting_1" colspan="5">Tidak Ada Data</td>
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
			@endif
		</div>
		@stop
