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
                    <div class="panel-heading bg-primary text-white">Pengajar</div>
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
                <div class="panel-heading bg-primary text-white">
                    <h3 class="panel-title"><strong>Pembayaran</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Jumlah Orang</strong></td>
                                    <td class="text-center"><strong>Harga</strong></td>
                                    <td class="text-right"><strong>Biaya Pendidikan</strong></td>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                {{-- 1 Orang --}}
                                @if ($request['jml_org'] == '1' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 1;
                                        $bp = 350000;
                                    @endphp
                                @elseif ($request['jml_org'] == '1' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 1;
                                        $bp = 400000;
                                    @endphp
                                @elseif ($request['jml_org'] == '1' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 1;
                                        $bp = 400000;
                                    @endphp
                                @elseif ($request['jml_org'] == '1' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 1;
                                        $bp = 450000;
                                    @endphp
                                {{-- 2 Orang --}}
                                @elseif ($request['jml_org'] == '2' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 2;
                                        $bp = 450000;
                                    @endphp
                                @elseif ($request['jml_org'] == '2' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 2;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '2' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 2;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '2' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 2;
                                        $bp = 550000;
                                    @endphp
                                {{-- 3 Orang --}}
                                @elseif ($request['jml_org'] == '3' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 3;
                                        $bp = 450000;
                                    @endphp
                                @elseif ($request['jml_org'] == '3' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 3;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '3' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 3;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '3' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 3;
                                        $bp = 550000;
                                    @endphp
                                {{-- 4 Orang --}}
                                @elseif ($request['jml_org'] == '4' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 4;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '4' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 4;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '4' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 4;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '4' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 4;
                                        $bp = 600000;
                                    @endphp
                                {{-- 5 Orang --}}
                                @elseif ($request['jml_org'] == '5' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 5;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '5' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 5;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '5' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 5;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '5' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 5;
                                        $bp = 600000;
                                    @endphp
                                {{-- 6 Orang --}}
                                @elseif ($request['jml_org'] == '6' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 6;
                                        $bp = 500000;
                                    @endphp
                                @elseif ($request['jml_org'] == '6' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 6;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '6' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 6;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '6' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 6;
                                        $bp = 600000;
                                    @endphp
                                {{-- 7 Orang --}}
                                @elseif ($request['jml_org'] == '7' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 7;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '7' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 7;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '7' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 7;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '7' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 7;
                                        $bp = 650000;
                                    @endphp
                                {{-- 8 Orang --}}
                                @elseif ($request['jml_org'] == '8' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 8;
                                        $bp = 550000;
                                    @endphp
                                @elseif ($request['jml_org'] == '8' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 8;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '8' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 8;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '8' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 8;
                                        $bp = 650000;
                                    @endphp
                                {{-- 9 Orang --}}
                                @elseif ($request['jml_org'] == '9' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 9;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '9' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 9;
                                        $bp = 650000;
                                    @endphp
                                @elseif ($request['jml_org'] == '9' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 9;
                                        $bp = 650000;
                                    @endphp
                                @elseif ($request['jml_org'] == '9' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 9;
                                        $bp = 700000;
                                    @endphp
                                {{-- 10 Orang --}}
                                @elseif ($request['jml_org'] == '10' && $request['kelas'] == 'Dekat')
                                    @php
                                        $jml = 10;
                                        $bp = 600000;
                                    @endphp
                                @elseif ($request['jml_org'] == '10' && $request['kelas'] == 'Jauh')
                                    @php
                                        $jml = 10;
                                        $bp = 650000;
                                    @endphp
                                @elseif ($request['jml_org'] == '10' && $request['kelas'] == 'Malam')
                                    @php
                                        $jml = 10;
                                        $bp = 650000;
                                    @endphp
                                @elseif ($request['jml_org'] == '10' && $request['kelas'] == 'Jauh + Malam')
                                    @php
                                        $jml = 10;
                                        $bp = 700000;
                                    @endphp


                                @endif
                                <tr>
                                    <td class="thick-line">{{ $jml }} Orang</td>
                                    <td class="thick-line text-center"><strong>Rp.{{ number_format($bp,0,',','.') }}</strong></td>
                                    <td class="thick-line text-right"><strong>Rp.{{ number_format($hrg = $bp+100000,0,',','.') }}</strong></td>
                                </tr>

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                </tr>

                                <tr>
                                    <td class="no-line text-primary"><span>* Biaya Pendaftaran : Rp.100.000</span></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><button class="btn btn-sm btn-primary">Bayar</button></td>
                                </tr>
                            </tbody>
                        </table>

                        @if ($jml == 1)
                            @php
                                $jml = 0;
                            @endphp
                        @endif
                        <input type="hidden" name="nm_pengajar" value="{{ $request['pengajar_id'] }}">
                        <input type="hidden" name="avatar" value="{{ $request['avatar'] }}">
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
