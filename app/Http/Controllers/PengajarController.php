<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengajar;
use App\Program;
use App\Kecamatan;
use App\Jadwal;
use App\User;
use DB;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = Pengajar::latest()->get();

        return view('data_pengajar.index', ['pengajar' => $pengajar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pengajar.create_dp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nm_pengajar' => 'required',
            'email' => 'required|max:100|unique:users',
            'nm_pengajar' => 'required|max:50',
            'pendidikan' => 'required|max:191',
            'kontak' => 'required|max:191',
            'jk' => 'required',
            'ttl' => 'required',
            'pengalaman_kerja' => 'required',
            'alamat' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png'
        ]);

        // User
        $user  = new User;
        $user->role = 'Pengajar';
        $user->name = $request->nm_pengajar;
        $user->email = $request->email;
        $user->password = bcrypt('inovindo');
        $user->remember_token = str_random(60);
        $user->save();

        // Pengajar
        $request->request->add(['user_id' => $user->id]);
        $pengajar = Pengajar::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/avatar/',$request->file('avatar')->getClientOriginalName());

            $pengajar->avatar = $request->file('avatar')->getClientOriginalName();
            $pengajar->save();
        }

        return redirect()->route('dp.index')->with('sukses', 'Data Berhasil Ditambahkan');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        // // dd($request->all());
        // $pengajar = DB::table('pengajar')
        // ->where('program_id', $request->program)
        // ->orWhere('hari', $request->hari)
        // ->orWhere('jam', $request->jam)
        // ->orWhere('status', $request->status)
        // ->get();

        // dd($request->all());

        // $pengajar =  Jadwal::where('id',$id)->take(1)->get();

        // echo json_encode($pengajar);

        $search = $request->all();
        // $data = json_encode($search);
        // $newdata = json_decode($data);
        $program = Program::all();
        $kecamatan = Kecamatan::all();
        $jdw = DB::table('jadwal')
            ->join('program', 'jadwal.program_id', '=', 'program.id')
            ->join('pengajar', 'jadwal.pengajar_id', '=', 'pengajar.id')
            ->where([
            ['program_id', '=', $request->program],
            ['waktu', '=', $request->jam],
            ['kelas', '=', $request->kelas],
            ])->get();

        // $jdw = DB::table('jadwal')
        //         ->where('program_id', '=', $request->program)
        //         ->get();

        // $jdw = DB::table('jadwal')
        //         ->where('waktu', '=', $request->jam)
        //         ->get();

        // $jdw = DB::table('jadwal')
        //         ->where('jadwal.kelas', '=', $request->kelas)
        //         ->get();
        // dd($jdw);

        return view('daftar_program.ajax', ['search' => $search, 'program' => $program, 'kecamatan' => $kecamatan, 'jdw' => $jdw]);

    }

    public function coba(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajar $pengajar)
    {
        return view('data_pengajar.edit_pengajar', ['pengajar' => $pengajar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        $pengajar->update($request->all());

        return redirect()->route('dp.index')->with('sukses', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajar $pengajar)
    {
        unlink('images/avatar/'.$pengajar->avatar);
        $pengajar->delete();

        return redirect()->route('dp.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
