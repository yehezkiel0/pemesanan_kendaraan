<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('public/css/style.css')
    @vite('resources/js/app.js')
    <title>Approval Pemesanan Kendaraan</title>
</head>

<body class="bg-gray-100">
    @include('layouts.navbar')
    <div class="container mx-auto p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center text-gray-800">Approval Pemesanan Kendaraan</h1>
        </header>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Daftar Pemesanan</h2>
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Jenis Kendaraan</th>
                        <th class="border border-gray-300 px-4 py-2">Driver</th>
                        <th class="border border-gray-300 px-4 py-2">Pemohon</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->vehicle_type }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->driver }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->requester }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($reservation->status == 'pending')
                                    @if (auth()->user()->role === 'level1')
                                        <form action="{{ route('approvals.approve.level1', $reservation->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600">Approve</button>
                                        </form>
                                        <form action="{{ route('approvals.reject.level1', $reservation->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600">Reject</button>
                                        </form>
                                    @elseif (auth()->user()->role === 'level2')
                                    @endif
                                @elseif ($reservation->status == 'menunggu level 2' && auth()->user()->role === 'level2')
                                    <form action="{{ route('approvals.approve.level2', $reservation->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600">Approve</button>
                                    </form>
                                    <form action="{{ route('approvals.reject.level2', $reservation->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600">Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
