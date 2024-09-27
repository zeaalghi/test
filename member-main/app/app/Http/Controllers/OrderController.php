<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Drivers;
use App\Models\Fleets;
use App\Models\Images;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function tambahArmada()
    {
        $drivers = Drivers::where('status', 1)
            ->whereHas('images', function ($query) {
                $query->where('type', 'truck');
            })
            ->get();

        $destinations = Destinations::all();
        return view('admin.truck.tambah_truck', compact('drivers', 'destinations'));
    }

    public function getTruckImage($driverid)
    {
        $image = Images::where('driverid', $driverid)->where('type', 'truck')->first();

        if ($image) {
            return response()->json(['filepath' => asset('storage/truck/' . $image->filepath)]);
        } else {
            return response()->json(['filepath' => asset('assets/img/user.svg')]);
        }
    }

    public function aksiTambahArmada(Request $request)
    {
        if ($request->orderType == 'PRIVATE') {
            $request->validate([
                'driver' => 'required|exists:drivers,id',
                'kapasitas' => 'required|numeric',
            ]);

            $existingArmada = Fleets::where('drivers_id', $request->driver)->where('status', 'Available')->exists();

            if ($existingArmada) {
                return redirect()->route('pageDataTruckReguler')->with('error', 'Armada ini sudah ditambahkan dan masih dalam status aktif.');
            }

            Fleets::create([
                'drivers_id' => $request->driver,
                'capacity' => $request->kapasitas,
                'order_type' => $request->orderType,
                'status' => 'Available'
            ]);
        } else {
            $request->validate([
                'driver' => 'required|exists:drivers,id',
                'kapasitas' => 'required|numeric',
                'tujuan' => 'required|string',
                'tanggal_berangkat' => 'required|date',
                'tanggal_sampai' => 'required|date|after_or_equal:tanggal_berangkat'
            ]);

            // Cek apakah ada armada yang masih aktif untuk driver tersebut
            $existingArmada = Fleets::where('drivers_id', $request->driver)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('departure_date', [$request->tanggal_berangkat, $request->tanggal_sampai])
                        ->orWhereBetween('arrival_date', [$request->tanggal_berangkat, $request->tanggal_sampai])
                        ->orWhere(function ($query) use ($request) {
                            $query->where('departure_date', '<=', $request->tanggal_berangkat)
                                ->where('arrival_date', '>=', $request->tanggal_sampai);
                        });
                })
                ->exists();

            if ($existingArmada) {
                return redirect()->route('pageDataTruckReguler')->with('error', 'Armada ini sudah ditambahkan dan masih dalam status aktif.');
            }

            // Buat record armada baru
            Fleets::create([
                'drivers_id' => $request->driver,
                'capacity' => $request->kapasitas,
                'order_type' => $request->orderType,
                'destinations_id' => $request->tujuan,
                'departure_date' => $request->tanggal_berangkat,
                'arrival_date' => $request->tanggal_sampai
            ]);
        }

        return redirect()->route('pageDataTruckReguler')->with('success', 'Penambahan Armada Truck Berhasil');
    }

    public function buktiPembayaran($filename)
    {
        $path = public_path('storage/bukti/' . $filename);

        // dd($path);
        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        return response($file, 200)->header('Content-Type', 'image/jpeg'); // sesuaikan tipe konten sesuai kebutuhan, bisa image/png, image/jpeg, dll.
    }

    public function orderPrivateDiterima(Orders $order)
    {
        if ($order->negotiation != null) {
            $order->update([
                'price' => $order->negotiation,
                'negotiation' => null,
                'status' => 'Negotiation Approved'
            ]);
        } else {
            $order->update([
                'status' => 'Order Private Approved'
            ]);
        }

        $fleets = Fleets::find($order->truck_fleets_id);
        $fleets->update([
            'status' => 'In Order'
        ]);

        return redirect()->back()->with('success', 'Orderan Diterima');
    }

    public function orderPrivateDitolak(Orders $order, Request $request)
    {
        if ($order->negotiation != null) {
            $order->update([
                'note' => $request->alasan,
                'status' => 'Negotiation Rejected'
            ]);
        } else {
            $order->update([
                'note' => $request->alasan,
                'status' => 'Order Private Rejected'
            ]);
        }

        $fleets = Fleets::find($order->truck_fleets_id);
        $fleets->update([
            'loaded_capacity' => 0,
            'destinations_id' => null,
            'departure_date' => null,
            'arrival_date' => null,
            'status' => 'Available',
        ]);

        return redirect()->back()->with('success', 'Orderan Ditolak');
    }
}
