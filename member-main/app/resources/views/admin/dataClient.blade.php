@extends('master')
@section('content')
    <div class="">
        <!-- Title -->
        <div class="mt-10">
            <p class="text-2xl font-extrabold uppercase">Data Client</p>
        </div>
        <!-- Tables -->
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">
            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                <table id="private" class="table-fixed w-full">
                    <thead class="text-white text-left uppercase bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-2 w-[240px]">Nama</th>
                            <th class="px-4 py-2 w-[280px]">Email</th>
                            <th class="px-4 py-2 w-[280px]">Alamat</th>
                            <th class="px-4 py-2 w-[240px]">Nomor Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client as $client)
                            <tr
                                class="bg-white text-left font-normal text-sm uppercase hover:bg-gray-50">
                                <td class="px-4 py-2 whitespace-nowrap border-b border-gray-300">{{ $client->name }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $client->email }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $client->address ?: '-' }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $client->phone }}</td>
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
@endsection
