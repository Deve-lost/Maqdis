<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Peserta;
use Auth;

class AuthController extends Controller
{
    // Register
    public function register()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|max:191|unique:users',
            'password' => 'required|min:8|max:50',
            'alamat' => 'required',
            'kontak' => 'required|max:15',
            'ttl' => 'required'
        ]);

        // $peserta = Peserta::create($request->all());
        // Insert Peserta
        $peserta = new Peserta;
        $peserta->name = $request->name;
        $peserta->email = $request->email;
        $peserta->ttl = $request->ttl;
        $peserta->jk = $request->jk;
        $peserta->kontak = $request->kontak;
        $peserta->alamat = $request->alamat;
        $peserta->save();




        // Insert Users
        // $user = [
        //     $user  = new User,
        //     $user->role = 'Peserta',
        //     $user->$peserta->id,
        //     $user->name = $request->name,
        //     $user->email = $request->email,
        //     $user->password = bcrypt($request->password),
        //     $user->remember_token = str_random(60)
        // ];

        $user = User::create([
            'role' => 'Peserta',
            'peserta_id' => $peserta->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('sukses','Register Berhasil');
    }

    // Login
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:50',
            'password' => 'required|max:100',
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('error','Email Atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }

}
