<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pulihkan Data Tanah Kalurahan Umbulharjo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <!-- Add Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite(['resources/css/RestoreData.css'])
</head>

<body class="bg-[#F6F9EE]">

    @if(session('success'))
    <div class="bg-green-100 text-green-800 border-l-4 border-green-500 p-4 mb-4 rounded-lg">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 border-l-4 border-red-500 p-4 mb-4 rounded-lg">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Navbar -->
    @include('components.navbar')

    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-4 gap-5">
                <button class="bg-[#666CFF] text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors" onclick="history.back()">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </button>
                <div class="flex-1">
                    <h2 class="text-xl font-semibold">Pulihkan Data Tanah</h2>
                </div>
            </div>

            <table class="min-w-full bg-white" id="deletedGroundTable">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b text-left bg-gray-100 text-gray-700 font-semibold">NO</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-100 text-gray-700 font-semibold">NAMA TANAH</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-100 text-gray-700 font-semibold">DIHAPUS OLEH</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-100 text-gray-700 font-semibold">TANGGAL DIHAPUS</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-100 text-gray-700 font-semibold">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- append from ajax --}}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Detail Information Modal -->
    <div id="detailModal" class=" hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">
        <div class="modal-content">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 flex justify-center items-center">Detail Informasi Tanah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Nama:</p>
                    <p id="detailLandName" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Alamat:</p>
                    <p id="detailLandAddress" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Status Kepemilikan:</p>
                    <p id="ownershipStatus" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Tipe Tanah:</p>
                    <p id="detailLandOwnership" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Luas Tanah:</p>
                    <p id="landArea" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700 flex justify-center items-center">Longitude:</p>
                    <p id="longtitude" class="text-gray-600 flex justify-center items-center">-</p>
                </div>
            </div>
            <div class="flex justify-center">
                <button id="closeDetailModal" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Tutup</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Restore Confirmation Modal -->
    <div id="restoreModal" class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md ">
            <div class="flex justify-end">
                <button class="text-gray-500 hover:text-gray-700 transition-colors" onclick="toggleRestoreModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="text-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Pemulihan Data</h2>
                <p class="text-gray-600 mt-2">Apakah Anda yakin ingin memulihkan data ini?</p>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-700">Nama Tanah</h3>
                        <p class="text-gray-600" id="restoreGroundName">-</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Dihapus Pada</h3>
                        <p class="text-gray-600" id="restoreDeletedAt">-</p>
                    </div>
                </div>
                <div class="flex justify-center space-x-4">
                    <button class="px-4 py-2 w-full border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition-colors" onclick="toggleRestoreModal()">
                        Batal
                    </button>
                    <button class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors" onclick="confirmRestore()">
                        Pulihkan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Toast notification functions
        function showSuccessToast(message) {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)", 
                stopOnFocus: true,
                className: "toast-success"
            }).showToast();
        }

        function showErrorToast(message) {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true,
                className: "toast-error"
            }).showToast();
        }

        // Modal functions
        function toggleDetailModal() {
            $('#detailModal').toggleClass('hidden');
            $('#detailModal').toggleClass('flex');
        }

        function showDetailModal(id) {
            const token = localStorage.getItem('token');
            
            // Show loading state in modal
            $('#detailLandName').html('<span class="text-gray-400">Memuat...</span>');
            $('#detailLandAddress').html('<span class="text-gray-400">Memuat...</span>');
            $('#ownershipStatus').html('<span class="text-gray-400">Memuat...</span>');
            $('#detailLandOwnership').html('<span class="text-gray-400">Memuat...</span>');
            $('#landArea').html('<span class="text-gray-400">Memuat...</span>');
            $('#longtitude').html('<span class="text-gray-400">Memuat...</span>');
            
            toggleDetailModal();

            $.ajax({
                url: `{{ config('app.API_URL') }}/api/get/deleted-ground/${id}`,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function(response) {
                    if (response.status === 'success' && response.data) {
                        const data = response.data[0];

                        $('#detailLandName').text(data.nama_tanah || '-');
                        $('#detailLandAddress').text(data.alamat || '-');
                        $('#ownershipStatus').text(data.nama_status_kepemilikan || '-');
                        $('#detailLandOwnership').text(data.nama_tipe_tanah || '-');
                        $('#landArea').text(data.luas_tanah ? `${data.luas_tanah} m²` : '-');
                        $('#longtitude').text(data.longitude || '-');

                        

                    } else {
                        showErrorToast('Gagal memuat detail tanah');
                        toggleDetailModal();
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    showErrorToast('Terjadi kesalahan saat mengambil detail');
                    toggleDetailModal();
                    
                    if (xhr.status === 401) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('userData');
                        window.location.href = '/login';
                    }
                }
            });
        }

        // Modal restore functions
        let restoreId = null;

        function toggleRestoreModal() {
            $('#restoreModal').toggleClass('hidden');
            $('#restoreModal').toggleClass('flex');
        }

        function showRestoreModal(id, name, deletedAt) {
            restoreId = id;
            $('#restoreGroundName').text(name || '-');
            $('#restoreDeletedAt').text(deletedAt || '-');
            toggleRestoreModal();
        }

        function confirmRestore() {
            if (!restoreId) return;
            
            const token = localStorage.getItem('token');
            
            $.ajax({
                url: `{{ config('app.API_URL') }}/api/restore/deleted-ground/${restoreId}`,
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        showSuccessToast('Data berhasil dipulihkan!');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        showErrorToast(response.message || 'Gagal memulihkan data');
                    }
                    toggleRestoreModal();
                },
                error: function(xhr) {
                    console.error('Error during restore:', xhr.responseText);
                    showErrorToast('Terjadi kesalahan saat memulihkan data');
                    toggleRestoreModal();
                }
            });
        }

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            // Initialize DataTable with improved configuration
            const table = $('#deletedGroundTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada data yang dihapus",
                    "info": "<span class='text-gray-500' font-inter> Menampilkan _START_ sampai _END_ dari _TOTAL_ entri </span>",
                    "infoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ total entri)",
                    "lengthMenu": "Tampilkan: _MENU_",
                    "search": "",
                    "searchPlaceholder": "Cari tanah...",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                },
                "dom": '<"flex flex-wrap justify-between items-center mb-4"<"flex items-center gap-4"l<"dataTables_length">><"flex items-center gap-4"f>>rt<"flex flex-wrap justify-between items-center mt-4"<"dataTables_info"i><"dataTables_paginate"p>>',
                "responsive": true
            });

            // Close detail modal handler
            $('#closeDetailModal').on('click', toggleDetailModal);

            // Ganti handler yang lama dengan ini:
            $(document).on('click', '.restore-btn', function() {
                const id = $(this).data('id');
                const row = table.row($(this).closest('tr')).data();
                const deletedAt = row[3]; // Sesuaikan dengan index kolom tanggal di DataTable
                showRestoreModal(id, row[1], deletedAt); // row[1] adalah nama tanah
            });

            // Detail button click handler
            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                showDetailModal(id);
            });

            if (token) {
                $.ajax({
                    url: '{{ config('app.API_URL') }}/api/get/deleted-ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('API Response:', response);

                        if (response.status === 'success' && response.data) {
                            table.clear();
                            
                            response.data.forEach((item, index) => {
                                table.row.add([
                                    index + 1,
                                    item.nama_tanah,
                                    item.deleted_by_name ? item.deleted_by_name : 'System',
                                    item.deleted_at ? new Date(item.deleted_at).toLocaleString('id-ID') : '-',
                                    `
                                    <div class="flex items-center justify-start gap-3">
                                        <button type="button" class="text-blue-500 hover:text-blue-700 transition-colors restore-btn"
                                            data-id="${item.detail_tanah_id}">
                                            <img src="/images/RestoreBtn.png" alt="Information">
                                        </button>
                                        <button type="button" class="text-gray-500 hover:text-green-600 transition-colors detail-btn"
                                            data-id="${item.detail_tanah_id}">
                                            <img src="/images/InfoBtn.png" alt="Information">
                                        </button>
                                    </div>
                                    `
                                ]);
                            });
                            
                            table.draw();
                        } else {
                            showErrorToast('Gagal memuat data tanah yang dihapus');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        showErrorToast('Terjadi kesalahan saat memuat data');
                        
                        if (xhr.status === 401) {
                            localStorage.removeItem('token');
                            localStorage.removeItem('userData');
                            window.location.href = '/login';
                        }
                    }
                });
            } else {
                console.log('Token tidak ditemukan');
                showErrorToast('Silakan login kembali');
                window.location.href = '/login';
            }
        });
    </script>
    
</body>
</html>