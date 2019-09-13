@extends('layouts.master')

@section('title', 'Profile Pengguna')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                Profile {{ $pengguna->name }}
            </div>
            <div class="card-body text-center">
                <b>Nama Pengguna : {{ $pengguna->name }}</b><br>
                <b>Email : {{ $pengguna->email }}</b><br>
                <p><b>Role : {{ $pengguna->role }}</b></p>
                <a href="{{ route('pengguna.ubahpw', $pengguna->id) }}" class="btn btn-primary btn-sm">Ubah Password</a>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
