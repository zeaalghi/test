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
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Regular</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto">
            <p class="uppercase mx-10 text-4xl mb-4 font-extrabold text-red-700">Regular</p>
            <p class="mx-10 text-md mb-4 font-normal text-black">Silahkan pilih unit terlebih dahulu!</p>
            <div class="mx-10 rounded-xl">
                <div
                    class="relative overflow-x-auto border border-gray-200 shadow-md rounded-lg hover:shadow-xl duration-300">
                    @if ($data->isEmpty())
                        <div class="text-center my-24">
                            <div class="flex justify-center mb-12">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="h-40 w-40"
                                    fill="#d8d8d8">
                                    <path
                                        d="m381-218-43-43 100-99-100-99 43-43 99 100 99-100 43 43-100 99 100 99-43 43-99-100-99 100ZM180-80q-24 0-42-18t-18-42v-620q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600v-430H180v430Zm0-490h600v-130H180v130Zm0 0v-130 130Z" />
                                </svg>
                            </div>
                            <p class="text-slate-400 text-base font-semibold">
                                Maaf, belum ada armada yang tersedia saat ini. Silahkan cari lagi nanti.
                            </p>
                        </div>
                    @else
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="border-b border-gray-200 text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center w-2/12">
                                        Tampilan Truk
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Kapasitas
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Tujuan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Tanggal Berangkat
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Tanggal Sampai
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center w-1/12">
                                        <span class="">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $order)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium flex justify-center text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ route('images', ['direktori' => 'truck', 'gambar' => $order->drivers->images->first()->filepath]) }}"
                                                alt="">
                                        </th>
                                        <td
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->loaded_capacity }}/{{ $order->capacity }} ton
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->destinations->city }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->departure_date }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->arrival_date }}
                                        </td>
                                        <td
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{ route('order.regularPay', ['armada' => $order->id]) }}"
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Order
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
