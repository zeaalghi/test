@extends('master')
@section('content')
    <div class="">
        <!-- Title -->
        <div class="mt-10">
            <p class="text-2xl font-extrabold uppercase">Data Armada</p>
        </div>
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">

            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                {{-- <div class="overflow-hidden min-w-max"></div> --}}
                <table id="private" class="w-full table-auto">
                    <thead class="text-white text-left uppercase bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3 ">
                                Nama Driver
                            </th>
                            <th class="px-6 py-3 ">
                                Kapasitas
                            </th>
                            <th class="px-6 py-3 ">
                                Tipe Order
                            </th>
                            <th class="px-6 py-3 ">
                                Tujuan
                            </th>
                            <th class="px-6 py-3 ">
                                Tanggal Berangkat
                            </th>
                            <th class="px-6 py-3 ">
                                Tanggal Sampai
                            </th>
                            <th class="px-6 py-3 ">
                                Telepon
                            </th>
                            <th class="px-6 py-3 ">
                                Jenis SIM
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($armada as $armada)
                            <tr
                                class="bg-white text-left font-normal text-sm uppercase border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $armada->drivers->fullname }}
                                </td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $armada->capacity }} Ton
                                </td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $armada->order_type }}
                                </td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $armada->destinations->city ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $armada->departure_date ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $armada->arrival_date ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $armada->drivers->phone }}
                                </td>
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $armada->drivers->lisence }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    var buttonHTML =
                        '<a href="{{ route('tambahArmada') }}" class="cursor-pointer flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-2" id="tambahButton"><svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" /></svg><span class="font-bold">Tambah</span></a>';

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
