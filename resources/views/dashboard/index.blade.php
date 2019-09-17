@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('dashboard') }}">Dashboard</a>
		</li>
	</ol>

	@if(auth()->user()->role == 'Admin')
	<!-- Icon Cards-->
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-check"></i>
					</div>
					<div class="mr-5">{{ $pembayaran }} Konfirmasi Pembayaran</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
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
		<div class="card mb-3">
			<div class="card-header">
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
              @foreach ($konfirm as $data)
            <div class="alert alert-primary" role="alert">
                  {{ $data->user->name }} mengundang anda untuk bergabung!

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
              @endforeach

			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-table"></i>
					Daftar Program
				</div>
				<div class="card-body">
					<div class="row">
						<?php $icon = ["quran","books"] ?>
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
								<i class="fas fa-quran fa-stack-1x fa-inverse"></i>
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
								<i class="fas fa-praying-hands fa-stack-1x fa-inverse"></i>
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
				<div class="card-header">
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
