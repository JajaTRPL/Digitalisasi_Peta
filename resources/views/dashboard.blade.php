<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-[#F6F9EE]">
    @include('components.navbar')

    <div class="container mx-auto p-4">
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">
            Jumlah Pengunjung
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold">
                        Hari ini
                    </h3>
                    <div class="text-2xl font-bold my-2">
                        156
                        <i class="fas fa-chart-bar text-gray-500 text-4xl"> </i>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold">
                        Mingguan
                    </h3>
                    <div class="text-2xl font-bold my-2">
                        604
                        <i class="fas fa-chart-bar text-gray-500 text-4xl"> </i>
                    </div>
                    <button class="mt-4 text-sm text-gray-500">
                        Detail
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold">
                        Bulanan
                    </h3>
                    <div class="text-2xl font-bold my-2">
                        5287
                        <i class="fas fa-chart-bar text-gray-500 text-4xl"> </i>
                    </div>
                    <button class="mt-4 text-sm text-gray-500">
                        Detail
                        <i class="fas fa-arrow-right"> </i>
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold">
                        Tahunan
                    </h3>
                    <div class="text-2xl font-bold my-2">
                        12941
                        <i class="fas fa-chart-bar text-gray-500 text-4xl"> </i>
                    </div>
                    <button class="mt-4 text-sm text-gray-500">
                        Detail
                        <i class="fas fa-arrow-right"> </i>
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold">
                        Total
                    </h3>
                    <div class="text-2xl font-bold my-2">
                        52784
                        <i class="fas fa-chart-bar text-gray-500 text-4xl"> </i>
                    </div>
                    <button class="mt-4 text-sm text-gray-500">
                        Detail
                        <i class="fas fa-arrow-right"> </i>
                    </button>
                </div>
            </div>
       </section>
    </div>

    <div class="container mx-auto p-4">
        <section class="mb-8 mt-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
                Statistik Data Tanah
            </h2>
            
            <!-- First Row - Charts -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Tipe Tanah Chart -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#666CFF] to-[#8B90FF] p-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <i class="fas fa-layer-group mr-2"></i>
                            Tipe Tanah
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="chart-container" style="position: relative; height:250px;">
                            <canvas id="tipeTanahChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Status Kepemilikan Chart -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#4CAF50] to-[#8BC34A] p-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <i class="fas fa-flag mr-2"></i>
                            Status Kepemilikan
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="chart-container" style="position: relative; height:250px;">
                            <canvas id="statusKepemilikanChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Status Tanah Chart -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-[#FF9800] to-[#FFC107] p-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <i class="fas fa-tag mr-2"></i>
                            Status Tanah
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="chart-container" style="position: relative; height:250px;">
                            <canvas id="statusTanahChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row - Detailed Information -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-[#9C27B0] to-[#673AB7] p-4">
                    <h3 class="text-lg font-semibold text-white flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Detail Informasi Tanah
                    </h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Tipe Tanah Details -->
                    <div>
                        <h4 class="font-semibold text-lg mb-3 text-[#666CFF] flex items-center">
                            <i class="fas fa-layer-group mr-2"></i>
                            Tipe Tanah
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#666CFF] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Tanah Bengkok</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik desa yang diberikan sebagai tunjangan kepada perangkat desa.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#666CFF] text-white text-xs font-bold rounded tipe-tanah-bengkok-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-green-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#4CAF50] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Tanah Kas Desa</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik desa yang digunakan untuk kepentingan umum masyarakat desa.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#4CAF50] text-white text-xs font-bold rounded tipe-tanah-kas-desa-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-amber-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#FF9800] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Tanah Wakaf</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah yang diwakafkan untuk keperluan sosial atau keagamaan.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#FF9800] text-white text-xs font-bold rounded tipe-tanah-wakaf-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Kepemilikan Details -->
                    <div>
                        <h4 class="font-semibold text-lg mb-3 text-[#4CAF50] flex items-center">
                            <i class="fas fa-flag mr-2"></i>
                            Status Kepemilikan
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#2196F3] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Pemerintah</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik pemerintah daerah/negara.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#2196F3] text-white text-xs font-bold rounded status-pemerintah-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-purple-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#9C27B0] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Perorangan</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik pribadi warga.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#9C27B0] text-white text-xs font-bold rounded status-perorangan-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#607D8B] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Kalurahan</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik pemerintah kalurahan.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#607D8B] text-white text-xs font-bold rounded status-kalurahan-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-brown-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#795548] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Sultan</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah milik keraton/kasultanan.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#795548] text-white text-xs font-bold rounded status-sultan-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Tanah Details -->
                    <div>
                        <h4 class="font-semibold text-lg mb-3 text-[#FF9800] flex items-center">
                            <i class="fas fa-tag mr-2"></i>
                            Status Tanah
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-start p-3 bg-teal-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#00BCD4] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Disewakan</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah yang saat ini tersedia untuk disewakan kepada masyarakat.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#00BCD4] text-white text-xs font-bold rounded status-disewakan-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-red-50 rounded-lg">
                                <div class="w-3 h-3 bg-[#FF5722] rounded-full mt-1.5 mr-3"></div>
                                <div class="flex-1">
                                    <h5 class="font-medium">Tersewa</h5>
                                    <p class="text-sm text-gray-600 mt-1">Tanah yang sedang dalam masa sewa oleh pihak tertentu.</p>
                                    <div class="mt-2 text-right">
                                        <span class="inline-block px-2 py-1 bg-[#FF5722] text-white text-xs font-bold rounded status-tersewa-count">0 Lahan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            const token = localStorage.getItem('token');

            if(token){
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response){
                        if(response.status === 'success'){
                            const allDataGround = response.data;
                            console.log('Data tanah diterima:', allDataGround);

                            // Process data for charts
                            const tanahBengkok = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Bengkok').length;
                            const tanahKasDesa = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Kas Desa').length;
                            const tanahWakaf = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Wakaf').length;

                            const tipeTanahData = {
                                labels: ['Tanah Bengkok', 'Tanah Kas Desa', 'Tanah Wakaf'],
                                data: [tanahBengkok, tanahKasDesa, tanahWakaf],
                                colors: ['#666CFF', '#4CAF50', '#FF9800']
                            };

                            const milikPemerintah = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Pemerintah').length;
                            const milikPerorangan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Perorangan').length;
                            const milikKalurahan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Kalurahan').length;
                            const milikSultan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Sultan').length;

                            const statusKepemilikanData = {
                                labels: ['Pemerintah', 'Perorangan', 'Kalurahan', 'Sultan'],
                                data: [milikPemerintah, milikPerorangan, milikKalurahan, milikSultan],
                                colors: ['#2196F3', '#9C27B0', '#607D8B', '#795548']
                            };

                            const statusDisewakan = allDataGround.filter(item => item.nama_status_tanah === 'Disewakan').length;
                            const statusTersewa = allDataGround.filter(item => item.nama_status_tanah === 'Tersewa').length;

                            const statusTanahData = {
                                labels: ['Disewakan', 'Tersewa'],
                                data: [statusDisewakan, statusTersewa],
                                colors: ['#00BCD4', '#FF5722']
                            };

                            // Render charts
                            renderChart('tipeTanahChart', tipeTanahData);
                            renderChart('statusKepemilikanChart', statusKepemilikanData);
                            renderChart('statusTanahChart', statusTanahData);
                            
                            // Update detailed information
                            updateDetailedInfo(allDataGround);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching ground data:', error);
                    }
                });
            } else {
                console.log('Token tidak ditemukan di localStorage');
            }

            function renderChart(canvasId, chartData) {
                const ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            data: chartData.data,
                            backgroundColor: chartData.colors,
                            borderColor: '#fff',
                            borderWidth: 2,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((context.raw / total) * 100);
                                        return `${context.label}: ${context.raw} (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            }

            function updateDetailedInfo(data) {
                // Count data
                const tanahBengkok = data.filter(item => item.nama_tipe_tanah === 'Tanah Bengkok').length;
                const tanahKasDesa = data.filter(item => item.nama_tipe_tanah === 'Tanah Kas Desa').length;
                const tanahWakaf = data.filter(item => item.nama_tipe_tanah === 'Tanah Wakaf').length;
                
                const milikPemerintah = data.filter(item => item.nama_status_kepemilikan === 'Milik Pemerintah').length;
                const milikPerorangan = data.filter(item => item.nama_status_kepemilikan === 'Milik Perorangan').length;
                const milikKalurahan = data.filter(item => item.nama_status_kepemilikan === 'Milik Kalurahan').length;
                const milikSultan = data.filter(item => item.nama_status_kepemilikan === 'Milik Sultan').length;
                
                const statusDisewakan = data.filter(item => item.nama_status_tanah === 'Disewakan').length;
                const statusTersewa = data.filter(item => item.nama_status_tanah === 'Tersewa').length;
                
                // Update detailed information counts
                updateCount('.tipe-tanah-bengkok-count', tanahBengkok, '#666CFF');
                updateCount('.tipe-tanah-kas-desa-count', tanahKasDesa, '#4CAF50');
                updateCount('.tipe-tanah-wakaf-count', tanahWakaf, '#FF9800');
                
                updateCount('.status-pemerintah-count', milikPemerintah, '#2196F3');
                updateCount('.status-perorangan-count', milikPerorangan, '#9C27B0');
                updateCount('.status-kalurahan-count', milikKalurahan, '#607D8B');
                updateCount('.status-sultan-count', milikSultan, '#795548');
                
                updateCount('.status-disewakan-count', statusDisewakan, '#00BCD4');
                updateCount('.status-tersewa-count', statusTersewa, '#FF5722');
            }
            
            function updateCount(selector, count, color) {
                const elements = document.querySelectorAll(selector);
                elements.forEach(element => {
                    element.textContent = count + ' Lahan';
                    element.style.backgroundColor = color;
                });
            }
        });
    </script>
</body>
</html>