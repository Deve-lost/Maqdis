@extends('layouts.master')

@section('title', 'Tambah Pengguna')

@section('content')
<div id="content-wrapper">
    <div class="container">
        <div class="container-fluid">
            <form action="{{ route('pengguna.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="row mx-auto mt-5 justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                            <label for="name" class="col-xs-3 control-label">Nama Pengguna</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pengguna" value="{{ old('name') }}">
                            </div>
                            @if($errors->has('name'))
                                <span class="help-block text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                            <label for="email" class="col-xs-3 control-label">Email</label>
                            <div class="col-xs-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Pengguna" value="{{ old('email') }}">
                            </div>
                            @if($errors->has('email'))
                                <span class="help-block text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-10 mt-3">
                        <div class="form-group">
                            <div class="col-xs">
                                <button type="submit" class="btn btn-primary btn-sm">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
