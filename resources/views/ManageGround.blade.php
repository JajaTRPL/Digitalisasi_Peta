<html>

<head>
    <script src="https://cdn.tailwindcss.com">
    </script>
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
                    {{-- <div>
                        <h3 class="font-semibold">Alamat</h3>
                        <p class="text-gray-500" id="modalGroundAddress">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum dui vel arcu efficitur</p>
                    </div> --}}
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
            <!-- Modal Header with Image -->
            {{-- <div class="relative mb-4">
                <img id="detailLandPhoto" src="" alt="Foto Tanah" class="w-full h-64 object-cover rounded-md">
            </div> --}}

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

    <script>
        const avatar = document.querySelector('.profile-avatar');
        const dropdown = document.querySelector('.dropdown-content');

        avatar.addEventListener('click', function() {
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        const deleteModal = document.getElementById('deleteModal');
        const modalDeleteForm = document.getElementById('modalDeleteForm');
        const modalGroundName = document.getElementById('modalGroundName');
        const modalGroundAddress = document.getElementById('modalGroundAddress');

        // Fungsi untuk membuka/menutup modal
        function toggleModal() {
            deleteModal.classList.toggle('hidden');
        }

        // Fungsi untuk mengisi data dinamis ke modal dan menampilkan modal
        function showDeleteModal(groundId, groundName, groundAddress) {
            selectedGroundId = groundId;
            modalGroundName.textContent = groundName;
            // modalGroundAddress.textContent = groundAddress;
            toggleModal();
        }
    </script>

    <script>
        $(document).ready(function () {
        const token = localStorage.getItem('token');
        const user = JSON.parse(localStorage.getItem('userData'));


        $('#groundTable').DataTable(); // inisialisasi dulu baru append data

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
                                item.added_by ?? '-',
                                item.updated_at ?? '-',
                                `
                                <div class="flex items-center justify-start ">
                                    <button type="button" class="text-gray-500 mx-1"
                                        onclick="showDeleteModal('${item.detail_tanah_id}', '${item.nama_tanah}', '${item.detail_alamat}')">
                                        <img src="/images/DeleteBtn.png" alt="Delete" >
                                    </button>
                                    <a class="text-gray-500 mx-1" href="/EditPeta/${item.detail_tanah_id}">
                                        <img src="/images/UpdateBtn.png" alt="Update" >
                                    </a>
                                    <a class="text-gray-500 mx-1"
                                        onclick="showDetailModal('${item.detail_tanah_id}')">
                                        <img src="/images/InfoBtn.png" alt="Information" >
                                    </a>
                                </div>
                                `
                            ]).draw(false);
                        });
                    }
                }
            });


        // Tutup modal detail
        $('#closeDetailModal').on('click', function () {
            $('#detailModal').addClass('hidden').removeClass('flex');
        });


            $('#modalDeleteForm').on('submit', function(e) {
                e.preventDefault();

                const token = localStorage.getItem('token');

                if (!selectedGroundId) {
                    alert('ID tanah tidak ditemukan!');
                    return;
                }

                if (!token) {
                    alert('Token tidak ditemukan!');
                    return;
                }

                console.log(selectedGroundId);

                $.ajax({
                    url: `http://127.0.0.1:8000/api/delete/ground/${selectedGroundId}`,
                    type: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        alert('Data berhasil dihapus!');
                        toggleModal(); // Tutup modal
                        location.reload(); // Refresh data
                    },
                    error: function (xhr) {
                        console.error('Gagal menghapus data:', xhr.responseText);
                        alert('Gagal menghapus data.');
                    }
                });
            });
        } else {
            console.log('Token tidak ditemukan di localStorage');
        }
    });

    function showDetailModal(id) {

        const token = localStorage.getItem('token');

        $.ajax({
            url: `http://127.0.0.1:8000/api/get/ground/${id}`,
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function (response) {
                if (response.status === 'success') {
                    const data = response.data;

                    // Isi data ke elemen modal
                    $('#detailLandName').text(data.nama_tanah ?? '-');
                    $('#detailLandAddress').text(data.alamat ?? '-');
                    $('#ownershipStatus').text(data.nama_status_kepemilikan ?? '-');
                    $('#detailLandOwnership').text(data.nama_tipe_tanah ?? '-');
                    $('#landArea').text(data.luas_tanah ?? '-');
                    $('#longtitude').text(data.longitude ?? '-');

                    // Tampilkan modal
                    $('#detailModal').removeClass('hidden').addClass('flex');
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
    </script>
</body>

</html>
