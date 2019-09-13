<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::orderBy('role', 'ASC')->get();

        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create_pengguna');
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
            'name' => 'required|max:50',
            'email' => 'required|max:100|unique:users',
        ]);

        User::create([
            'role' => 'Admin',
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('inovindo'),
            'remember_token' => str_random(60)
        ]);

        return redirect()->route('pengguna.index')->with('sukses', 'Data Berhasil Ditambahkan');
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

    // Reset Password
    public function resetpw(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt('inovindo');
        $user->update();

        return redirect()->route('pengguna.index')->with('sukses','Password Berhasil Di Reset Ke Default');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pengguna.edit_pengguna', ['pengguna' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('pengguna.index')->with('sukses', 'Data Berhasil Diperbaharui');
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

        return redirect()->route('pengguna.index')->with('sukses', 'Data Berhasil Dihapus');
    }

    // Profile
    public function profile(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('pengguna.profile_pengguna', ['pengguna' => $user]);
        }

        return redirect()->route('dashboard');
    }

    // Ubah Password
    public function ubahpw(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('pengguna.ubah_password', ['pengguna' => $user]);
        }

        return redirect()->route('dashboard');
    }

    public function updatePassword(Request $request, $id)
    {
        // Validasi
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8'
        ]);

        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPasword;

        if (!Hash::check($oldPassword, Auth::user()->password)) {
            return redirect('/Maqdis/ubah/'.$id.'/password-pengguna')->with('error','Password Lama Tidak Sesuai!');
        }else{
             $request->user()->fill([
                    'password' => Hash::make($request->newPassword)
                ])->save();

            return redirect('/Maqdis/profile/'.$id.'/pengguna')->with('sukses','Password Berhasil Diubah');
        }
    }
}
