<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Jadwal;
use App\Pembayaran;
use App\Peserta;
use App\KelompokPeserta;

class AbsensiController extends Controller
{
    /*--- Function Admin ---*/
    public function index()
    {
        $absensipeng = Absensi::where('status', 'Pengajar')->latest()->get();
        $absensipes = Absensi::where('status', 'Peserta')->latest()->get();

        return view('absensi.rekap_kehadiran', compact('absensipeng','absensipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // Absensi Pengajar
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $date = date('d-m-Y');
        $absen = new Absensi;

        // Cek Double Data
        $cek_double = $absen->where(['tgl_kegiatan' => $date, 'user_id' => $user_id])
                              ->count();

            if ($cek_double>0) {
                return redirect()->back()->with('error', 'Anda Sudah Absen Hari Ini!');
            }else{
                $absen->create([
                    'user_id' => $user_id,
                    'nm_pengajar' => $request->pengajar_id,
                    'tgl_kegiatan' => $date,
                    'absensi' => 'Hadir',
                    'nm_program' => $request->nm_program,
                    'status' => 'Peserta'
                ]);
            return redirect()->route('absen.peserta')->with('sukses', 'Absen Berhasil');
            }
    }

    // Absensi Peserta
    public function storepes(Request $request)
    {
        $user_id = auth()->user()->id;
        $date = date('d-m-Y');
        $absen = new Absensi;

        // Cek Double Data
        $cek_double = $absen->where(['tgl_kegiatan' => $date, 'user_id' => $user_id])
                              ->count();

            if ($cek_double>0) {
                return redirect()->back()->with('error', 'Anda Sudah Absen Hari Ini!');
            }else{
                $absen->create([
                    'user_id' => $user_id,
                    'nm_pengajar' => $request->pengajar_id,
                    'tgl_kegiatan' => $date,
                    'absensi' => 'Hadir',
                    'nm_program' => $request->nm_program,
                    'status' => 'Peserta'
                ]);

            return redirect()->route('absen.peserta')->with('sukses', 'Absen Berhasil');
            }
    }

    public function store_pengajar(Request $request)
    {
        $user_id = auth()->user()->id;
        $date = date('d-m-Y');
        $absen = new Absensi;

        // Cek Double Data
        $cek_double = $absen->where(['tgl_kegiatan' => $date, 'user_id' => $user_id])
                              ->count();

            if ($cek_double>0) {
                return redirect()->back()->with('error', 'Anda Sudah Absen Hari Ini!');
            }else{
                $absen->create([
                    'user_id' => $user_id,
                    'nm_pengajar' => $request->pengajar_id,
                    'tgl_kegiatan' => $date,
                    'absensi' => 'Hadir',
                    'nm_program' => $request->nm_program,
                    'status' => 'Pengajar'
                ]);
                
                return redirect()->route('absen.pengajar')->with('sukses', 'Absen Berhasil');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function absensipeserta()
    {
        $id = auth()->user()->id;
        $peserta_id = auth()->user()->peserta_id;
        $absn = Absensi::where('user_id', $id)->orderBy('id', 'DESC')->get();
        $absensi = Pembayaran::where('user_id', $id)->where('status', 'Terverifikasi')->first();
        $peserta = KelompokPeserta::where('peserta_id', $peserta_id)->where('status', 'Dikonfirmasi')->first();

        return view('absensi.absensi_peserta', compact('absensi', 'absn', 'peserta'));
    }

    public function absensipengajar()
    {
        $ids = auth()->user()->id;
        $id = auth()->user()->name;
        $absn = Absensi::where('user_id', $ids)->orderBy('id', 'DESC')->get();
        $absensi = Pembayaran::where('nm_pengajar', $id)->first();
        $abspes = Absensi::where('nm_pengajar', auth()->user()->name)->get();

        return view('absensi.absensi_pengajar', compact('absn', 'abspes'), ['absensi' => $absensi]);
    }
}
