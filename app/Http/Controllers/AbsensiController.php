<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Jadwal;

class AbsensiController extends Controller
{
    /*--- Function Admin ---*/
    public function index()
    {
        $absensi = Absensi::latest()->get();

        return view('absensi.rekap_kehadiran', compact('absensi'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absen = Absensi::create([
            'user_id' => auth()->user()->id,
            'pengajar_id' => $request->pengajar_id,
            'tgl_kegiatan' => '2019-14-09',
            'absensi' => 'Hadir',
            'status' => 'Hadir'
        ]);

        return redirect()->route('absen.peserta')->with('sukses', 'Anda Telah Absen Hari Ini');
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
        $abs = Absensi::where('user_id',$id)->first();
        $absensi = Jadwal::first();
        return view('absensi.absensi_peserta', ['absensi' => $absensi, 'abs' => $abs]);
    }
}
