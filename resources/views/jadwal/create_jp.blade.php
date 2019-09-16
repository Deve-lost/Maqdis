@extends('layouts.master')

@section('title', 'Tambah Jadwal')

@section('content')
<div id="content-wrapper">
    <div class="container">
        <div class="container-fluid">
            <form action="{{ route('jp.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="row mx-auto mt-5 justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('pengajar_id') ? ' has-error' : ''}}">
                            <label for="pengajar_id" class="col-xs-3 control-label">Pengajar</label>
                            <div class="col-xs-9">
                                <select class="form-control" id="pengajar_id" name="pengajar_id">
                                    @foreach($pengajars as $pengajar)
                                    <option value="{{ $pengajar->id }}">{{ $pengajar->nm_pengajar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('pengajar_id'))
                                <span class="help-block text-danger">{{$errors->first('pengajar_id')}}</span>
                            @endif
                        </div>
                      </div>

                        <div class="col-md-5">
                        <div class="form-group {{$errors->has('program_id') ? ' has-error' : ''}}">
                            <label for="program_id" class="col-xs-3 control-label">Program</label>
                            <div class="col-xs-9">
                                <select class="form-control" id="program_id" name="program_id">
                                    @foreach($program as $prog)
                                    <option value="{{ $prog->id }}">{{ $prog->nm_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('program_id'))
                                <span class="help-block text-danger">{{$errors->first('program_id')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('waktu') ? ' has-error' : ''}}">
                            <label for="waktu" class="col-xs-3 control-label">Waktu</label>
                            <div class="col-xs-9">
                                <select class="form-control" id="waktu" name="waktu">
                                  <option value="08.00 WIB">O8.00 WIB</option>
                                  <option value="10.00 WIB">10.00 WIB</option>
                                  <option value="13.00 WIB">13.00 WIB</option>
                                  <option value="15.30 WIB">15.30 WIB</option>
                                </select>
                            </div>
                            @if($errors->has('waktu'))
                                <span class="help-block text-danger">{{$errors->first('waktu')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
                            <label for="kelas" class="col-xs-3 control-label">Kelas</label>
                            <div class="col-xs-9">
                                <select class="form-control" id="kelas" name="kelas">
                                  <option value="Dekat">Dekat</option>
                                  <option value="Jauh">Jauh</option>
                                  <option value="Malam">Malam</option>
                                  <option value="Jauh + Malam">Jauh + Malam</option>
                                </select>
                            </div>
                            @if($errors->has('kelas'))
                                <span class="help-block text-danger">{{$errors->first('kelas')}}</span>
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
