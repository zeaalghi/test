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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Profil</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto">
            <p class="uppercase mx-10 text-4xl mb-1 font-extrabold text-red-700">Profile</p>
            <p class="mx-10 text-md mb-8 font-normal text-black">Lihat data dirimu disini!</p>
            <div class="mx-10 mb-10 rounded-xl">
                <div class="relative overflow-x-auto md:w-6/12 border border-gray-200 rounded-lg md:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Nama
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Nomor Telepon
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->phone ?: '-' }}
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bgs-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Alamat
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->address ?: '*Tambahkan Alamat Anda' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-10 mb-12 rounded-xl">
                <div class="relative overflow-x-auto md:w-6/12 border border-gray-200 rounded-lg md:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Email
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Kata Sandi
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    ***********
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-10">
                <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Edit Profile
                </a>
            </div>
        </div>
    </section>
@endsection
