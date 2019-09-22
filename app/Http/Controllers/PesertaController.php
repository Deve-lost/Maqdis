<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\KelompokPeserta;
use App\Pembayaran;
use App\User;
use DB;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::latest()->get();

        return view('peserta.index', compact('peserta'));
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

    public function cek(Request $request, $user, $pembayaran)
    {
        $idp = User::where('id', $user)->first();
        $jmltmn = Pembayaran::where('user_id', auth()->user()->id)->pluck('jml_org')->first();
        $pembayaran = Pembayaran::where('id', $pembayaran)->first();
        $peserta = DB::table('peserta')->latest()->get();

        return view('peserta.tambah_peserta',compact('pembayaran'), ['peserta' => $peserta, 'idp' => $idp, 'jml' => $jmltmn]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Pembayaran $pembayaran)
    {
        $this->validate(request(),
        [
            'add' => 'required',
        ]);
        $idu = $user->id;
        $bayar = $pembayaran->id;

        $jmlorg = $request->jmlorg;
        $jumlah = count($request->add);
        $tes = $jmlorg-$jumlah;
        foreach ($request->add as $isi) {
             $check = new KelompokPeserta;
             $check->user_id = $idu;
             $check->pembayaran_id = $bayar;
             $check->peserta_id = $isi;
             $check->status = 'Belum dikonfirmasi';
             $check->save();
         }

         $jml = DB::table('pembayaran')
            ->where('user_id', $idu)
            ->update(['jml_org' => $tes]);



         return redirect()->route('jadwal.pertemuan')->with('sukses', 'Berhasil Ditambahkan');
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
        $up = DB::table('peserta')
        ->where('id', $id)
        ->update([
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'status' => $request->status,
        ]);

        return redirect()->route('ds.index')->with('sukses', 'Identitas Berhasil Diperbaharui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('ds.index')->with('sukses', 'Data Berhasil Dihapus');
    }


    public function gantifoto(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:jpg,jpeg,png'
        ]);

        // $bayar = $request->all();
        // $data = [
        //     'id' => $peserta->id
        // ];


        $file_foto = $request->file('avatar');

        if($file_foto){
            $fileName = $file_foto->getClientOriginalName();
            $data['avatar'] = $fileName;

            $proses = $file_foto->move('images/avatar/', $fileName);
        }

        try{
            DB::table('users')->where('id', $id)->update($data);
            return redirect()->back()->with('sukses','Berhasil diganti');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','');
        }
    }

    public function konfirmasigrup(KelompokPeserta $kelompokpeserta)
    {
        $update = DB::table('kelompok_peserta')
              ->where('peserta_id', auth()->user()->peserta_id)
              ->update([
                'status' => 'Dikonfirmasi'
            ]);
        return redirect()->route('dashboard')->with('sukses', 'Anda Berhasil Bergabung');
    }

    public function konfirmasidelete(KelompokPeserta $kelompokpeserta)
    {
        $delete = DB::table('kelompok_peserta')
              ->where('peserta_id', auth()->user()->peserta_id)
              ->delete();

        return redirect()->route('dashboard')->with('sukses', 'Penolakan Berhasil');
    }

}
