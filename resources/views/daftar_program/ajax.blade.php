{{-- {{  dd($search)}} --}}
{{-- {{ dd($search['kelas']) }} --}}

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
                    <h5 class="card-title text-center h2">{{ $data->nm_pengajar }}</h5>
                    <p class="card-text text-center"><strong>Jenis Kelamin</strong> : {{ $data->jk }}</p>
                    <p class="card-text text-center"><strong>Pendidikan</strong> : {{ $data->pendidikan }}</p>
                    <p class="card-text text-center"><strong>Kontak</strong> : {{ $data->kontak }}</p>
                    <button class="btn btn-primary">Pesan</button>
                </div>
            </div>
        </div>
            <input type="hidden" name="pengajar_id" value="{{ $data->nm_pengajar }}">
            <input type="hidden" name="kelas" value="{{ $search['kelas'] }}">
            <input type="hidden" name="program_id" value="{{ $data->nm_program }}">
            <input type="hidden" name="waktu" value="{{ $data->waktu }}">
            <input type="hidden" name="hari" value="{{ $search['hari'] }}">
            <input type="hidden" name="jml_org" value="{{ $search['jml_org'] }}">
        @endforeach
        </form>
    </div>
</div>
@endsection
