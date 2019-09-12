@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
        Daftar Program</div>
        <div class="card-body">
            <h4>Pilihan Program</h4>
            <blockquote class="blockquote text-center">
                <p class="mb-0">Pilih kelas yang sesuai dengan keingan anda & jarak rumah anda ke kantor Maqdis</p>
            </blockquote>
            <div class="row">
                <div class="grid-wrapper">
                    <div class="card-wrapper">
                        <input class="c-card" type="checkbox" id="3" value="3">
                        <div class="card-content">
                            <div class="card-state-icon"></div>
                            <label for="3">
                                <div class="image"></div>
                                <h4>Subject</h4>
                                <h5>Type &bull; something else</h5>
                                <p class="small-meta dim">Date sent</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <select name="hari" id="" class="form-control">
                        <option value=" "disable>Pilih Hari</option>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jum'at</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </div>
                <div class="col">
                    <select name="jam" id="" class="form-control">
                        <option value=" " disabled>Pilih Jam</option>
                        <option value="08.00">08.00</option>
                        <option value="13.00">13.00</option>
                        <option value="10.00">10.00</option>
                        <option value="15.30">15.30</option>
                    </select>
                </div>
            </div>
            <h5 class="text-center m-3">Pilih Bentuk KBM</h5>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <label>
                        <input type="radio" name="product" class="card-input-element" />
                        <div class="panel panel-default card-input">
                            <div class="panel-heading">Privat</div>
                            <div class="panel-body">
                                KBM diselenggrakan pada waktu dan tempat yang telah ditentukan oleh peserta
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <label>
                        <input type="radio" name="product" class="card-input-element" />
                        <div class="panel panel-default card-input">
                            <div class="panel-heading">Reguler</div>
                            <div class="panel-body">
                                KBM diselenggrakan pada waktu dan tempat yang telah ditentukan oleh Maqdis
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
