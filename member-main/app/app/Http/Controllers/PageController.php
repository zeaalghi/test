<?php

namespace App\Http\Controllers;

use App\Charts\DriverChart;
use App\Charts\DriversChart;
use App\Models\Config;
use App\Models\Drivers;
use App\Models\Fleets;
use App\Models\Images;
use App\Models\Orders;
use App\Models\User;
use App\Models\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $driversTotal = Drivers::count();
        $driverActive = Drivers::where('status', 1)->get();
        return view('index', compact('driverActive', 'driversTotal'));
    }

    public function dashboard()
    {
        if (!session('role')) {
            return redirect()->route('loginDriver')->with('error', 'Silahkan Login Terlebih Dahulu');
        }
        $driver = Drivers::all();
        $totalDriver = $driver->count();

        $driverAktif = Drivers::where('status', 1)->get();
        $totalDriverAktif = $driverAktif->count();

        $totalOrderan = Orders::all()->count();
        $totalOrderanDriver = null;
        if (session('role') == 'driver') {
            $driverId = session('id');

            $totalOrderanDriver = Orders::whereHas('fleets', function ($query) use ($driverId) {
                $query->where('drivers_id', $driverId);
            })->get()->count();
        }
        return view('dashboard', compact('totalDriver', 'totalDriverAktif', 'totalOrderan', 'totalOrderanDriver'));
    }

    public function pageDataDriver()
    {
        $data = Drivers::all();
        return view('admin.dataDriver', compact('data'));
    }

    public function pageDataOrderReg()
    {
        $data = Orders::with(['users', 'pickup_destination', 'fleets.drivers', 'delivery', 'transactions'])
            ->where('order_type', 'REGULER')
            ->where('status', 'Paid')
            ->get();
        return view('admin.dataOrderReguler', compact('data'));
    }

    public function pageDataOrderPr()
    {
        $data = Orders::with(['users', 'pickup_destination', 'fleets.drivers', 'delivery', 'transactions'])
            ->where('order_type', 'PRIVATE')
            ->where('status', 'Paid')
            ->orWhere('status', 'Negotiation')
            ->orWhere('status', 'In Progress')
            ->get();
        return view('admin.dataOrderPrivate', compact('data'));
    }

    public function pageClient()
    {
        $client = User::where('status', 0)->get();
        return view('admin.dataClient', compact('client'));
    }

    public function pageValidasiAkun()
    {
        $validations = Validations::with('drivers')->get();
        $fieldNames = [
            'idcard' => 'Nomor KTP',
            'fullname' => 'Nama Lengkap',
            'birthloc' => 'Tempat Lahir',
            'birthdate' => 'Tanggal Lahir',
            'gender' => 'Jenis Kelamin',
            'phone' => 'Nomor Telepon',
            'address' => 'Alamat',
            'lisence' => 'SIM',
            'insurance' => 'Asuransi',
            'image' => 'Foto Profil'
        ];
        return view('admin.validasiAkun', compact('validations', 'fieldNames'));
    }

    public function pageValidasiDriver()
    {
        $drivers = Drivers::where('status', 2)->get();
        return view('admin.validasiDriver', compact('drivers'));
    }

    public function pageDetailDriver(Drivers $driver)
    {
        $truckImage = Images::where('type', 'truck')->where('driverid', $driver->id)->first();
        return view('admin.detailDriver', compact('driver', 'truckImage'));
    }

    public function konfigurasi()
    {
        $config = Config::all();
        $pagination = $config->where('parameter', 'pagination')->first()->value;
        $tanggal = $config->where('parameter', 'tanggal')->first()->value;
        $ketua = $config->where('parameter', 'ketua')->first()->value;
        $ttdketua = $config->where('parameter', 'ttdketua')->first()->value;

        return view('admin.konfigurasi', compact('pagination', 'tanggal', 'ketua', 'ttdketua'));
    }

    public function editkonfigurasi(Request $request)
    {
        $configTanggal = Config::where('parameter', 'tanggal')->first();
        $configKetua = Config::where('parameter', 'ketua')->first();
        $configTtdKetua = Config::where('parameter', 'ttdketua')->first();

        if ($configTanggal) {
            $configTanggal->value = $request->tgl;
            $configTanggal->save();
        }

        if ($configKetua) {
            $configKetua->value = $request->ketua;
            $configKetua->save();
        }

        if ($request->hasFile('ttd')) {
            if ($configTtdKetua && $configTtdKetua->value) {
                Storage::delete('public/images/' . $configTtdKetua->value);
            }
            $file = $request->file('ttd');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);
            if ($configTtdKetua) {
                $configTtdKetua->value = $fileName;
                $configTtdKetua->save();
            }
        }

        return redirect()->route('konfigurasi')->with('success', 'Konfigurasi Berhasil Diubah');
    }

    public function pageDataTruckReguler()
    {
        $armada = Fleets::with('drivers', 'destinations')->get();
        return view('admin.dataTruckReguler', compact('armada'));
    }
    public function pageDataOngkir()
    {
        return view('admin.dataOngkir');
    }
    public function loginDriver()
    {
        return view('loginDriver');
    }
    public function loginAdmin()
    {
        return view('login');
    }

    public function dataOrderDriver()
    {
        if (!session('role')) {
            return redirect()->route('loginDriver')->with('error', 'Silahkan Login Terlebih Dahulu');
        }

        $driverId = session('id');

        $dataOrder = Orders::whereHas('fleets', function ($query) use ($driverId) {
            $query->where('drivers_id', $driverId);
        })->with(['fleets', 'users', 'pickup_destination'])->get();
        // dd($dataOrder);
        return view('driver.dataOrder', compact('dataOrder'));
    }
}
