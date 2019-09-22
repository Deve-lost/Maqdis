<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Pengajar;
use App\Peserta;
use App\Pembayaran;
use App\User;
use App\BiayaPendidikan;
use App\KelompokPeserta;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::latest()->get();
        $biayapendidikan = BiayaPendidikan::all();
        $pembayaran = Pembayaran::where('status', 'Belum Terverifikasi')->count();
        $terverifikasi = Pembayaran::where('status', 'Terverifikasi')->count();
        $pengajar = Pengajar::count();
        $peserta  = Peserta::count();
        $user     = User::count();
        // $id = User::find(id);
        $identitas = Peserta::where('id', auth()->user()->peserta_id)->first();
        $konfirm = KelompokPeserta::where('peserta_id', auth()->user()->peserta_id)->where('status', 'Belum dikonfirmasi')->get();
        // dd($konfirm);

        return view('dashboard.index', compact('programs', 'biayapendidikan','konfirm'), ['pengajar' => $pengajar, 'peserta' => $peserta, 'pengguna' => $user, 'pembayaran' => $pembayaran, 'terverifikasi' => $terverifikasi, 'identitas' => $identitas]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
