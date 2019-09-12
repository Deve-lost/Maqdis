@extends('layouts.master')

@section('title', 'Edit Pengajar')

@section('content')
<div id="content-wrapper">
    <div class="container">
        <div class="container-fluid">
            <form action="{{ route('dp.update', $pengajar->id) }}" class="form-horizontal" method="POST">
                @csrf
                <div class="row mx-auto mt-5 justify-content-center">
                    <div class="col-md-10">
                        <div class="form-group {{$errors->has('nm_pengajar') ? ' has-error' : ''}}">
                            <label for="nm_pengajar" class="col-xs-3 control-label">Nama Pengajar</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="nm_pengajar" name="nm_pengajar" placeholder="Masukkan Nama Pengajar" value="{{ $pengajar->nm_pengajar }}">
                            </div>
                            @if($errors->has('nm_pengajar'))
                                <span class="help-block text-danger">{{$errors->first('nm_pengajar')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('pendidikan') ? ' has-error' : ''}}">
                            <label for="pendidikan" class="col-xs-3 control-label">Pendidikan</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir" value="{{ $pengajar->pendidikan }}">
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
                                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukkan Kontak" value="{{ $pengajar->kontak }}">
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
                                  <option value="Laki-Laki" @if($pengajar->jk == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                  <option value="Perempuan" @if($pengajar->jk == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('ttl') ? ' has-error' : ''}}">
                            <label for="ttl" class="col-xs-3 control-label">Tempat Tanggal Lahir</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Kab/Kota, Tanggal Bulan Tahun" value="{{ $pengajar->ttl }}">
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
                                <textarea class="form-control" id="pengalaman_kerja" rows="3" name="pengalaman_kerja">{{ $pengajar->pengalaman_kerja }}</textarea>
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
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $pengajar->alamat }}</textarea>
                            </div>
                            @if($errors->has('alamat'))
                                <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-10 mt-3">
                        <div class="form-group">
                            <div class="col-xs">
                                <button type="submit" class="btn btn-warning">Perbaharui</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
