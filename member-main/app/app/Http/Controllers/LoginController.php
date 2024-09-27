<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAdmin(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            if (auth()->user()->status == 1) {
                session(['role' => 'admin']);
                return redirect()->route('dashboard')->with('success', 'Login sebagai Admin Berhasil');
            } else {
                Auth::logout();
                return redirect()->route('loginAdmin')->with('error', 'Login Gagal: Akses Dibatasi');
            }
        } else {
            return redirect()->route('loginAdmin')->with('error', 'Login Gagal');
        }
    }

    public function loginDriver(Request $request)
    {
        $driver = Drivers::with('images')->where('idcard', $request->nik)->first();
        if (isset($driver)) {
            session(['id' => $driver->id]);
            session(['idcard' => $driver->idcard]);
            session(['fullname' => $driver->fullname]);
            session(['imageProfile' => 'storage/profile/' . $driver->images->first()->filepath]);
            session(['role' => 'driver']);
            return redirect()->route('dashboard')->with('success', 'Login sebagai Driver Berhasil');
        } else {
            return redirect()->route('loginDriver')->with('error', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('loginDriver')->with('success', 'Logout Berhasil');
    }
}
