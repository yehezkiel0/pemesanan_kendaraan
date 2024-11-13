<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('public/css/style.css')
    @vite('resources/js/app.js')
    <title>Pemesanan Kendaraan</title>
</head>
@include('layouts.navbar')

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center text-gray-800">Pemesanan Kendaraan</h1>
        </header>
        <div class="mb-4 mr-4 text-right">
            <a href="{{ route('reservations.dashboard') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Dashboard
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Form Pemesanan Kendaraan</h2>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="vehicle_type" placeholder="Jenis Kendaraan" required
                        class="border border-gray-300 rounded-lg p-2">
                    <input type="text" name="driver" placeholder="Driver" required
                        class="border border-gray-300 rounded-lg p-2">
                    <input type="text" name="requester" placeholder="Pemohon" required
                        class="border border-gray-300 rounded-lg p-2">
                    <input type="text" name="approver_level_1" placeholder="Pihak yang Menyetujui Level 1" required
                        class="border border-gray-300 rounded-lg p-2">
                    <input type="text" name="approver_level_2" placeholder="Pihak yang Menyetujui Level 2" required
                        class="border border-gray-300 rounded-lg p-2">
                    <input type="date" name="reservation_date" required
                        class="border border-gray-300 rounded-lg p-2">
                </div>
                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Pesan</button>
            </form>
        </div>
        <div class="mb-4 mr-4 text-right">
            <a href="{{ route('reservations.export') }}"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Ekspor Laporan Pemesanan
            </a>
        </div>
    </div>
</body>

</html>
