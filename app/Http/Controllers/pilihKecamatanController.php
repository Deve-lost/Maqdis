<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kecamatan;

class pilihKecamatanController extends Controller
{


    public function loadData(Request $request)
    {
         $country_list = DB::table('pengajar')
         ->groupBy('status')
         ->get();
         return view('daftar_program.index')->with('country_list', $country_list);
    }

    public function show($status)
    {
        $result = Kecamatan::where('status',$status)->take(1)->get();
       // $result = $this->db->where("state_id",$id)->get("demo_cities")->result();
       echo json_encode($result);
    }
}
