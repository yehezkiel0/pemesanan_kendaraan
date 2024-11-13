<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemakaian Kendaraan</title>
    @vite('public/css/style.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
@include('layouts.navbar')

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center text-gray-800">Dashboard Pemakaian Kendaraan</h1>
        </header>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Grafik Pemakaian Kendaraan</h2>
            <div class="chart-container">
                <canvas id="vehicleUsageChart"></canvas>
            </div>
            <div class="mb-4 mr-4 text-right">
                <a href="{{ route('reservations.index') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Log Pemesanan Kendaraan</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 py-2 px-4 text-left text-gray-600">Waktu</th>
                    <th class="border border-gray-300 py-2 px-4 text-left text-gray-600">Level</th>
                    <th class="border border-gray-300 py-2 px-4 text-left text-gray-600">Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="border py-2 px-4 border-gray-300">{{ $log->created_at }}</td>
                        <td class="border py-2 px-4 border-gray-300">{{ $log->level }}</td>
                        <td class="border py-2 px-4 border-gray-300">{{ $log->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script>
        const vehicleData = {
            labels: @json($labels),
            datasets: [{
                label: 'Pemakaian Kendaraan',
                data: @json($data),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2,
                barThickness: 70,
                maxBarThickness: 90,
                barPercentage: 0.5,
                minBarLength: 10,
                responsive: true,
                maintainAspectRatio: false,
                padding: 2

            }]
        };

        const ctx = document.getElementById('vehicleUsageChart').getContext('2d');
        const vehicleUsageChart = new Chart(ctx, {
            type: 'bar',
            data: vehicleData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            lineWidth: 1,
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                family: 'Open Sans',
                                size: 12
                            }
                        }
                    },
                    x: {
                        barThickness: 30,
                        grid: {
                            display: true,
                            lineWidth: 1,
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                family: 'Open Sans',
                                size: 14
                            }
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            family: 'Open Sans',
                            size: 12
                        }
                    }
                },
                tooltips: {
                    enabled: true,
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem
                                .yLabel;
                        }
                    }
                },
                layout: {
                    padding: {
                        top: 20,
                        right: 20,
                        bottom: 20,
                        left: 20
                    }
                }
            }
        });
    </script>
</body>

</html>
