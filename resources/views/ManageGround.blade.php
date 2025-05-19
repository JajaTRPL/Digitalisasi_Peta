<html>

<head>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <!-- Add Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite(['resources/css/ManageGround.css'])
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
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.location.href='/AddGround'">
                    <p>+ Add Ground</p>
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2" onclick="window.location.href='/restore-data'">
                    <p>Pulihkan Data</p>
                    <img src="/images/DB.png" alt="Icon" class="w-5 h-5">
                </button>
            </div>

            <table class="min-w-full bg-white table-auto" id="groundTable">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            ID
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            NAMA ASSET
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            DIBUAT OLEH
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            DIPERBARUI PADA
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- append from ajax --}}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-12  w-full max-w-md">
            <!-- Tombol Tutup Modal -->
            <div class="flex justify-end">
                <button class="text-red-500" onclick="toggleModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Judul Modal -->
            <div class="text-center mb-4">
                <h2 class="text-lg font-semibold">Apakah yakin akan menghapus tanah?</h2>
            </div>
            <!-- Informasi Tanah -->
            <div class="bg-amber-50 p-6 rounded-lg">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-semibold">Nama Tanah</h3>
                        <p class="text-gray-500" id="modalGroundName">Tanah 1</p>
                    </div>
                </div>
                <!-- Tombol Aksi -->
                <div class="flex justify-center mt-4 space-x-4">
                    <!-- Tombol Batal -->
                    <button class="px-4 py-2 w-full border border-gray-300 rounded-lg text-gray-500 h-10" onclick="toggleModal()">Batal</button>
                    <!-- Tombol Hapus -->
                    <form id="modalDeleteForm" class="w-full">
                        <button type="submit" class="px-4 py-2 w-full bg-red-500 text-white rounded-lg">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="detailModal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <!-- Modal Body with Information -->
            <h2 class="text-2xl font-semibold mb-4">Detail Informasi Tanah</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-semibold">Nama:</p>
                    <p id="detailLandName">-</p>
                </div>
                <div>
                    <p class="font-semibold">Alamat:</p>
                    <p id="detailLandAddress">-</p>
                </div>
                <div>
                    <p class="font-semibold">Status Kepemilikan:</p>
                    <p id="ownershipStatus">-</p>
                </div>
                <div>
                    <p class="font-semibold">Tipe Tanah:</p>
                    <p id="detailLandOwnership">-</p>
                </div>
                <div>
                    <p class="font-semibold">Luas Tanah:</p>
                    <p id="landArea">-</p>
                </div>
                <div>
                    <p class="font-semibold">Longtitude:</p>
                    <p id="longtitude">-</p>
                </div>
            </div>

            <!-- Modal Footer with Close Button -->
            <div class="flex justify-center mt-5">
                <button id="closeDetailModal" class="px-4 py-2 bg-red-500 text-white rounded-md">Tutup</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <!-- Add Toastify JS -->
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
                backgroundColor: "#4CAF50",
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
                backgroundColor: "#F44336",
                stopOnFocus: true,
                className: "toast-error"
            }).showToast();
        }

        // Global variables for modals
        let selectedGroundId = null;
        const deleteModal = document.getElementById('deleteModal');
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
    </script>

    <script>
        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            $('#groundTable').DataTable(); // Initialize DataTable

            if (token) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/ground',
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
                                    item.added_by_name ?? '-',
                                    item.updated_at ?? '-',
                                    `
                                    <div class="flex items-center justify-start">
                                        <button type="button" class="text-gray-500 mx-1 delete-btn"
                                            data-id="${item.detail_tanah_id}" 
                                            data-name="${item.nama_tanah}">
                                            <img src="/images/DeleteBtn.png" alt="Delete">
                                        </button>
                                        <a class="text-gray-500 mx-1" href="/EditGround/${item.detail_tanah_id}">
                                            <img src="/images/UpdateBtn.png" alt="Update">
                                        </a>
                                        <button type="button" class="text-gray-500 mx-1 detail-btn"
                                            data-id="${item.detail_tanah_id}">
                                            <img src="/images/InfoBtn.png" alt="Information">
                                        </button>
                                    </div>
                                    `
                                ]).draw(false);
                            });
                        }
                    }
                });

                // Close detail modal
                $('#closeDetailModal').on('click', function () {
                    $('#detailModal').addClass('hidden').removeClass('flex');
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

                    $.ajax({
                        url: `http://127.0.0.1:8000/api/delete/ground/${selectedGroundId}`,
                        type: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function (response) {
                            showSuccessToast('Data berhasil dihapus!');
                            toggleModal();
                            location.reload();
                        },
                        error: function (xhr) {
                            console.error('Gagal menghapus data:', xhr.responseText);
                            showErrorToast('Gagal menghapus data.');
                        }
                    });
                });
            } else {
                console.log('Token tidak ditemukan di localStorage');
                showErrorToast('Silakan login kembali');
                window.location.href = '/login';
            }
        });

        function showDetailModal(id) {
            const token = localStorage.getItem('token');

            $.ajax({
                url: `http://127.0.0.1:8000/api/get/ground/${id}`,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                },
                success: function (response) {
                    if (response.status === 'success') {
                        const data = response.data;

                        $('#detailLandName').text(data.nama_tanah ?? '-');
                        $('#detailLandAddress').text(data.alamat ?? '-');
                        $('#ownershipStatus').text(data.nama_status_kepemilikan ?? '-');
                        $('#detailLandOwnership').text(data.nama_tipe_tanah ?? '-');
                        $('#landArea').text(data.luas_tanah ?? '-');
                        $('#longtitude').text(data.longitude ?? '-');

                        $('#detailModal').removeClass('hidden').addClass('flex');
                    } else {
                        showErrorToast('Gagal memuat detail tanah.');
                    }
                },
                error: function (xhr) {
                    console.error('Error fetching detail:', xhr.responseText);
                    if (xhr.status === 401) {
                        showErrorToast('Session anda telah habis. Silakan login kembali.');
                        localStorage.removeItem('token');
                        localStorage.removeItem('userData');
                        window.location.href = '/login';
                    } else {
                        showErrorToast('Terjadi kesalahan saat mengambil detail.');
                    }
                }
            });
        }
    </script>

    <style>
        /* Toastify custom styles */
        .toast-success {
            background: #4CAF50 !important;
            color: white !important;
            border-radius: 4px !important;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
            font-family: inherit !important;
            padding: 12px 20px !important;
        }

        .toast-error {
            background: #F44336 !important;
            color: white !important;
            border-radius: 4px !important;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
            font-family: inherit !important;
            padding: 12px 20px !important;
        }

        .toastify-close {
            color: white !important;
            opacity: 0.8 !important;
            padding-left: 10px !important;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 90%;
        }
    </style>
</body>
</html>