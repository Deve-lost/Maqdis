<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;

class KonfirmasiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::where('status', 'Belum Terverifikasi')->latest()->get();

        return view('konfirmasi_pembayaran.index', compact('pembayaran'));
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
    public function update(Request $request)
    {
        $dfp = Pembayaran::findOrFail($request->dfp_id);
        $dfp->status = 'Terverifikasi';
        $dfp->update();

        return redirect()->route('konfirmasipem.index')->with('sukses', 'Terverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        // unlink('images/struk/'.$pembayaran->struk);
        $pembayaran->delete();

        return redirect()->route('konfirmasipem.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
