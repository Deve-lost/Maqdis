@extends('layouts.master')

@section('title', 'Status Pembayaran')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @foreach ($pembayaran as $data)
                {{-- expr --}}
            <div class="col-md-12 mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <strong class="h4">Status Pembayaran</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-title h5">Nama :  {{ $data->user->name }}</p>
                        <p class="card-text">Nama Program : {{ $data->nm_program }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
