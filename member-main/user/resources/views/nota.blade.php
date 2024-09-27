@extends('master')
@section('content')
    <section>
        <div class="container mx-auto mt-28 mb-8">
            <div class="container px-10">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('index') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Order</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Nota
                                    Pemesanan</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto">
            <p class="mx-10 text-4xl mb-8 font-extrabold text-red-700">Nota Pemesanan</p>
            <div class="overflow-x-auto mx-10 flex justify-between rounded-lg">
                <div class="block p-6">
                    <p class="font-medium mb-5 text-2xl text-gray-700 dark:text-gray-400">
                        Pemesanan
                    </p>
                    <p class="font-semibold mb-5 text-md text-gray-700 dark:text-gray-400">
                        No. Pemesanan : {{ $order->id }}
                    </p>
                    <p class="font-medium mb-2 text-gray-700 dark:text-gray-400">
                        Tanggal : {{ $order->order_date }}
                    </p>
                    <p class="font-medium text-gray-700 dark:text-gray-400">
                        Total : {{ $order->price }}
                    </p>
                </div>
                <div class="block p-6">
                    <p class="font-medium mb-5 text-2xl text-gray-700 dark:text-gray-400">
                        Pelanggan
                    </p>
                    <p class="font-semibold mb-5 text-md text-gray-700 dark:text-gray-400">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="font-medium mb-2 text-gray-700 dark:text-gray-400">
                        {{ auth()->user()->phone }}
                    </p>
                    <p class="font-medium text-gray-700 dark:text-gray-400">
                        {{ auth()->user()->email }}
                    </p>
                </div>
                <div class="block p-6">
                    <p class="font-medium mb-5 text-2xl text-gray-700 dark:text-gray-400">
                        Pengiriman
                    </p>
                    <p class="font-medium mb-2 text-gray-700 dark:text-gray-400">
                        Pengiriman : {{ $order->delivery->city }}
                    </p>
                    <p class="font-medium text-gray-700 dark:text-gray-400">
                        Pengambilan : {{ $order->pickup_destination->city }}
                    </p>
                </div>
            </div>
            <div class="m-10 rounded-xl">
                <div class="relative overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="border-b border-gray-200 text-white bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center w-1/12">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jenis Muatan
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jumlah Muatan
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->payload }}
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->payload_weight }}
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->price - $ratePengiriman }}
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->price }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($order->status != 'Paid')
                <div
                    class="mx-10 mb-2 block md:w-6/12 p-5 bg-blue-200 border border-gray-200 rounded-lg shadow hover:bg-blue-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="font-medium text-blue-500 dark:text-gray-400">
                        Silahkan melakukan pembayaran sebesar
                        <strong class="font-semibold text-blue-700 dark:text-white">
                            IDR {{ $order->price }}
                        </strong>
                        ke
                    </p>
                    <p class="font-medium text-blue-500 dark:text-gray-400">
                        <strong class="font-semibold text-blue-700 dark:text-white">
                            BANK BCA : 0190926079 a.n. Dkenzie Wastu Baswara PT.
                        </strong>
                    </p>
                </div>
                <div class="container flex mx-10 py-6 w-auto">
                    <div class="container md:flex">
                        <a href="{{ route('order.konfirmasi', ['orderId' => $order->id]) }}"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Kirim
                            Pembayaran</a>
                    </div>
                </div>
            @else
                <div
                    class="mx-10 mb-2 block md:w-6/12 p-5 bg-blue-200 border border-gray-200 rounded-lg shadow hover:bg-blue-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="font-medium text-blue-500 dark:text-gray-400">
                        Silahkan menghubungi nomor
                        <strong class="font-semibold text-blue-700 dark:text-white">
                            {{ $order->fleets->drivers->phone }}
                        </strong>
                    </p>
                    <p class="font-medium text-blue-500 dark:text-gray-400">
                        atas nama
                        <strong class="font-semibold text-blue-700 dark:text-white">
                            {{ $order->fleets->drivers->fullname }}
                        </strong>
                        untuk detail pesanan anda
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
