<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <!-- Add Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite(['resources/css/ManageGround.css'])
</head>

<body class="bg-[#F6F9EE] ]">

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

    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
                <div class="flex items-center gap-3">
                    <button class="bg-[#666CFF] text-white px-4 py-2 rounded-md hover:bg-[#5a60e5] transition-colors flex items-center gap-2" onclick="window.location.href='/AddGround'">
                        <i class="fas fa-plus"></i>
                        <span>Add Ground</span>
                    </button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-colors flex items-center gap-2" onclick="window.location.href='/restore-data'">
                        <img src="/images/DB.png" alt="Icon" class="w-4 h-4">
                        <span>Pulihkan Data</span>
                    </button>
                </div>
            </div>

            <table id="groundTable" class="w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA ASSET</th>
                        <th>DIBUAT OLEH</th>
                        <th>DIPERBARUI PADA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-end">
                <button class="text-gray-500 hover:text-gray-700 transition-colors" onclick="toggleModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="text-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Apakah yakin akan menghapus tanah?</h2>
            </div>
            <div class="bg-amber-50 p-4 rounded-lg">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-semibold text-gray-700">Nama Tanah</h3>
                        <p class="text-gray-500" id="modalGroundName">-</p>
                    </div>
                </div>
                <div class="flex justify-center mt-4 space-x-4">
                    <button class="px-4 py-2 w-full border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition-colors" onclick="toggleModal()">
                        Batal
                    </button>
                    <button class="px-4 py-2 w-full bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors" onclick="document.getElementById('modalDeleteForm').submit()">
                        Hapus
                    </button>
                    <form id="modalDeleteForm" class="hidden"></form>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Information Modal -->
    <div id="detailModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">
        <div class="modal-content">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detail Informasi Tanah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Nama:</p>
                    <p id="detailLandName" class="text-gray-600">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Alamat:</p>
                    <p id="detailLandAddress" class="text-gray-600">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Status Kepemilikan:</p>
                    <p id="ownershipStatus" class="text-gray-600">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Tipe Tanah:</p>
                    <p id="detailLandOwnership" class="text-gray-600">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Luas Tanah:</p>
                    <p id="landArea" class="text-gray-600">-</p>
                </div>
                <div class="detail-field">
                    <p class="font-semibold text-gray-700">Longitude:</p>
                    <p id="longtitude" class="text-gray-600">-</p>
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
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
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
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                stopOnFocus: true,
                className: "toast-error"
            }).showToast();
        }

        // Global variables
        let selectedGroundId = null;
        const deleteModal = document.getElementById('deleteModal');
        const detailModal = document.getElementById('detailModal');
        const modalDeleteForm = document.getElementById('modalDeleteForm');
        const modalGroundName = document.getElementById('modalGroundName');

        // Modal functions
        function toggleModal() {
            deleteModal.classList.toggle('hidden');
        }

        function showDeleteModal(groundId, groundName) {
            selectedGroundId = groundId;
            modalGroundName.textContent = groundName;
            toggleModal();
        }

        function toggleDetailModal() {
            const modal = document.getElementById('detailModal');
            detailModal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        // Format date function
        function formatDate(dateString) {
            if (!dateString) return '-';
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            // Initialize DataTable with enhanced configuration
            const table = $('#groundTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada data tanah",
                    "info": "<span class='text-gray-500' font-inter> Menampilkan _START_ sampai _END_ dari _TOTAL_ entri </span>",
                    "infoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ total entri)",
                    "lengthMenu": "Tampilkan: _MENU_",
                    "search": "",
                    "searchPlaceholder": "Cari tanah...",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                },
                "dom": '<"flex flex-wrap justify-between items-center mb-4"<"flex items-center gap-4"l<"dataTables_length">><"flex items-center gap-4"f>>rt<"flex flex-wrap justify-between items-center mt-4"<"dataTables_info"i><"dataTables_paginate"p>>',
                "responsive": true,
                "initComplete": function() {
                    // Custom styling after initialization
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3;
                    }).remove();
                    
                    // Add custom classes to elements
                    $('.dataTables_length').addClass('flex items-center');
                    $('.dataTables_filter').addClass('flex items-center');
                }
            });

            // Show loading state
            function showLoading() {
                $('#groundTable tbody').html(`
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="inline-flex items-center">
                                <div class="animate-spin rounded-full h-5 w-5 border-t-2 border-b-2 border-[#666CFF] mr-2"></div>
                                <span class="text-gray-600">Memuat data...</span>
                            </div>
                        </td>
                    </tr>
                `);
            }

            if (token) {
                showLoading();
                
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('API Response:', response);

                        if (response.status === 'success' && response.data) {
                            table.clear();
                            
                            response.data.forEach(item => {
                                table.row.add([
                                    item.detail_tanah_id,
                                    item.nama_tanah,
                                    item.added_by_name || '-',
                                    formatDate(item.updated_at),
                                    `
                                    <div class="flex items-center justify-start gap-1">
                                        <button type="button" class="action-btn delete-btn"
                                            data-id="${item.detail_tanah_id}" 
                                            data-name="${item.nama_tanah}">
                                            <img src="/images/DeleteBtn.png" alt="Delete" >
                                        </button>
                                        <a class="action-btn edit-btn" href="/EditGround/${item.detail_tanah_id}">
                                            <img src="/images/UpdateBtn.png" alt="Update" ">
                                        </a>
                                        <button type="button" class="action-btn detail-btn"
                                            data-id="${item.detail_tanah_id}">
                                            <img src="/images/InfoBtn.png" alt="Information" class="ml-1">
                                        </button>
                                    </div>
                                    `
                                ]);
                            });
                            
                            table.draw();
                        } else {
                            showErrorToast('Gagal memuat data tanah');
                            $('#groundTable tbody').html(`
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-red-500">
                                        <i class="fas fa-exclamation-circle mr-2"></i>Gagal memuat data
                                    </td>
                                </tr>
                            `);
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        showErrorToast('Terjadi kesalahan saat memuat data');
                        $('#groundTable tbody').html(`
                            <tr>
                                <td colspan="5" class="text-center py-4 text-red-500">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>Terjadi kesalahan
                                </td>
                            </tr>
                        `);
                        
                        if (xhr.status === 401) {
                            localStorage.removeItem('token');
                            localStorage.removeItem('userData');
                            window.location.href = '/login';
                        }
                    }
                });

                // Close detail modal
                $('#closeDetailModal').on('click', function() {
                    toggleDetailModal();
                });

                // Delete button click handler
                $(document).on('click', '.delete-btn', function() {
                    const groundId = $(this).data('id');
                    const groundName = $(this).data('name');
                    showDeleteModal(groundId, groundName);
                });

                // Detail button click handler
                $(document).on('click', '.detail-btn', function() {
                    const id = $(this).data('id');
                    showDetailModal(id);
                });

                // Delete form submission
                $('#modalDeleteForm').on('submit', function(e) {
                    e.preventDefault();

                    if (!selectedGroundId) {
                        showErrorToast('ID tanah tidak ditemukan!');
                        return;
                    }

                    if (!token) {
                        showErrorToast('Token tidak ditemukan!');
                        return;
                    }

                    // Show loading state on delete button
                    const deleteBtn = $(this).find('button[type="submit"]');
                    deleteBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Menghapus...');
                    deleteBtn.prop('disabled', true);

                    $.ajax({
                        url: `http://127.0.0.1:8000/api/delete/ground/${selectedGroundId}`,
                        type: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function(response) {
                            showSuccessToast('Data berhasil dihapus!');
                            toggleModal();
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(xhr) {
                            console.error('Gagal menghapus data:', xhr.responseText);
                            showErrorToast('Gagal menghapus data.');
                            deleteBtn.html('Hapus');
                            deleteBtn.prop('disabled', false);
                        }
                    });
                });
            } else {
                console.log('Token tidak ditemukan');
                showErrorToast('Silakan login kembali');
                window.location.href = '/login';
            }
        });

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
                url: `http://127.0.0.1:8000/api/get/ground/${id}`,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function(response) {
                    if (response.status === 'success' && response.data) {
                        const data = response.data;

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
    </script>
</body>
</html>