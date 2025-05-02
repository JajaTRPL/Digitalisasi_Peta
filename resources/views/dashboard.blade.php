<!-- resources/views/dashboard.blade.php -->
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
        <!-- Bagian Jumlah Pengunjung (sudah ada) -->

        <!-- Bagian Chart yang diperbaiki -->
        <section class="mb-8 mt-8">
            <h2 class="text-2xl font-bold mb-4">Statistik Data Tanah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Chart Tipe Tanah -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4 text-center">Tipe Tanah</h3>
                    <div class="flex justify-center">
                        <div class="chart-container" style="position: relative; height:250px; width:250px;">
                            <canvas id="tipeTanahChart"></canvas>
                        </div>
                    </div>
                    <div id="tipeTanahChart-legend" class="mt-5 flex justify-center flex-wrap gap-x-4"></div>
                </div>

                <!-- Chart Status Kepemilikan -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4 text-center">Status Kepemilikan</h3>
                    <div class="flex justify-center">
                        <div class="chart-container" style="position: relative; height:250px; width:250px;">
                            <canvas id="statusKepemilikanChart"></canvas>
                        </div>
                    </div>
                    <div id="statusKepemilikanChart-legend" class="mt-5 flex justify-center flex-wrap gap-x-4"></div>
                </div>

                <!-- Chart Status Tanah -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4 text-center">Status Tanah</h3>
                    <div class="flex justify-center">
                        <div class="chart-container" style="position: relative; height:250px; width:250px;">
                            <canvas id="statusTanahChart"></canvas>
                        </div>
                    </div>
                    <div id="statusTanahChart-legend" class="mt-5 flex justify-center flex-wrap gap-x-4"></div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const avatar = document.querySelector('.profile-avatar');
        const dropdown = document.querySelector('.dropdown-content');

        avatar.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

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

                            const tanahBengkok = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Bengkok').length;
                            const tanahKasDesa = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Kas Desa').length;
                            const tanahWakaf = allDataGround.filter(item => item.nama_tipe_tanah === 'Tanah Wakaf').length;

                            const tipeTanahData = {
                                labels: ['Tanah Bengkok', 'Tanah Kas Desa', 'Tanah Wakaf'],
                                data: [tanahBengkok, tanahKasDesa, tanahWakaf]
                            };

                            const milikPemerintah = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Pemerintah').length;
                            const milikPerorangan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Perorangan').length;
                            const milikKalurahan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Kalurahan').length;
                            const milikSultan = allDataGround.filter(item => item.nama_status_kepemilikan === 'Milik Sultan').length;

                            const statusKepemilikanData = {
                                labels: ['Pemerintah', 'Perorangan', 'Kalurahan', 'Sultan'],
                                data: [milikPemerintah, milikPerorangan, milikKalurahan, milikSultan]
                            };

                            const statusDisewakan = allDataGround.filter(item => item.nama_status_tanah === 'Disewakan').length;
                            const statusTersewa = allDataGround.filter(item => item.nama_status_tanah === 'Tersewa').length;

                            const statusTanahData = {
                                labels: ['Disewakan', 'Tersewa'],
                                data: [statusDisewakan, statusTersewa]
                            };

                            renderChart('tipeTanahChart', tipeTanahData.labels, tipeTanahData.data);
                            renderChart('statusKepemilikanChart', statusKepemilikanData.labels, statusKepemilikanData.data);
                            renderChart('statusTanahChart', statusTanahData.labels, statusTanahData.data);
                        }
                    }
                });
            }

            function renderChart(canvasId, labels, data) {
                const ctx = document.getElementById(canvasId).getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                            borderColor: '#fff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false // Nonaktifkan legend default
                            }
                        },
                        cutout: '60%' // Untuk doughnut chart
                    }
                });

                // Render custom legend
                const legendContainer = document.getElementById(canvasId + '-legend');
                labels.forEach((label, i) => {
                    const legendItem = document.createElement('div');
                    legendItem.className = 'flex items-center mb-2';

                    const colorBox = document.createElement('div');
                    colorBox.className = 'w-4 h-4 mr-2 rounded-full';
                    colorBox.style.backgroundColor = chart.data.datasets[0].backgroundColor[i];

                    const text = document.createElement('span');
                    text.className = 'text-sm';
                    text.textContent = `${label}: ${data[i]}`;

                    legendItem.appendChild(colorBox);
                    legendItem.appendChild(text);
                    legendContainer.appendChild(legendItem);
                });
            }
        });
    </script>

</body>


</html>
