<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jadwal;
use App\Program;
use App\Pengajar;
use DB;

class JadwalPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::latest()->get();

        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();
        $pengajars = Pengajar::all();

        return view('jadwal.create_jp', compact('program', 'pengajars'));
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
            'pengajar_id' => 'required',
            'program_id' => 'required',
            'waktu' => 'required',
            'kelas' => 'required'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jp.index')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->get('query'))
         {
          $query = $request->get('query');
          $data = DB::table('pengajar')
            ->where('nm_pengajar', 'LIKE', "%{$query}%")
            ->get();
          $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
          foreach($data as $row)
          {
           $output .= '
           <li><a href="#">'.$row->nm_pengajar.'</a></li>
           ';
          }
          $output .= '</ul>';
          echo $output;
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $pengajars = Pengajar::latest()->get();
        $program = Program::latest()->get();

        return view('jadwal.edit_pengajar', ['jd' => $jadwal], compact('pengajars', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return redirect()->route('jp.index')->with('sukses', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jp.index')->with('sukses', 'Data Berhasil Dihapus');;
    }
}
