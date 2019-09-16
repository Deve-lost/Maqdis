<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\KelompokPeserta;
use DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $req = $request->all();
        $peserta = DB::table('peserta')
            // ->leftJoin('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_siswa.kelas_id')
            ->get();
        return view('pembayaran.index', ['request' => $req, 'peserta' => $peserta]);
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
        // foreach ($request->jml_org as $isi) {
        //     $pembayaran = new Pembayaran;
        //     $pembayaran->user_id = auth()->user()->id;
        //     $pembayaran->jml_org = $isi;
        //     $pembayaran->nm_program = $request->nm_program;
        //     $pembayaran->nm_pengajar = $request->nm_pengajar;
        //     $pembayaran->hari = $request->hari;
        //     $pembayaran->waktu = $request->waktu;
        //     $pembayaran->kelas = $request->kelas;
        //     $pembayaran->harga = $request->harga;
        //     $pembayaran->status = 'Belum Terkonfirmasi';
        //     $pembayaran->save();
        // }
        $pembayaran = Pembayaran::create([
            'user_id' => auth()->user()->id,
            'jml_org' => $request->jml_org,
            'nm_program' => $request->nm_program,
            'nm_pengajar' => $request->nm_pengajar,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'kelas' => $request->kelas,
            'harga' => $request->harga,
            'status' => 'Belum Terverifikasi'
        ]);

        return redirect()->route('status.pembayaran')->with('sukses', 'Berhasil Mendaftar');
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
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $this->validate($request, [
            'struk' => 'required|mimes:jpg,jpeg,png'
        ]);

        $bayar = $request->all();
        $data = [
            'user_id' => auth()->user()->id
        ];

        $file_foto = $request->file('struk');

        if($file_foto){
            $fileName = $file_foto->getClientOriginalName();
            $data['struk'] = $fileName;

            $proses = $file_foto->move('images/struk/', $fileName);
        }

        try{
            DB::table('pembayaran')->where('user_id', $data['user_id'])->update($data);
            return redirect()->route('status.pembayaran')->with('sukses','Pembayaran Berhasil');
        }
        catch(\Exception $e){
            return redirect()->route('status.pembayaran')->with('error','');
        }

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
        $pembayaran = Pembayaran::where('user_id', $id)->where('status', 'Terverifikasi')->first();

        return view('jadwal_pertemuan.index', ['pembayaran' => $pembayaran]);
    }

    public function statuspembayaran()
    {
        $id = auth()->user()->id;
        $idp = KelompokPeserta::pluck('user_id')->first();
        $pembayaran = Pembayaran::where('user_id', $id)->orWhere('user_id', $idp)->first();
        return view('pembayaran.status_pembayaran', ['pembayaran' => $pembayaran]);
    }

    public function cobadulu(Request $request)
    {
        $this->validate($request, [
            'struk' => 'required|mimes:jpg,jpeg,png'
        ]);
        dd($request->all());
    }

}
