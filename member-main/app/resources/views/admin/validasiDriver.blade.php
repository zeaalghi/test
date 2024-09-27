@extends('master')
@section('content')
    <div class="">
        <!-- Title -->
        <div class="mt-10">
            <p class="text-2xl font-extrabold uppercase">Validasi Pendaftaran Driver Baru</p>
        </div>
        <!-- Tables -->
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">
            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                <table id="private" class="table-fixed w-full">
                    <thead class="text-white uppercase bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-2 w-[180px]">Nama</th>
                            <th class="px-4 py-2 w-[180px]">No. Telepon</th>
                            <th class="px-4 py-2 w-[180px]">Lisensi</th>
                            <th class="px-4 py-2 w-[180px]">Asuransi</th>
                            <th class="px-4 py-2 w-[180px]">Info Driver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr
                                class="bg-white uppercase text-left font-normal text-sm border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border-b border-gray-300">{{ $driver->fullname }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">
                                    {{ $driver->phone }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $driver->lisence }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $driver->insurance }}</td>
                                <td class="px-4 py-2 flex justify-center border-b border-gray-300">
                                    <a href="{{ route('pageDetailDriver', ['driver' => $driver->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 11H13V17H11V11ZM11 7H13V9H11V7Z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Repeat rows as necessary -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    @if (session('whatsappUrl'))
        <script>
            window.open("{{ session('whatsappUrl') }}", '_blank');
        </script>
    @endif
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
