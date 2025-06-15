<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Tahunan</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/sleman-logo.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-[#F6F9EE]">
    @include('components.navbar')

    <div class="container mx-auto p-4">
        <div class="bg-white rounded-xl shadow-lg p-6 mt-10">
            <div class="flex justify-between items-center mb-6">
                <a href="/dashboard" class="text-[#9C27B0] hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <h1 class="text-2xl font-bold text-[#9C27B0]">
                    <i class="fas fa-calendar mr-2"></i>
                    Statistik Pengunjung Tahunan
                </h1>
            </div>
            
            <div class="chart-container" style="height: 400px;">
                <canvas id="yearlyChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('token');
            
            if(token) {
                fetchYearlyData(token);
            }

            function fetchYearlyData(token) {
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/visitors/yearly',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log(response);
                        renderYearlyChart(response.data);
                    }, 
                    error: function(xhr){
                        console.error('Error:', xhr.responseText);
                    }
                })
            }

            function renderYearlyChart(yearlyData) {
                const months = [
                    'Januari', 
                    'Februari', 
                    'Maret', 
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ];
                 
                const counts = months.map(month => yearlyData[month] ?? 0);
                
                const ctx = document.getElementById('yearlyChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Jumlah Pengunjung',
                            data: counts,
                            backgroundColor: '#9C27B0',
                            borderColor: '#7B1FA2',
                            borderWidth: 1,
                            borderRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Pengunjung: ${context.raw}`;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>