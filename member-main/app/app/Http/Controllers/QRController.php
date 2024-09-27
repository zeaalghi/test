<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\Images;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Logo\Logo;

class QRController extends Controller
{
    public function preview($memberid)
    {
        $driver = Drivers::where('memberid', $memberid)->first();
        $tanggalLahir = Carbon::parse($driver->birthdate);
        $umur = $tanggalLahir->diffInYears(Carbon::now());

        $tanggalPendaftaran = Carbon::parse($driver->created_at);
        $pengalaman = $tanggalPendaftaran->diffInYears(Carbon::now());

        $truckImage = Images::where('type', 'truck')->where('driverid', $driver->id)->get();

        return view('preview', compact('driver', 'umur', 'pengalaman', 'truckImage'));
    }

    public function kartuAnggota($memberid)
    {
        $dataDriver = Drivers::with(['images' => function ($query) {
            $query->where('type', 'profile');
        }])->where('memberid', $memberid)->first();
        $ttd = Config::where('parameter', 'ttdketua')->first()->value;
        $ketua = Config::where('parameter', 'ketua')->first()->value;
        $tanggal = Config::where('parameter', 'tanggal')->first()->value;
        return view('kartuAnggota', compact('dataDriver', 'ttd', 'ketua', 'tanggal'));
    }

    public function qrcode($id)
    {
        $driver = Drivers::findOrFail($id);

        $directory = 'public/qrcodes';
        $filename = $driver->memberid . '.png';
        $path = $directory . '/' . $filename;

        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        if (!Storage::exists($path)) {
            $qrCode = QrCode::create(config('app.url') . '/preview/' . $driver->memberid)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
                ->setSize(300)
                ->setMargin(10)
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $logo = Logo::create(public_path('assets/img/logoo.png'))
                ->setResizeToWidth(50);

            $writer = new PngWriter();
            $result = $writer->write($qrCode, $logo);

            Storage::put($path, $result->getString());
        }

        return Storage::download($path, $filename);
    }
}
