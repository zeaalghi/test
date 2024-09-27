@extends('master')
@section('content')
    <div class="">
        <div class="mt-6">
            <p class="text-2xl font-extrabold">DATA ORDER</p>
        </div>
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">

            </div>
            <!-- Tables -->
            <div class="relative overflow-x-auto rounded-lg">
                <table class="w-full table-auto" id="private">
                    <thead class="text-white text-left bg-red-700 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No Telepon Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipe Order
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Muatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat Muatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pengambilan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tujuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pengiriman
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Sampai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pemesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrder as $order)
                            <tr
                                class="bg-white uppercase text-sm font-normal border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->users->name }}
                                </td>
                                <td class="px-4 py-2 text-left border-b border-gray-300">
                                    {{ $order->users->address ?? '-' }}
                                </td>
                                <td class="px-4 py-2 text-left border-b border-gray-300">
                                    {{ $order->users->phone }}
                                </td>
                                <td class="px-4 py-2 text-left border-b border-gray-300">
                                    {{ $order->order_type }}
                                </td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->payload }}
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    {{ $order->payload_weight }} Ton
                                </td>
                                <td class="px-4 py-2 text-left border-b border-gray-300">
                                    {{ $order->pickup_destination->city }}
                                </td>
                                <td class="px-4 py-2 text-left border-b border-gray-300">
                                    {{ $order->delivery->city }}
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    {{ $order->fleets->departure_date }}
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    {{ $order->fleets->arrival_date }}
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    {{ $order->order_date }}
                                </td>
                                <td class="px-4 py-2 text-left whitespace-nowrap border-b border-gray-300">
                                    Rp. {{ $order->price }}
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

                    // Insert the search bar and button into the container
                    $('#searchAndButtonContainer').append($('.dataTables_filter'));
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

    <script>
        $(document).ready(function() {
            var table = $('#private').DataTable();

            if (!$.fn.dataTable.isDataTable('#private')) {
                $('#private').DataTable({
                    "pageLength": 25,
                    "lengthChange": false,
                    "info": false
                });
            } else {
                table.page.len(25).draw();
                table.settings()[0].oFeatures.bLengthChange = false;
                table.settings()[0].oFeatures.bInfo = false;
            }
            $('.dataTables_length').css('visibility', 'hidden');
            // 
        });
    </script>
@endsection
