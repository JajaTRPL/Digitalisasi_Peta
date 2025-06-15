<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Bulanan</title>
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
                <a href="/dashboard" class="text-[#FF9800] hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <h1 class="text-2xl font-bold text-[#FF9800]">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Statistik Pengunjung Bulanan
                </h1>
            </div>
            
            <div class="chart-container" style="height: 400px;">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('token');
            
            if(token) {
                fetchMonthlyData(token);
            }

            function fetchMonthlyData(token) {
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/visitors/monthly',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log(response);
                        renderMonthlyChart(response.data);
                    }, 
                    error: function(xhr){
                        console.error('Error:', xhr.responseText);
                    }
                })
            }

            function renderMonthlyChart(monthlyData) {
                const weekMap = {
                    'Minggu 1': 'Week 1',
                    'Minggu 2': 'Week 2',
                    'Minggu 3': 'Week 3',
                    'Minggu 4': 'Week 4',
                };

                const weeks = Object.keys(weekMap);
                const counts = weeks.map(minggu => {
                    const week = weekMap[minggu];
                    return monthlyData[week] ?? 0;
                });

                const ctx = document.getElementById('monthlyChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: weeks,
                        datasets: [{
                            label: 'Jumlah Pengunjung',
                            data: counts,
                            backgroundColor: '#FF9800',
                            borderColor: '#F57C00',
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