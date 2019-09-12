@extends('layouts.master')

@section('title', 'Tambah Pengajar')

@section('content')
<div id="content-wrapper">
    <div class="container">
        <div class="container-fluid">
            <form action="{{ route('dp.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="row mx-auto mt-5 justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('nm_pengajar') ? ' has-error' : ''}}">
                            <label for="nm_pengajar" class="col-xs-3 control-label">Nama Pengajar</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="nm_pengajar" name="nm_pengajar" placeholder="Masukkan Nama Pengajar" value="{{ old('nm_pengajar') }}">
                            </div>
                            @if($errors->has('nm_pengajar'))
                                <span class="help-block text-danger">{{$errors->first('nm_pengajar')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                            <label for="email" class="col-xs-3 control-label">Email</label>
                            <div class="col-xs-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Pengajar" value="{{ old('email') }}">
                            </div>
                            @if($errors->has('email'))
                                <span class="help-block text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('pendidikan') ? ' has-error' : ''}}">
                            <label for="pendidikan" class="col-xs-3 control-label">Pendidikan</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan') }}">
                            </div>
                            @if($errors->has('pendidikan'))
                                <span class="help-block text-danger">{{$errors->first('pendidikan')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('kontak') ? ' has-error' : ''}}">
                            <label for="kontak" class="col-xs-3 control-label">Kontak</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="No Wa/Hp" value="{{ old('kontak') }}">
                            </div>
                            @if($errors->has('kontak'))
                                <span class="help-block text-danger">{{$errors->first('kontak')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="jk" class="col-xs-3 control-label">Jenis Kelamin</label>
                            <div class="col-xs-9">
                                <select class="form-control" id="jk" name="jk">
                                  <option value="Laki-Laki" {{(old('jk') == 'Laki-Laki') ? ' selected' : ''}}>Laki-Laki</option>
                                  <option value="Perempuan" {{(old('jk') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
                            <label for="ttl" class="col-xs-3 control-label">Tanggal Lahir</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="ttl" name="ttl" value="{{ old('ttl') }}" placeholder="Kab/Kota, Tanggal Bulan Tahun">
                            </div>
                            @if($errors->has('ttl'))
                                <span class="help-block text-danger">{{$errors->first('ttl')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('pengalaman_kerja') ? ' has-error' : ''}}">
                            <label for="pengalaman_kerja" class="col-xs-3 control-label">Pengalaman Kerja</label>
                            <div class="col-xs-9">
                                <textarea class="form-control" id="pengalaman_kerja" rows="3" name="pengalaman_kerja">{{ old('pengalaman_kerja') }}</textarea>
                            </div>
                            @if($errors->has('pengalaman_kerja'))
                                <span class="help-block text-danger">{{$errors->first('pengalaman_kerja')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                            <label for="alamat" class="col-xs-3 control-label">Alamat</label>
                            <div class="col-xs-9">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                            </div>
                            @if($errors->has('alamat'))
                                <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-10 mt-3">
                        <div class="form-group">
                            <div class="col-xs">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
