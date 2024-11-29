<!-- dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </div>
            <div class="items-center flex space-x-4">
                @if(auth()->user()->hasRole('guest'))
                    <a href="{{route('dashboard')}}" class="text-black-500 hover:text-black">Dashboard</a>
                    <a href="{{route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                @elseif (auth()->user()->hasRole('superAdmin') || auth()->user()->hasRole('admin'))
                    <a href="{{route('dashboard')}}" class="text-black-500 hover:text-black">Dashboard</a>
                    <a href="{{route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                    @if(auth()->user()->hasRole('superAdmin'))
                        <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                    @endif
                    <a href="{{route('ManageGround')}}" class="text-blue-500 hover:text-black">Manage Ground</a>
                @endif

                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                    <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                                <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z"></path>
                                </svg>
                                {{$currentUser}}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-sm font-medium text-gray-700 bg-red-50 hover:bg-red-200 hover:text-red-800 rounded-md transition duration-200 ease-in-out">
                                    <svg class="w-4 h-4 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.707 15.707a1 1 0 01-1.414 0L2.586 11l4.707-4.707a1 1 0 011.414 1.414L5.414 11l3.293 3.293a1 1 0 010 1.414zm9.414-1.414a1 1 0 01-1.414 0L11 8.414V7h2a3 3 0 000-6H7a3 3 0 000 6h2v1.414l-5.707 5.707a1 1 0 01-1.414-1.414L7 7.586V7a1 1 0 011-1h4a1 1 0 011 1v5.586l5.293 5.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Chart.js Tipe Tanah -->
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            <!-- Chart.js Pie Chart -->
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center ">
                <h2 class="text-lg font-semibold mb-4">Perbandingan Tipe Tanah</h2>
                <canvas id="groundChart"></canvas>
                
            </div>

            <!-- Chart.js Pie Chart - Kepemilikan Tanah -->
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                <h2 class="text-lg font-semibold mb-4">Perbandingan Milik Tanah</h2>
                <canvas id="ownershipChart"></canvas>
            </div>

            <!-- Chart.js Pie Chart - Status Tanah -->
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                <h2 class="text-lg font-semibold mb-4">Perbandingan Status Tanah</h2>
                <canvas id="statusChart"></canvas>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const avatar = document.querySelector('.profile-avatar');
        const dropdown = document.querySelector('.dropdown-content');
    
        avatar.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent event bubbling
            dropdown.classList.toggle('hidden');
        });
    
        window.addEventListener('click', function(event) {
            if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    
        // Fetching the ground data from the controller
        const groundData = @json($groundData); 
        const ownershipData = @json($ownershipData);
        const statusData = @json($statusData);
    
        // Chart for Tipe Tanah
        const ctx = document.getElementById('groundChart').getContext('2d');
        const groundChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: groundData.labels,
                datasets: [{
                    label: 'Tipe Tanah',
                    data: groundData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Soft Red
                        'rgba(75, 192, 192, 0.6)', // Soft Green
                        'rgba(54, 162, 235, 0.6)'  // Soft Blue
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
                                // Calculating percentage
                                let total = groundData.data.reduce((sum, value) => sum + value, 0);
                                let percentage = (tooltipItem.raw / total * 100).toFixed(2);
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
                            }
                        }
                    },
                    datalabels: {
                        formatter: function(value, context) {
                            let total = groundData.data.reduce((sum, value) => sum + value, 0);
                            let percentage = ((value / total) * 100).toFixed(2);
                            return `${value} (${percentage}%)`;
                        },
                        color: '#fff',
                        font: {
                            weight: 'bold',
                        }
                    }
                }
            }
        });
    
        // Chart for Status Kepemilikan
    const ownershipCtx = document.getElementById('ownershipChart').getContext('2d');
    new Chart(ownershipCtx, {
        type: 'pie', // Tipe grafik
        data: {
            labels: ownershipData.labels, // Label untuk grafik
            datasets: [{
                label: 'Status Kepemilikan',
                data: ownershipData.data, // Data jumlah status kepemilikan
                backgroundColor: [
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                ],
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Posisi legend
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            // Menghitung persentase
                            let total = ownershipData.data.reduce((sum, value) => sum + value, 0);
                            let percentage = (tooltipItem.raw / total * 100).toFixed(2);
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
                        }
                    }
                },
                datalabels: {
                    formatter: function(value, context) {
                        // Menambahkan persentase ke data label
                        let total = ownershipData.data.reduce((sum, value) => sum + value, 0);
                        let percentage = ((value / total) * 100).toFixed(2);
                        return `${value} (${percentage}%)`;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold',
                    }
                }
            }
        },
    });

    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'pie', // Tipe grafik
        data: {
            labels: statusData.labels, // Label untuk grafik
            datasets: [{
                label: 'Status Tanah',
                data: statusData.data, // Data jumlah status tanah
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // Soft Blue
                    'rgba(255, 206, 86, 0.6)', // Soft Yellow
                ],
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Posisi legend
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            // Menghitung persentase
                            let total = statusData.data.reduce((sum, value) => sum + value, 0);
                            let percentage = (tooltipItem.raw / total * 100).toFixed(2);
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
                        }
                    }
                },
                datalabels: {
                    formatter: function(value, context) {
                        // Menambahkan persentase ke data label
                        let total = statusData.data.reduce((sum, value) => sum + value, 0);
                        let percentage = ((value / total) * 100).toFixed(2);
                        return `${value} (${percentage}%)`;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold',
                    }
                }
            }
        },
    });


    </script>
    

</body>
</html>
