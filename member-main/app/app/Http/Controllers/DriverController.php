<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\Images;
use App\Models\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function tambahDriver()
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

        // dd($noAnggota);
        return view('admin.driver.tambah_driver', compact('noAnggota', 'urutanBaru'));
    }

    public function aksiTambahDriver(Request $request)
    {
        $driver = new Drivers();
        $driver->userid = 2;
        $driver->memberbatch = $request->batch;
        $driver->memberid = $request->no_anggota;
        $driver->idcard = $request->nik;
        $driver->fullname = $request->fullname;
        $driver->gender = $request->jk;
        $driver->birthloc = $request->birthloc;
        $driver->birthdate = $request->birthdate;
        $driver->phone = $request->phone;
        $driver->address = $request->address;
        $driver->lisence = $request->sim;
        $driver->insurance = $request->asuransi;
        $driver->status = 1;
        $driver->save();

        $profileFile = $request->file('profile');
        $profileName = $driver->id . '-' . $profileFile->getClientOriginalName();
        $profileFile->storeAs('public/profile', $profileName);

        $truckFile = $request->file('truk');
        $truckName = $driver->id . '-' . $truckFile->getClientOriginalName();
        $truckFile->storeAs('public/truck', $truckName);

        $profileImage = new Images();
        $profileImage->driverid = $driver->id;
        $profileImage->type = 'profile';
        $profileImage->filepath = $profileName;
        $profileImage->save();

        $truckImage = new Images();
        $truckImage->driverid = $driver->id;
        $truckImage->type = 'truck';
        $truckImage->filepath = $truckName;
        $truckImage->save();

        return redirect()->route('pageDataDriver')->with('success', 'Driver Berhasil Ditambahkan');
    }

    public function editDriver($id)
    {
        $driver = Drivers::find($id);
        $truckImage = Images::where('type', 'truck')->where('driverid', $id)->get();
        return view('admin.driver.edit_driver', compact('driver', 'truckImage'));
    }

    public function deleteTruck($id)
    {
        $image = Images::findOrFail($id);
        Storage::disk('public')->delete('truck/' . $image->filepath);
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }

    public function aksiEditDriverByAdmin(Drivers $driver, Request $request)
    {
        if ($request->has('profile')) {
            $oldProfileName = $driver->images->where('type', 'profile')->first()->filepath ?? null;
            $oldProfilePath = 'public/profile/' . $oldProfileName;
            $newProfileFile = $request->file('profile');
            $newProfileName = $driver->id . '-' . $newProfileFile->getClientOriginalName();
            // dd($oldProfilePath);
            Storage::delete($oldProfilePath);
            $newProfileFile->storeAs('public/profile', $newProfileName);

            $image = $driver->images->where('type', 'profile')->first();
            $image->update([
                'filepath' => $newProfileName,
            ]);
        }

        $driver->update([
            'idcard' => $request->idcard,
            'fullname' => $request->fullname,
            'birthloc' => $request->birthloc,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'lisence' => $request->lisence,
            'insurance' => $request->insurance,
            'status' => $request->status,
        ]);

        return redirect()->route('pageDataDriver')->with('success', 'Data Driver Berhasil Diubah');
    }

    public function aksiEditDriver(Drivers $driver, Request $request)
    {
        if (!session('role')) {
            return redirect()->route('loginDriver')->with('error', 'Silahkan Login Terlebih Dahulu');
        }

        $fieldsToUpdate = [
            'fullname', 'address', 'phone', 'idcard', 'birthloc', 'birthdate', 'gender', 'lisence', 'insurance', 'status'
        ];

        foreach ($fieldsToUpdate as $field) {
            $newValue = $request->input($field);
            if ($newValue !== null && $newValue != $driver->$field) {
                Validations::create([
                    'drivers_id' => $driver->id,
                    'field' => $field,
                    'old_value' => $driver->$field,
                    'new_value' => $newValue,
                ]);
            }
        }

        if ($request->has('profile')) {
            $oldProfile = $driver->images()->where('type', 'profile')->first()->filepath ?? null;
            $newProfile = $request->file('profile')->getClientOriginalName();
            if ($newProfile != $oldProfile) {
                $request->file('profile')->storeAs('public/validation', $newProfile);
                Validations::create([
                    'drivers_id' => $driver->id,
                    'field' => 'image',
                    'old_value' => $oldProfile,
                    'new_value' => $newProfile,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Perubahan telah dicatat. Silahkan tunggu validasi dari admin');
    }

    public function deleteDriver(Drivers $driver)
    {
        foreach ($driver->images as $image) {
            if (Storage::disk('public')->exists('profile/' . $image->filepath)) {
                Storage::disk('public')->delete('profile/' . $image->filepath);
            } else if (Storage::disk('public')->exists('truck/' . $image->filepath)) {
                Storage::disk('public')->delete('truck/' . $image->filepath);
            } else {
                dd('File does not exist: ' . $image->filepath);
            }
            $image->delete();
        }

        Storage::disk('public')->delete('qrcodes/' . $driver->id . '.png');

        $driver->delete();

        return redirect()->route('pageDataDriver')->with('success', 'Data Driver Berhasil Dihapus');
    }

    public function profileDriver()
    {
        if (!session('role')) {
            return redirect()->route('loginDriver')->with('error', 'Silahkan Login Terlebih Dahulu');
        }
        $driver = Drivers::with(['images' => function ($query) {
            $query->where('type', 'profile');
        }])->where('idcard', session('idcard'))->first();
        return view('driver.profileDriver', compact('driver'));
    }

    public function tambahTruck(Drivers $driver, Request $request)
    {
        $truckFile = $request->file('truk');
        $truckName = $driver->id . '-' . $truckFile->getClientOriginalName();
        $truckFile->storeAs('public/truck', $truckName);

        $profileImage = new Images();
        $profileImage->driverid = $driver->id;
        $profileImage->type = 'truck';
        $profileImage->filepath = $truckName;
        $profileImage->save();

        return redirect()->route('editDriver', ['id' => $driver->id]);
    }

    public function searchDriver(Request $request)
    {
        $query = $request->input('q');
        $drivers = Drivers::where('fullname', 'like', '%' . $query . '%')->get();

        return response()->json($drivers);
    }
}
