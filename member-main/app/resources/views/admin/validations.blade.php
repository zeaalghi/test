@extends('master')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Validasi Perubahan</h2>
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2">Driver ID</th>
                    <th class="py-2">Field</th>
                    <th class="py-2">Old Value</th>
                    <th class="py-2">New Value</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($validations as $validation)
                    <tr>
                        <td class="border px-4 py-2">{{ $validation->driver_id }}</td>
                        <td class="border px-4 py-2">{{ $validation->field }}</td>
                        <td class="border px-4 py-2">{{ $validation->old_value }}</td>
                        <td class="border px-4 py-2">{{ $validation->new_value }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('approveValidation', $validation->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Approve</button>
                            </form>
                            <form action="{{ route('rejectValidation', $validation->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            @foreach ($validations->groupBy('driver_id') as $driverId => $validationGroup)
                <form action="{{ route('approveAllValidations', $driverId) }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Approve All for Driver ID:
                        {{ $driverId }}</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
