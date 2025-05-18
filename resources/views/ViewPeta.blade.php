<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kelurahan Umbulharjo</title>
    @vite(['resources/css/ViewPeta.css'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-black relative">
    <!-- Navigation Bar -->
    @include('components.navbar')

    <!-- Main Content -->
    <div class="flex relative">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-[#F5F5F5] shadow-md h-screen flex flex-col w-1/5">
            <div class="flex items-center justify-between p-4 border-b">
                <span class="text-lg font-semibold">
                    Ground Kelurahan
                </span>
                <!-- Tombol untuk menutup sidebar menggunakan gambar -->
                <button id="toggleSidebar">
                    <img src="{{ asset('images/Sidebar.png') }}" alt="Toggle Sidebar" class="w-6 h-6">
                </button>
            </div>
            <div class="p-4" id="select-container">
                <label class="block text-sm font-medium text-gray-700" for="sort">
                    Urutkan Berdasarkan:
                </label>
                <select
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                    id="sort" name="sort">
                    <option value="asc">Asc (A-Z)</option>
                    <option value="desc">Desc (Z-A)</option>
                </select>
            </div>

            <div class="overflow-y-auto flex-1">
                <ul id="groundList">
                    {{-- Memasukkan data lewat js --}}
                </ul>
            </div>
        </div>

        <!-- Map Section -->
        <div class="w-screen">
            <div id="map"></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="infoModal" class="modal">
        <div class="modal-content shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Informasi Tanah</h2>
            <img id="landPhoto" src="" alt="Foto Tanah" class="w-full h-48 object-cover mb-2 rounded-md">
            <p><strong>Nama:</strong> <span id="landName"></span></p>
            <p><strong>Alamat:</strong> <span id="landAddress"></span></p>
            <p><strong>Tipe Tanah:</strong> <span id="landOwnership"></span></p>
            <div class="w-full flex justify-between mt-5">
                <button id="closeModal" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md">Tutup</button>
                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Show Detail</button>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
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

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Optional: Include Font Awesome for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- Script to handle interactivity -->
    <script>
        // Fungsi Ascending Descending yang sudah diperbaiki
        document.getElementById('sort').addEventListener('change', function() {
            const list = document.getElementById('groundList');
            const items = Array.from(list.getElementsByTagName('li')); // Ambil semua elemen li dalam list

            // Tentukan urutan pengurutan berdasarkan pilihan
            const sortOrder = this.value;

            // Mengurutkan berdasarkan nama_tanah
            items.sort((a, b) => {
                const textA = a.textContent.trim().toLowerCase();
                const textB = b.textContent.trim().toLowerCase();
                
                if (sortOrder === 'asc') {
                    return textA.localeCompare(textB); // Urutkan ascending
                } else {
                    return textB.localeCompare(textA); // Urutkan descending
                }
            });

            // Menghapus semua item dari list
            while (list.firstChild) {
                list.removeChild(list.firstChild);
            }

            // Menambahkan kembali item yang sudah diurutkan ke dalam list
            items.forEach(item => {
                list.appendChild(item);
            });
        });

        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const glist = document.getElementById('select-container');
            sidebar.classList.toggle('closed');
            glist.classList.toggle('hidden');
        });

        // Initialize the Leaflet map
        const map = L.map('map', {zoomControl: false }).setView([-7.614555267905213, 110.43468152673236], 15);

        // Menambahkan kembali kontrol zoom di bawah kontrol layer
        L.control.zoom({ position: 'topright' }).addTo(map);

        // Define different tile layers
        const osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        });

        const satelliteLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenTopoMap'
        });

        const esriSatelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: 'Esri, © OpenStreetMap contributors'
        });

        const cartoDBPositronLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© CartoDB, © OpenStreetMap contributors'
        });

        // Add the default OSM layer to the map
        osmLayer.addTo(map);

        // Create a layer control and add it to the map
        const baseLayers = {
            "OpenStreetMap": osmLayer,
            "Esri Satellite": esriSatelliteLayer,
            "CartoDB Positron": cartoDBPositronLayer,
            "OpenTopoMap": satelliteLayer
        };

        L.control.layers(baseLayers).addTo(map);

        // Close modal
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('infoModal').style.display = 'none';
        });

        // Close detail modal
        document.getElementById('closeDetailModal').addEventListener('click', () => {
            document.getElementById('detailModal').style.display = 'none';
        });

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            if (token) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('Full API response:', response);
                        const groundList = document.getElementById('groundList');

                        if (!Array.isArray(response.data)) {
                            console.warn('Data kosong atau bukan array');
                            return;
                        }

                        response.data.forEach(tanah => {
                            // side bar daftar tanah
                            const li = document.createElement('li');
                            li.className = 'p-4 border-b cursor-pointer hover:bg-gray-100';
                            li.textContent = tanah.nama_tanah;

                            li.addEventListener('click', function () {
                                showInfoModal(tanah);
                            });

                            groundList.appendChild(li);

                            // Tambahkan marker
                            if (tanah.latitude && tanah.longitude) {
                                const marker = L.marker([tanah.latitude, tanah.longitude]).addTo(map);

                                marker.on('click', function () {
                                    showInfoModal(tanah);
                                });
                            }

                            // tambah polygon
                            if (tanah.coordinates) {
                                let parsedData;
                                try {
                                    parsedData = JSON.parse(tanah.coordinates);
                                } catch (e) {
                                    console.error('Gagal parse JSON dari coordinates:', tanah.coordinates, e);
                                    return;
                                }

                                if (parsedData.geometry && parsedData.geometry.coordinates) {
                                    const geoType = parsedData.geometry.type;
                                    const coords = parsedData.geometry.coordinates;

                                    if (geoType === 'Polygon' && Array.isArray(coords)) {
                                        // Ambil ring pertama (biasanya index 0)
                                        const firstRing = coords[0];

                                        if (Array.isArray(firstRing) && firstRing.length > 0) {
                                            // Convert jadi [lat, lng]
                                            const formattedCoords = firstRing.map(coord => [coord[1], coord[0]]);

                                            const polygon = L.polygon(formattedCoords, {
                                                color: 'blue',
                                                fillColor: '#1e90ff',
                                                fillOpacity: 0.5
                                            }).addTo(map);

                                            polygon.on('click', function () {
                                                showInfoModal(tanah);
                                            });
                                        } else {
                                            console.warn('First ring polygon kosong:', firstRing);
                                        }
                                    } else {
                                        console.warn('Geometry bukan Polygon atau invalid:', geoType, coords);
                                    }
                                } else {
                                    console.warn('Tidak ada geometry.coordinates di parsedData:', parsedData);
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching ground data:', error);
                    }
                });
            } else {
                console.log('Token tidak ditemukan di localStorage');
            }
        });

        function showInfoModal(ground) {
            document.getElementById('landPhoto').src = "storage/ground_image/" + ground.photoGround;
            document.getElementById('landName').textContent = ground.nama_tanah;
            document.getElementById('landAddress').textContent = ground.alamat;
            document.getElementById('landOwnership').textContent = ground.nama_tipe_tanah;

            document.querySelector('#infoModal button:nth-child(2)').onclick = () => showDetailModal(ground);

            document.getElementById('infoModal').style.display = 'flex';
        }

        function showDetailModal(ground) {
            document.getElementById('infoModal').style.display = 'none';
            document.getElementById('detailModal').style.display = 'flex';

            document.getElementById('detailLandPhoto').src = "storage/ground_image/" + ground.foto_tanah;
            document.getElementById('detailLandName').textContent = ground.nama_tanah;
            document.getElementById('detailLandAddress').textContent = ground.alamat;
            document.getElementById('detailLandOwnership').textContent = ground.nama_tipe_tanah;
            document.getElementById('landArea').textContent = ground.luas_tanah;
            document.getElementById('ownershipStatus').textContent = ground.nama_status_kepemilikan;
            document.getElementById('longtitude').textContent = ground.longitude;
            document.getElementById('detailLandNumber').textContent = ground.id;
            document.getElementById('numberSertif').textContent = ground.sertifikat_tanah ? ground.sertifikat_tanah.substr(0, ground.sertifikat_tanah.length - 4) : '';
        }
    </script>
</body>
</html>