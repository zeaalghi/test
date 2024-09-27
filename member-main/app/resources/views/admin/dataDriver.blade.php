@extends('master')
@section('content')
    <div class="">
        <div class="mt-10">
            <p class="text-2xl font-extrabold">DATA DRIVER</p>
        </div>
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">

            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                {{-- <div class="overflow-hidden min-w-max"></div> --}}
                <table id="private" class="w-full table-auto">
                    <thead class="text-white text-left bg-red-700">
                        <tr>
                            <th class="px-4 py-2 ">NO. ANGGOTA</th>
                            <th class="px-4 py-2 ">NO. KTP</th>
                            <th class="px-4 py-2 ">NAMA</th>
                            <th class="px-4 py-2 ">TEMPAT TANGGAL LAHIR</th>
                            <th class="px-4 py-2 ">JENIS KELAMIN</th>
                            <th class="px-4 py-2 ">NO TELEPON</th>
                            <th class="px-4 py-2 ">JENIS SIM</th>
                            <th class="px-4 py-2 ">JENIS ASURANSI</th>
                            <th class="px-4 py-2 ">STATUS</th>
                            <th class="px-4 py-2 text-center ">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $driver)
                            <tr
                                class="bg-white uppercase text-sm font-normal border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 text-left border-b border-gray-300"> {{ $driver->memberid }}</td>
                                <td class="px-4 py-2 text-left border-b border-gray-300"> {{ $driver->idcard }}</td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $driver->fullname }}</td>
                                <td class="px-4 py-2 text-left border-b border-gray-300"> {{ $driver->birthloc }},
                                    {{ $driver->birthdate }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-300"> {{ $driver->gender }}</td>
                                <td class="px-4 py-2 text-left border-b border-gray-300"> {{ $driver->phone }}</td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $driver->lisence }}</td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $driver->insurance }}</td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    @if ($driver->status == 1)
                                        Aktif
                                    @else
                                        Non-Aktif
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    <div class="flex inline">
                                        <div class="p-2 bg-green-700 rounded-lg mr-3" title="Cetak QR Code">
                                            <a href={{ route('qrcode', ['id' => $driver->id]) }} target="_blank">
                                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M16 17V16H13V13H16V15H18V17H17V19H15V21H13V18H15V17H16ZM21 21H17V19H19V17H21V21ZM3 3H11V11H3V3ZM5 5V9H9V5H5ZM13 3H21V11H13V3ZM15 5V9H19V5H15ZM3 13H11V21H3V13ZM5 15V19H9V15H5ZM18 13H21V15H18V13ZM6 6H8V8H6V6ZM6 16H8V18H6V16ZM16 6H18V8H16V6Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="p-2 bg-yellow-300 rounded-lg mr-3" title="Edit Driver">
                                            <a href={{ route('editDriver', ['id' => $driver->id]) }}>
                                                <svg class="w-7 h-7 text-stone-900" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M21 6.75736L19 8.75736V4H10V9H5V20H19V17.2426L21 15.2426V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5501 3 20.9932V8L9.00319 2H19.9978C20.5513 2 21 2.45531 21 2.9918V6.75736ZM21.7782 8.80761L23.1924 10.2218L15.4142 18L13.9979 17.9979L14 16.5858L21.7782 8.80761Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="p-2 bg-blue-700 rounded-lg mr-3" title="Cetak Kartu">
                                            <a href="{{ route('kartuAnggota', ['memberid' => $driver->memberid]) }}"
                                                target="_blank">
                                                <svg class="text-white w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M13 12H16L12 16L8 12H11V8H13V12ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="p-2 bg-red-600 rounded-lg mr-3" title="Hapus Driver">
                                            <form class="m-0 p-0"
                                                action="{{ route('deleteDriver', ['driver' => $driver->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#private').DataTable({
                scrollX: true,
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
                    // Create the button HTML
                    console.log("DataTable initComplete function is running");
                    var buttonHTML =
                        '<a href="{{ route('tambahDriver') }}" class="cursor-pointer flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-2" id="tambahButton"><svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" /></svg><span class="font-bold">Tambah</span></a>';

                    // Insert the search bar and button into the container
                    $('#searchAndButtonContainer').append($('.dataTables_filter'));
                    $('#searchAndButtonContainer').append(buttonHTML);
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3; // Node.TEXT_NODE
                    }).remove();
                    // Style the search bar
                    $('.dataTables_filter label input').attr('placeholder', 'Search').css({
                        'background-color': '#fff',
                        'padding': '6px',
                        'box-shadow': '0 2px 2px -1px rgba(0, 0, 0, 0.1)',
                        'border-radius': '0.375rem' // Adding border-radius to match the button
                    });

                    // Style the button
                    $('#tambahButton').css({
                        'padding': '10px 16px', // Increase padding for a longer button
                        'font-size': '14px' // Slightly larger font size
                    });

                    // Apply media queries for responsiveness using CSS
                    var style = document.createElement('style');
                    style.innerHTML = `
                @media (max-width: 768px) {
                    #searchAndButtonContainer {
                        flex-direction: row;
                        justify-content: space-between;
                    }
                    .dataTables_filter input {
                        width: 100px; /* Smaller input size */
                    }
                    #tambahButton {
                        padding: 8px 12px; /* Smaller button padding */
                        font-size: 12px; /* Smaller font size */
                    }
                }
            `;
                    document.head.appendChild(style);
                }
            });
        });
    </script>
@endsection
