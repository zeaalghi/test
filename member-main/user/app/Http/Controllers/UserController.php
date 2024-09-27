<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('profile', compact('user'));
    }
    public function editProfile(User $user)
    {
        return view('edit_profile', compact('user'));
    }

    public function myOrder()
    {
        $orders = Orders::with('transactions', 'delivery')->where('users_id', auth()->user()->id)->get();
        return view('myorder', compact('orders'));
    }

    public function myPembayaran($orderId)
    {
        $transaction = Transactions::where('orders_id', $orderId)->first();
        return view('pembayaran', compact('transaction'));
    }

    public function aksiEditProfile(User $user, Request $request)
    {
        if ($request->input('currentPassword') && $request->input('newPassword') && $request->input('retypeNewPassword')) {
            if (Hash::check($request->input('currentPassword'), $user->password)) {
                if ($request->input('newPassword') === $request->input('retypeNewPassword')) {
                    $user->password = Hash::make($request->input('newPassword'));
                    $user->save();
                } else {
                    return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak cocok');
                }
            } else {
                return redirect()->back()->with('error', 'Password saat ini salah');
            }
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile Berhasil Diubah');
    }
}
