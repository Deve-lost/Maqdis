@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
	  <li class="breadcrumb-item">
	    <a href="{{ route('dashboard') }}">Dashboard</a>
	  </li>
	  <!-- <li class="breadcrumb-item active">Overview</li> -->
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
	        <div class="mr-5">Konfirmasi Pembayaran</div>
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
	        <div class="mr-5">11 Total Pengajar</div>
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
	        <div class="mr-5">123 Total Peserta</div>
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
	        <div class="mr-5">13 Total Pengguna</div>
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
	<div class="row">
	  <div class="col-xl-3 col-sm-6 mb-3">
	    <div class="card text-white bg-primary o-hidden h-100">
	      <div class="card-body">
	        <div class="card-body-icon">
	          <i class="fas fa-fw fa-users"></i>
	        </div>
	        <div class="mr-5">10 Total Peserta Yang Di Ajar</div>
	      </div>
	      <a class="card-footer text-white clearfix small z-1" href="#">
	        <span class="float-left">View Details</span>
	        <span class="float-right">
	          <i class="fas fa-angle-right"></i>
	        </span>
	      </a>
	    </div>
	  </div>
	</div>
	@endif

	@if(auth()->user()->role == 'Peserta')
	<div class="container-fluid">
    <!-- Icon Cards-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
        Daftar Program
    	</div>
        <div class="card-body">
            <div class="row">
                @forelse($programs as $data)
                <div class="col-md-3">
                    <label>
                        <div class="panel panel-default card-input tinggi" style="height: 230px">
                            <div class="panel-heading">{{ $data->nm_program }}</div>
                            <div class="panel-body">
                                {{ $data->deskripsi }}
                            </div>
                        </div>
                    </label>
                </div>
                @empty
                Data Tidak ada.
                @endforelse
            </div>
	    </div>
	</div>
	@endif
</div>
@stop
