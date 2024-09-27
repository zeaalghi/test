<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function images(Request $request)
    {
        $dir = $request->input('direktori');
        $gambar = $request->input('gambar');

        $path = "public/$dir/$gambar";

        if (Storage::exists($path)) {
            // Get the path to the file 
            $file = Storage::path($path);

            // Return the file as a response
            return response()->file($file);
        } else {
            return response()->json(['error' => 'File not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function uploadBukti(Request $request)
    {
        if ($request->hasFile('bukti')) {
            $buktiFile = $request->file('bukti');
            $buktiFileName = $request->orderId . '-' . $buktiFile->getClientOriginalName();
            $buktiFile->storeAs('public/bukti', $buktiFileName);

            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function uploadProfile(Request $request)
    {
        if ($request->hasFile('profile')) {
            $profileFile = $request->file('profile');
            $profileFileName = $request->driverId . '-' . $profileFile->getClientOriginalName();
            $profileFile->storeAs('public/profile', $profileFileName);

            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function uploadTruck(Request $request)
    {
        if ($request->hasFile('truck')) {
            $truckFile = $request->file('truck');
            $truckFileName = $request->driverId . '-' . $truckFile->getClientOriginalName();
            $truckFile->storeAs('public/truck', $truckFileName);

            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }
}
