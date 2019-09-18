<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\KelompokPeserta;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate(request(),
        [
            'add' => 'required',
        ]);

        // dd($request->all());
        foreach ($request->add as $isi) {
             $check = new KelompokPeserta;
             $check->user_id = $id;
             $check->peserta_id = $isi;
             $check->status = 'Belum dikonfirmasi';
             $check->save();
         }

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
        //
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

    public function cek(Request $request,$id)
    {
        $idp = DB::table('users')->find($id);
        // $peserta = DB::table('peserta')->get();
        $peserta = DB::table('peserta')
                    // ->whereNotIn('user_id', ['auth()->user()->id'])
                    ->get();
        // dd($peserta);
        return view('peserta.tambah_peserta', ['peserta' => $peserta, 'idp' => $idp]);
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
        return redirect()->route('dashboard')->with('sukses', 'Anda telah berhasil bergabung');
    }

    public function konfirmasidelete(KelompokPeserta $kelompokpeserta)
    {
        $delete = DB::table('kelompok_peserta')
              ->where('peserta_id', auth()->user()->peserta_id)
              ->delete();

        return redirect()->route('dashboard')->with('sukses', 'Penolakan berhasil');
    }

}
