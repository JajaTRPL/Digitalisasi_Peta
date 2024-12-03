<html>

<head>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <style>
        #map {
            height: 100%;
            width: 125%;
            transform: translateX(-20%);
            transition: width 0.3s ease-in-out;
        }

        /* Sidebar style */
        #sidebar {
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        #sidebar.closed {
            transform: translateX(-80%);
        }

        #ground-list-container.closed {
            display: none;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }

        .modal-content {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body class="bg-green-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{route('dashboard')}}">
                    <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full" >
                </a>
                <h1 class="text-lg font-semibold">Manage Ground</h1>
            </div>
            <div class="items-center flex space-x-4">
                <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-black">Dashboard</a>
                <a href="{{route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                @if(auth()->user()->hasRole('superAdmin'))
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                @endif
                <a href="{{route('ManageGround')}}" class="text-black-500 hover:text-black">Manage Ground</a>
                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile"
                        class="profile-avatar cursor-pointer w-10 h-10 rounded-full">
                    <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                                <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z"></path>
                                </svg>
                                {{$currentUser}}
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="h-5">
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
    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.location.href='/AddGround'">
                    + Add Ground
                </button>
            </div>
            <table class="min-w-full bg-white table-auto" id="datatable">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">
                            ID
                        </th>
                        <th class="py-2 px-4 border-b text-left">
                            NAMA ASSET
                        </th>
                        <th class="py-2 px-4 border-b text-left">
                            DIBUAT OLEH
                        </th>
                        <th class="py-2 px-4 border-b text-left">
                            DIPERBARUI PADA
                        </th>
                        <th class="py-2 px-4 border-b text-left">
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataGround as $ground)
                    <tr class="border-t">
                        <td class="py-2 px-4">
                            {{$ground->ground_detail_id}}
                        </td>
                        <td class="py-2 px-4">
                            {{$ground->nama_asset}}
                        </td>
                        <td class="py-2 px-4">
                            {{$ground->added_by_name}}
                        </td>
                        <td class="py-2 px-4">
                            {{$ground->updated_at}}
                        </td>
                        <td class="py-2 px-4">
                            <a class="text-gray-500 mx-1" href="{{route('EditPeta', $ground->ground_detail_id)}}">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('GroundDestroy', $ground->ground_detail_id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="button"
                                    class="text-gray-500 mx-1"
                                    onclick="showDeleteModal('{{ route('GroundDestroy', $ground->ground_detail_id) }}', '{{ $ground->nama_asset }}', ' {{ $ground->nama_asset }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            <a class="text-gray-500 mx-1">
                                <i class="fas fa-eye cursor-pointer" data-id="{{ $ground->ground_detail_id }}"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
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
                    <div>
                        <h3 class="font-semibold">Alamat</h3>
                        <p class="text-gray-500" id="modalGroundAddress">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer interdum dui vel arcu efficitur</p>
                    </div>
                </div>
                <!-- Tombol Aksi -->
                <div class="flex justify-center mt-4 space-x-4">
                    <!-- Tombol Batal -->
                    <button class="px-4 py-2 w-full border border-gray-300 rounded-lg text-gray-500 h-10" onclick="toggleModal()">Batal</button>
                    <!-- Tombol Hapus -->
                    <form id="modalDeleteForm" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 w-full bg-red-500 text-white rounded-lg">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="detailModal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <!-- Modal Header with Image -->
            <div class="relative mb-4">
                <img id="detailLandPhoto" src="" alt="Foto Tanah" class="w-full h-64 object-cover rounded-md">
            </div>

            <!-- Modal Body with Information -->
            <h2 class="text-2xl font-semibold mb-4">Detail Informasi Tanah</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-semibold">Nama:</p>
                    <p id="detailLandName">-</p>
                </div>
                <div>
                    <p class="font-semibold">Nomor Asset:</p>
                    <p id="detailLandNumber">-</p>
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
                <div>
                    <p class="font-semibold">Nomor Sertifikat:</p>
                    <p id="numberSertif">-</p>
                </div>

            </div>

            <!-- Modal Footer with Close Button -->
            <div class="flex justify-center mt-5">
                <button id="closeDetailModal" class="px-4 py-2 bg-red-500 text-white rounded-md">Tutup</button>
            </div>
        </div>
    </div>


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
        function showDeleteModal(route, groundName, groundAddress) {
            modalDeleteForm.action = route; // Set form action
            modalGroundName.textContent = groundName; // Isi nama tanah
            modalGroundAddress.textContent = groundAddress; // Isi alamat tanah
            toggleModal(); // Tampilkan modal
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();

            const groundJson = {!! $groundJson !!}

            $(document).on('click', '.fas.fa-eye', function () {
            // Ambil nilai atribut data-id
            const dataId = $(this).data('id');
            // Tampilkan di console
            const groundDetail = groundJson.find(item => item.ground_detail_id == dataId)
            console.log(groundDetail);
            if(groundDetail){
                    document.getElementById('detailLandPhoto').src = groundDetail.photo;
                    document.getElementById('detailLandName').textContent = groundDetail.nama_asset;
                    // document.getElementById('detailLandAddress').textContent = groundDetail.alamat;
                    document.getElementById('detailLandOwnership').textContent = groundDetail.nama_tipe_tanah;

                    document.getElementById('landArea').textContent = groundDetail.luas_asset;  // Contoh data, ganti sesuai data yang ada
                    document.getElementById('ownershipStatus').textContent = groundDetail.nama_status_kepemilikan; // Contoh data, ganti sesuai data yang ada
                    document.getElementById('longtitude').textContent = groundDetail.longitude;  // Contoh data, ganti sesuai data yang ada
                    document.getElementById('detailLandNumber').textContent = groundDetail.id;
                    document.getElementById('numberSertif').textContent = groundDetail.certificate.substr(0, groundDetail.certificate.length - 4);

                    // Show detail modal
                    document.getElementById('detailModal').style.display = 'flex';

            } else {
                console.log('data salah')
            }

            document.getElementById('closeDetailModal').addEventListener('click', () => {
                document.getElementById('detailModal').style.display = 'none';
            });
        });
        });
    </script>
</body>

</html>
