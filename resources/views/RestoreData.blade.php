<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Pulihkan Data Tanah Kalurahan Umbulharjo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
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
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="history.back()">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </button>
                <div class="flex-1">
                    <h2 class="text-xl font-semibold">Pulihkan Data Tanah</h2>
                </div>
                
            </div>

            <table class="min-w-full bg-white table-auto" id="deletedGroundTable">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            NO
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            NAMA TANAH
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            DIHAPUS OLEH
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            TANGGAL DIHAPUS
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

    <!-- Detail Modal -->
    <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Detail Tanah</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeDetailModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 gap-4">
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
            <div class="flex justify-center mt-6">
                <button class="px-4 py-2 bg-red-500 text-white rounded-md" onclick="closeDetailModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        // Definisikan fungsi di global scope
        function showDetailModal(id) {
            const token = localStorage.getItem('token');

            $.ajax({
                url: `http://127.0.0.1:8000/api/get/deleted-ground/${id}`, // Perubahan endpoint untuk mengambil data yang dihapus
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {
                    console.log('Detail response:', response);
                    if (response.status === 'success') {
                        const data = response.data;

                        $('#detailLandName').text(data.nama_tanah ?? '-');
                        $('#detailLandAddress').text(data.alamat ?? '-');
                        $('#ownershipStatus').text(data.nama_status_kepemilikan ?? '-');
                        $('#detailLandOwnership').text(data.nama_tipe_tanah ?? '-');
                        $('#landArea').text(data.luas_tanah ?? '-');
                        $('#longtitude').text(data.longitude ?? '-');

                        $('#detailModal').removeClass('hidden');
                    } else {
                        alert('Gagal memuat detail tanah.');
                    }
                },
                error: function (xhr) {
                    console.error('Error fetching detail:', xhr.responseText);
                    alert('Terjadi kesalahan saat mengambil detail.');
                }
            });
        }

        function closeDetailModal() {
            $('#detailModal').addClass('hidden');
        }

        function restoreData(id) {
            if (!confirm('Apakah Anda yakin ingin memulihkan data ini?')) return;

            const token = localStorage.getItem('token');
            
            $.ajax({
                url: `http://127.0.0.1:8000/api/restore/ground/${id}`,
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Restore response:', response);
                    if (response.status === 'success') {
                        alert('Data berhasil dipulihkan!');
                        location.reload();
                    } else {
                        alert('Gagal memulihkan data: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error during restore:', xhr.responseText);
                    alert('Terjadi kesalahan saat memulihkan data');
                }
            });
        }

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            // Inisialisasi DataTable
            let table = $('#deletedGroundTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada data yang dihapus",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(difilter dari total _MAX_ entri)",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai"
                },
                "responsive": true
            });
            
            // Tambahkan event handler untuk tombol restore dan detail menggunakan delegasi event
            $('#deletedGroundTable').on('click', '.restore-btn', function() {
                const id = $(this).data('id');
                restoreData(id);
            });
            
            $('#deletedGroundTable').on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                showDetailModal(id);
            });

            if (token) {
                // Tambahkan log untuk debugging
                console.log('Token retrieved:', token ? 'Yes' : 'No');
                
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/deleted-ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('Full API response:', response);

                        if (response.status === 'success') {
                            // Clear table first
                            table.clear();

                            response.data.forEach((item, index) => {
                                const restoreButton = `<button type="button" class="text-blue-500 mx-1 restore-btn" data-id="${item.detail_tanah_id}"><i class="fas fa-undo"></i></button>`;
                                const detailButton = `<button type="button" class="text-gray-500 mx-1 detail-btn" data-id="${item.detail_tanah_id}"><i class="fas fa-info-circle"></i></button>`;
                                
                                table.row.add([
                                    index + 1,
                                    item.nama_tanah,
                                    item.deleted_by_user ? item.deleted_by_user.name : 'System',
                                    item.deleted_at ? new Date(item.deleted_at).toLocaleString('id-ID') : '-',
                                    `<div class="flex items-center justify-start">${restoreButton}${detailButton}</div>`
                                ]).draw(false);
                            });
                        } else {
                            console.error('Error in API response:', response.message);
                            alert('Gagal memuat data yang dihapus: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error('AJAX error:', xhr.responseText);
                        alert('Terjadi kesalahan saat mengambil data');
                    }
                });
            } else {
                console.error('Token not found');
                alert('Tidak dapat mengakses data. Silakan login kembali.');
                // Redirect to login page
                window.location.href = '/login';
            }
        });
    </script>
</body>

</html>