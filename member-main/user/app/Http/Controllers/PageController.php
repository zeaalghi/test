<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Drivers;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function pagePendaftaran()
    {
        return view('pendaftaran');
    }

    public function pendaftaranDriver(Request $request)
    {
        $drivers = Drivers::all();
        $latestMemberID = 0;

        foreach ($drivers as $driver) {
            $memberID = $driver->memberid;
            $urutan = (int) substr($memberID, 4);

            if ($urutan > $latestMemberID) {
                $latestMemberID = $urutan;
            }
        }

        $urutanBaru = $latestMemberID + 1;

        $huruf = "DKWB";
        $noAnggota = $huruf . sprintf("%04s", $urutanBaru);

        $driver = new Drivers();
        $driver->userid = 2;
        $driver->memberbatch = $urutanBaru;
        $driver->memberid = $noAnggota;
        $driver->idcard = $request->nik;
        $driver->fullname = $request->nama;
        $driver->gender = $request->jk;
        $driver->birthloc = $request->tempat_lahir;
        $driver->birthdate = $request->tanggal_lahir;
        $driver->phone = $request->phone;
        $driver->address = $request->alamat;
        $driver->lisence = $request->sim;
        $driver->insurance = $request->asuransi;
        $driver->status = 2;
        $driver->save();

        $profileFile = $request->file('upload_foto');
        $profileFileName = $driver->id . '-' . $profileFile->getClientOriginalName();

        Http::attach(
            'profile',
            file_get_contents($profileFile),
            $profileFile->getClientOriginalName()
        )->post('https://member.d-kwb.com/api/upload-profile', [
            'driverId' => $driver->id,
        ]);

        $profileImage = new Images();
        $profileImage->driverid = $driver->id;
        $profileImage->type = 'profile';
        $profileImage->filepath = $profileFileName;
        $profileImage->save();

        $truckFile = $request->file('upload_truck');
        $truckFileName = $driver->id . '-' . $truckFile->getClientOriginalName();

        Http::attach(
            'truck',
            file_get_contents($truckFile),
            $truckFile->getClientOriginalName()
        )->post('https://member.d-kwb.com/api/upload-truck', [
            'driverId' => $driver->id,
        ]);

        $truckImage = new Images();
        $truckImage->driverid = $driver->id;
        $truckImage->type = 'truck';
        $truckImage->filepath = $truckFileName;
        $truckImage->save();

        return redirect()->back()->with('success', 'Pendaftaran member berhasil. Silahkan menunggu validasi admin');
    }

    public function pageAboutUs()
    {
        return view('about');
    }

    public function pageCekOngkir()
    {
        $destinations = Destinations::all();
        return view('cekongkir', compact('destinations'));
    }
}
