@extends('layouts.master')

@section('title', 'Cari Pengajar')

@section('content')
    {{-- expr --}}
<div class="container-fluid">
    <div class="row">
        <form action="{{ route('cobaan') }}" method="post">
        @csrf
        @foreach ($jdw as $data)
            {{-- expr --}}
        <div class="col-md-3 mt-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('user.png') }}" style="width:100px;" class="mx-auto pt-2" alt="image">
                <div class="card-body">
                    <h5 class="card-title text-center h2">{{ $data->pengajar_id }}</h5>
                    <p class="card-text">lorem ipsum dolor</p>
                    <button class="btn btn-primary">Pesan</button>
                </div>
            </div>
        </div>
            <input type="hidden" name="pengajar_id" value="{{ $data->pengajar_id }}">
            <input type="hidden" name="kelas" value="{{ $search['kelas'] }}">
            <input type="hidden" name="program_id" value="{{ $data->program_id }}">
            <input type="hidden" name="waktu" value="{{ $data->waktu }}">
            <input type="hidden" name="hari" value="{{ $search['hari'] }}">
            <input type="hidden" name="jml_org" value="{{ $search['jml_org'] }}">
        @endforeach
        </form>
    </div>
</div>
@endsection
