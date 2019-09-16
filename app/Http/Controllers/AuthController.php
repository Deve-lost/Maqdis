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
            'alamat_lengkap' => 'required',
            'no_wa' => 'required|max:15',
            'tgl_lahir' => 'required'
        ]);

        // Insert Users
        User::create([
            'role' => 'Peserta',
            'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    	]);

        // Insert Peserta
        Peserta::create([
            'nama' => $request->name,
            'email' => $request->email,
            'ttl' => $request->tgl_lahir,
            'jk' => $request->jk,
            'kontak' => $request->no_wa,
            'alamat' => $request->alamat_lengkap,
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
