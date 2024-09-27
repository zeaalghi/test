<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Fleets;
use App\Models\Orders;
use App\Models\Rates;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    // Private Order
    public function private()
    {
        $data = Fleets::with([
            'drivers.images' => function ($query) {
                $query->where('type', 'truck');
            }
        ])->where('status', 'Available')->where('order_type', 'PRIVATE')->get();

        // dd($data);
        return view('private.private', compact('data'));
    }

    public function privatePay(Fleets $armada)
    {
        $destinations = Destinations::all();
        return view('private.payP', compact('armada', 'destinations'));
    }

    public function getRate(Request $request) //MENGHITUNG HARGA PRIVAT
    {
        $departure_id = $request->input('departure_id');
        $arrive_id = $request->input('arrive_id');

        $rate = Rates::where('departure_id', $departure_id)
            ->where('arrive_id', $arrive_id)
            ->first();

        if ($rate) {
            return response()->json(['rate' => $rate->rate]);
        } else {
            return response()->json(['rate' => 0], 404);
        }
    }

    public function orderPrivateExecution(Request $request)
    {
        $armada = Fleets::find($request->armada);
        $capacity = $armada->capacity;
        $loadedCapacity = $armada->loaded_capacity;
        $updateLoadedCapacity = $loadedCapacity + $request->jumlah_muatan;

        if ($updateLoadedCapacity > $capacity) {
            return redirect()->back()->with('error', 'Jumlah muatan melebihi kapasitas truck');
        }

        if ($request->has('nego_harga')) {
            $armada->update([
                'loaded_capacity' => $updateLoadedCapacity,
                'destinations_id' => $request->tujuan_pengantaran,
                'departure_date' => $request->tanggal_berangkat,
                'arrival_date' => $request->tanggal_sampai,
                'status' => 'Negotiation'
            ]);

            $order = Orders::create([
                'users_id' => auth()->user()->id,
                'truck_fleets_id' => $request->armada,
                'order_type' => 'PRIVATE',
                'payload' => $request->muatan,
                'payload_weight' => $request->jumlah_muatan,
                'pickup_location' => $request->lokasi,
                'delivery_destination' => $request->tujuan_pengantaran,
                'price' => $request->harga,
                'negotiation' => $request->negosiasi,
                'status' => 'Negotiation',
                'order_date' => Carbon::now()->toDateString()
            ]);
            return redirect(route('index'))->with('success', 'Negosiasi berhasil dikirimkan. Silahkan menunggu konfirmasi admin');
        }


        if ($request->has('bayar')) {
            $armada->update([
                'loaded_capacity' => $updateLoadedCapacity,
                'destinations_id' => $request->tujuan_pengantaran,
                'departure_date' => $request->tanggal_berangkat,
                'arrival_date' => $request->tanggal_sampai,
                'status' => 'In Order'
            ]);

            $order = Orders::create([
                'users_id' => auth()->user()->id,
                'truck_fleets_id' => $request->armada,
                'order_type' => 'PRIVATE',
                'payload' => $request->muatan,
                'payload_weight' => $request->jumlah_muatan,
                'pickup_location' => $request->lokasi,
                'delivery_destination' => $request->tujuan_pengantaran,
                'price' => $request->harga,
                'negotiation' => $request->negosiasi,
                'status' => 'In Progress',
                'order_date' => Carbon::now()->toDateString()
            ]);
            return redirect(route('index'))->with('success', 'Orderan private berhasil. Silahkan menunggu konfirmasi admin');
        }
    }

    //REGULER
    public function regular()
    {
        $date = Carbon::now();

        $data = Fleets::with(['drivers.images' => function ($query) {
            $query->where('type', 'truck');
        }])
            ->whereColumn('capacity', '!=', 'loaded_capacity')
            ->where('order_type', 'REGULER')
            ->where('departure_date', '>', $date)
            ->get();

        // dd($data);
        return view('regular.regular', compact('data'));
    }

    public function regularPay(Fleets $armada)
    {
        $destinations = Destinations::all();
        return view('regular.pay', compact('armada', 'destinations'));
    }

    public function calculatePrice(Request $request)
    {
        $tipeOrder = $request->input('tipeOrder');
        $jumlahMuatan = $request->input('jumlah_muatan');
        $keberangkatanId = $request->input('keberangkatan');
        $tujuanId = $request->input('tujuan');
        $tgl_berangkat = $request->input('tanggal_berangkat');
        $tgl_sampai = $request->input('tanggal_sampai');

        if ($jumlahMuatan == null) {
            return response()->json(['totalPrice' => 0]);
        }

        $keberangkatan = Destinations::find($keberangkatanId);
        $tujuan = Destinations::find($tujuanId);

        $ratePerTon = 1500000;
        $rate = 0;

        if ($keberangkatan->island === 'Jawa' && $tujuan->island === 'Jawa') {
            $rate = 0;
        } elseif ($keberangkatanId == $tujuanId) {
            $rate = 0;
        } else {
            $rateTujuan = Rates::where([
                ['departure_id', '=', $keberangkatanId],
                ['arrive_id', '=', $tujuanId]
            ])->first();
            $rate = $rateTujuan->rate;
        }

        // hitung tambahan biaya berdasarkan lama waktu pengiriman Oderan Private
        $additionalCost = 0;

        if ($tipeOrder == 'PRIVATE') {
            $startDate = new \DateTime($tgl_berangkat);
            $endDate = new \DateTime($tgl_sampai);
            $interval = $startDate->diff($endDate);
            $days = $interval->days;

            if ($days < 8) {
                $additionalCost = (8 - $days) * 1000000;
            } elseif ($days <= 14) {
                $additionalCost = 1000000;
            } else {
                $additionalCost = 0;
            }
        }

        $totalPrice = ($jumlahMuatan * $ratePerTon) + $rate + $additionalCost;

        return response()->json(['totalPrice' => $totalPrice]);
    }


    public function orderExecution(Request $request)
    {
        $armada = Fleets::find($request->armada);
        $capacity = $armada->capacity;
        $loadedCapacity = $armada->loaded_capacity;
        $updateLoadedCapacity = $loadedCapacity + $request->jumlah_muatan;

        if ($updateLoadedCapacity > $capacity) {
            return redirect()->back()->with('error', 'Jumlah muatan melebihi kapasitas truck');
        }

        $order = Orders::create([
            'users_id' => auth()->user()->id,
            'truck_fleets_id' => $request->armada,
            'order_type' => 'REGULER',
            'payload' => $request->muatan,
            'payload_weight' => $request->jumlah_muatan,
            'delivery_destination' => $request->tujuan_pengantaran,
            'pickup_location' => $request->lokasi,
            'price' => $request->harga,
            'status' => 'Unpaid',
            'order_date' => Carbon::now()->toDateString()
        ]);

        return redirect()->route('order.nota', ['orderId' => $order->id]);
    }

    public function nota($orderId)
    {
        $order = Orders::with('fleets', 'delivery', 'pickup_destination')->find($orderId);
        $rates = Rates::where([
            ['departure_id', '=', $order->fleets->destinations->id],
            ['arrive_id', '=', $order->pickup_location]
        ])->first();

        if ($rates) {
            $ratePengiriman = $rates->rate;
        } else {
            $ratePengiriman = 0;
        }
        return view('nota', compact('order', 'ratePengiriman'));
    }

    public function konfirmasi(Orders $orderId)
    {
        return view('konfirmasi', compact('orderId'));
    }

    public function proses(Request $request)
    {
        $order = Orders::with('fleets')->find($request->orderId);
        $order->update(['status' => 'Paid']);

        $armada = Fleets::find($order->fleets->id);
        $updateCapacity = $armada->loaded_capacity + $order->payload_weight;
        $armada->update([
            'loaded_capacity' => $updateCapacity
        ]);

        $buktiFile = $request->file('bukti');
        $buktiFileName = $request->orderId . '-' . $buktiFile->getClientOriginalName();

        Http::attach(
            'bukti',
            file_get_contents($buktiFile),
            $buktiFile->getClientOriginalName()
        )->post('https://member.d-kwb.com/api/upload-bukti', [
            'orderId' => $request->orderId,
        ]);

        Transactions::create([
            'orders_id' => $request->orderId,
            'depositor_name' => $request->nama_penyetor,
            'bank' => $request->bank,
            'nominal' => $request->jumlah,
            'filepath' => $buktiFileName
        ]);

        return redirect(route('index'))->with('success', 'Pesanan anda telah dibuat');
    }

    public function images(Request $request)
    {
        $dir = $request->input('direktori');
        $gambar = $request->input('gambar');

        $response = Http::get('https://member.d-kwb.com/api/images', [
            'direktori' => $dir,
            'gambar' => $gambar,
        ]);

        if ($response->successful()) {
            // Return image content with the appropriate headers
            return response($response->body(), 200)
                ->header('Content-Type', $response->header('Content-Type'));
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }
}
