@extends('master')
@section('content')
    <div class="">
        <!-- Title -->
        <div class="mt-10">
            <p class="text-2xl font-extrabold uppercase">Validasi Perubahan Akun</p>
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
                            <th class="px-4 py-2 w-[180px]">Field</th>
                            <th class="px-4 py-2 w-[180px]">Data Lama</th>
                            <th class="px-4 py-2 w-[180px]">Data Baru</th>
                            <th class="px-4 py-2 w-[180px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($validations as $validation)
                            <tr
                                class="bg-white uppercase text-left font-normal text-sm border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border-b border-gray-300">{{ $validation->drivers->fullname }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">
                                    {{ $fieldNames[$validation->field] ?? $validation->field }}</td>
                                @if ($validation->field == 'image')
                                    <td class="px-4 py-2 border-b border-gray-300">
                                        <img class="object-cover w-auto h-32"
                                            src="{{ asset('storage/profile/' . $validation->old_value) }}"
                                            alt="Gambar Data Lama">
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-300">
                                        <img class="object-cover w-auto h-32"
                                            src="{{ asset('storage/validation/' . $validation->new_value) }}"
                                            alt="Gambar Data Baru">
                                    </td>
                                @else
                                    <td class="px-4 py-2 border-b border-gray-300">{{ $validation->old_value }}
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-300">{{ $validation->new_value }}
                                    </td>
                                @endif
                                <td
                                    class="px-4 py-2 border-b border-gray-300">
                                    <div class="items-center justify-center flex gap-4">
                                        <form
                                            action="{{ route('approvedAccountValidation', ['validation' => $validation->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="hover:cursor-pointer">
                                                <svg class="w-12 h-12 text-green-700" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                        <form
                                            action="{{ route('rejectedAccountValidation', ['validation' => $validation->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hover:cursor-pointer">
                                                <svg class="w-12 h-12 text-red-700" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
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
