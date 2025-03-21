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

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">
            Dasbor Tanah
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @include('components.chart', [
                'id' => 'groundChart',
                'title' => 'Perbandingan Tipe Tanah',
                'data' => $groundData,
                'colors' => ['rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(54, 162, 235, 0.6)']
            ])

            @include('components.chart', [
                'id' => 'ownershipChart',
                'title' => 'Perbandingan Milik Tanah',
                'data' => $ownershipData,
                'colors' => ['rgba(255, 159, 64, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 205, 86, 0.6)']
            ])

            @include('components.chart', [
                'id' => 'statusChart',
                'title' => 'Perbandingan Status Tanah',
                'data' => $statusData,
                'colors' => ['rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)']
            ])
        </div>
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
</body>
</html>