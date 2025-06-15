<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Mingguan</title>
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
                <a href="/dashboard" class="text-[#4CAF50] hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <h1 class="text-2xl font-bold text-[#4CAF50]">
                    <i class="fas fa-calendar-week mr-2"></i>
                    Statistik Pengunjung Mingguan
                </h1>
            </div>
            
            <div class="chart-container" style="height: 400px;">
                <canvas id="weeklyChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('token');
            
            if(token) {
                fetchWeeklyData(token);
            }

            function fetchWeeklyData(token) {

                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/visitors/weekly',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log(response);
                        renderWeeklyChart(response.data);
                    }, 
                    error: function(xhr){
                        console.error('Error:', xhr.responseText);
                    }
                })
            }

            function renderWeeklyChart(weeklyData) {
                const hariMapping = {
                    'Senin': 'Monday',
                    'Selasa': 'Tuesday',
                    'Rabu': 'Wednesday',
                    'Kamis': 'Thursday',
                    'Jumat': 'Friday',
                    'Sabtu': 'Saturday',
                    'Minggu': 'Sunday'
                };

                const days = Object.keys(hariMapping); // ['Senin', 'Selasa', ...]
                const counts = days.map(hariIndo => {
                    const hariInggris = hariMapping[hariIndo];
                    return weeklyData[hariInggris]?.count || 0;
                });

                

                const ctx = document.getElementById('weeklyChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: days,
                        datasets: [{
                            label: 'Jumlah Pengunjung',
                            data: counts,
                            backgroundColor: '#4CAF50',
                            borderColor: '#388E3C',
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
                                    label: function (context) {
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