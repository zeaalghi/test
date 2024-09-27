<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);

        //echo REGISTER SUCCESS
        return redirect()->back()->with('success', 'Pendaftaran Akun Berhasil');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            if (auth()->user()->status == 0) {
                return redirect()->route('index')->with('success', 'Login Berhasil');
            } else {
                Auth::logout();
                return redirect()->route('index')->with('error', 'Login Gagal: Akses Dibatasi');
            }
        } else {
            return redirect()->route('index')->with('error', 'Login Gagal: Username atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'))->with('success', 'Logout Berhasil');
    }
}
