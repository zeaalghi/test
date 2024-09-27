<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\Images;
use App\Models\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ValidationController extends Controller
{
    public function approvedAccountValidation(Validations $validation)
    {
        $drivers = Drivers::with('images')->find($validation->drivers_id);

        if ($validation->field == 'image') {
            $oldPath = 'public/validation/' . $validation->new_value;
            $newPath = 'public/profile/' . $validation->new_value;

            Storage::move($oldPath, $newPath);
            Storage::delete('public/profile/' . $validation->old_value);

            $images = $drivers->images->first();
            $images->update([
                'filepath' => $validation->new_value,
            ]);

            $validation->delete();
        } else {
            $drivers->update([
                $validation->field => $validation->new_value,
            ]);
            $validation->delete();
        }

        return redirect()->back()->with('success', 'Perubahan profile driver berhasil');
    }

    public function rejectedAccountValidation(Validations $validation)
    {
        if ($validation->field == 'image') {
            Storage::delete('public/validation/' . $validation->new_value);
            $validation->delete();
        } else {
            $validation->delete();
        }
        return redirect()->back()->with('success', 'Perubahan profile driver ditolak');
    }

    public function approvedDriverValidation(Drivers $driver)
    {
        $driver->update(['status' => 1]);

        $whatsappNumber = $driver->phone;

        if (substr($whatsappNumber, 0, 1) === '0') {
            $whatsappNumber = '+62' . substr($whatsappNumber, 1);
        }

        $message = urlencode("Halo $driver->fullname,

Selamat! Pendaftaran Anda sebagai driver di peruhsaan kami telah berhasil diterima. Terima kasih telah melengkapi semua persyaratan dengan baik. Anda sekarang resmi menjadi bagian dari komunitas driver kami.

Silahkan login ke website https://member.d-kwb.com. Kami sudah memberikan akses sebagai driver kepada anda. Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui WhatsApp di nomor ini.

Terima kasih dan selamat bergabung!

Salam,
Tim DKWB");

        $url = "https://wa.me/$whatsappNumber?text=$message";

        return redirect()->route('pageValidasiDriver')->with('whatsappUrl', $url)->with('success', 'Pendaftaran Driver Diterima');
    }

    public function rejectedDriverValidation(Drivers $driver)
    {
        $profileImage = Images::where('type', 'profile')->where('driverid', $driver->id)->first();
        Storage::disk('public')->delete('profile/' . $profileImage->filepath);

        $truckImage = Images::where('type', 'truck')->where('driverid', $driver->id)->first();
        Storage::disk('public')->delete('truck/' . $truckImage->filepath);

        $driver->delete();

        $whatsappNumber = $driver->phone;

        if (substr($whatsappNumber, 0, 1) === '0') {
            $whatsappNumber = '+62' . substr($whatsappNumber, 1);
        }
        $message = urlencode("Halo $driver->fullname,

Terima kasih atas minat Anda untuk bergabung di perusahan kami. Setelah meninjau pendaftaran Anda, kami mohon maaf karena saat ini kami tidak dapat menerima pendaftaran Anda karena tidak memenuhi kualifikasi yang dibutuhkan perusahaan.

Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, silakan hubungi kami melalui WhatsApp di nomor ini.

Terima kasih atas pengertiannya.

Salam,
Tim DKWB");

        $url = "https://wa.me/$whatsappNumber?text=$message";

        return redirect()->route('pageValidasiDriver')->with('whatsappUrl', $url)->with('success', 'Pendaftaran Driver Ditolak');
    }
}
