<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $req = $request->all();
        return view('pembayaran.index', ['request' => $req]);
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
        // dd($request->all());
        $pembayaran = Pembayaran::create([
            'user_id' => auth()->user()->id,
            'jml_org' => $request->jml_org,
            'nm_program' => $request->nm_program,
            'nm_pengajar' => $request->nm_pengajar,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dashboard');
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

    // Jadwal Pertemuan
    public function jadwalpertemuan()
    {
        $id = auth()->user()->id;
        $pembayaran = Pembayaran::where('user_id', $id)->get();
        return view('jadwal_pertemuan.index', ['pembayaran' => $pembayaran]);
    }
}
