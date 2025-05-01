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

    <main class="container mx-auto p-4">
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

    </main>

    <div class="container">
        <h3>Statistik Tipe Tanah</h3>
        <canvas id="tipeTanahChart" width="400" height="200"></canvas>

        <h3 class="mt-4">Status Kepemilikan</h3>
        <canvas id="statusKepemilikanChart" width="400" height="200"></canvas>

        <h3 class="mt-4">Status Tanah</h3>
        <canvas id="statusTanahChart" width="400" height="200"></canvas>
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
    </script>

    <script>
        $(document).ready(function () {
        const token = localStorage.getItem('token');
        const user = JSON.parse(localStorage.getItem('userData'));


        $('#groundTable').DataTable(); // inisialisasi dulu baru append data

            if (token) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get-ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('Full API response:', response);

                        if (response.status === 'success') {
                            const table = $('#groundTable').DataTable();

                            response.data.forEach(item => {
                                table.row.add([
                                    item.detail_tanah_id,
                                    item.nama_tanah,
                                    item.added_by ?? '-',
                                    item.updated_at ?? '-',
                                    `
                                    <a class="text-gray-500 mx-1" href="/EditPeta/${item.ground_detail_id}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="text-gray-500 mx-1"
                                        onclick="showDeleteModal('/GroundDestroy/${item.ground_detail_id}', '${item.nama_tanah}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a class="text-gray-500 mx-1">
                                        <i class="fas fa-eye cursor-pointer" data-id="${item.ground_detail_id}"></i>
                                    </a>
                                    `
                                ]).draw(false);
                            });
                        }
                    }
                });
            } else {
                console.log('Token tidak ditemukan di localStorage');
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            const token = localStorage.getItem('token');

            if(token){
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get-ground',
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
                new Chart(document.getElementById(canvasId), {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: data,
                            backgroundColor: [
                                '#4e73df',
                                '#1cc88a',
                                '#36b9cc',
                                '#f6c23e'
                            ],
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        let total = data.reduce((sum, value) => sum + value, 0);
                                        let percentage = (tooltipItem.raw / total * 100).toFixed(2);
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
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
