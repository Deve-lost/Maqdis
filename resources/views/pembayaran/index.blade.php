@extends('layouts.master')
@section('title', 'Pembayaran')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="text-center">
            <h2>Detail Pembayaran</h2>
        </div>
        <hr>
        <form action="{{ route('bayar') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pull-left">
                <div class="panel panel-default height">
                    <div class="panel-heading">Pengajar</div>
                    <div class="panel-body">
                        <strong>Nama Pengajar:</strong>
                        {{ $request['pengajar_id'] }}<br>
                        <strong>Nama Program:</strong>
                        {{ $request['program_id'] }}<br>
                        <strong>Kelas:</strong>
                        {{ $request['kelas'] }}<br>
                        <strong>Hari:</strong>
                        {{ $request['hari'] }}<br>
                        <strong>Waktu:</strong>
                        {{ $request['waktu'] }}<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Pembayaran</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Jumlah Orang</strong></td>
                                    <td class="text-center"><strong>Harga</strong></td>
                                    <td class="text-right"><strong>Total Harga</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @if ($request['jml_org'] == '350000')
                                    @php
                                        $jml = 1;
                                    @endphp
                                @elseif ($request['jml_org'] == '450000')
                                    @php
                                        $jml = 2;
                                    @endphp
                                @elseif ($request['jml_org'] == '450000')
                                    @php
                                        $jml = 3;
                                    @endphp
                                @elseif ($request['jml_org'] == '500000')
                                    @php
                                        $jml = 4;
                                    @endphp
                                @elseif ($request['jml_org'] == '500000')
                                    @php
                                        $jml = 5;
                                    @endphp
                                @elseif ($request['jml_org'] == '500000')
                                    @php
                                        $jml = 6;
                                    @endphp
                                @elseif ($request['jml_org'] == '550000')
                                    @php
                                        $jml = 7;
                                    @endphp
                                @elseif ($request['jml_org'] == '550000')
                                    @php
                                        $jml = 8;
                                    @endphp
                                @elseif ($request['jml_org'] == '600000')
                                    @php
                                        $jml = 9;
                                    @endphp
                                @elseif ($request['jml_org'] == '600.000')
                                    @php
                                        $jml = 10;
                                    @endphp

                                @endif
                                <tr>
                                    <td class="thick-line">{{ $jml }} Orang</td>
                                    <td class="thick-line text-center"><strong>Rp.{{ $request['jml_org']}}</strong></td>
                                    <td class="thick-line text-right"><strong>Rp.{{ $hrg = $request['jml_org']+100000 }}</strong></td>
                                </tr>

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                </tr>

                                <tr>
                                    <td class="no-line text-primary"><span>*Biaya Pendaftaran : Rp.100.000</span></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><button class="btn btn-sm btn-primary">Bayar</button></td>
                                </tr>
                            </tbody>
                        </table>


                        <input type="hidden" name="nm_pengajar" value="{{ $request['pengajar_id'] }}">
                        <input type="hidden" name="nm_program" value="{{ $request['program_id'] }}">
                        <input type="hidden" name="hari" value="{{ $request['hari'] }}">
                        <input type="hidden" name="waktu" value="{{ $request['waktu'] }}">
                        <input type="hidden" name="kelas" value="{{ $request['kelas'] }}">
                        <input type="hidden" name="harga" value="{{ $hrg }}">
                        <input type="hidden" name="jml_org" value="{{ $jml }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#addteman').on('click', function(){
            $('#addrow').append('<div class="form-group mt-3"><input type="email" class="form-control" placeholder="Masukkan Email Teman"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></div>');
        });

    })
</script>
@endsection
