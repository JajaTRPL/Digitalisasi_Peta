<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kelurahan Umbulharjo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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

<body class="bg-black relative">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{route('dashboard')}}">
                    <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
                </a>
                <h1 class="text-lg font-semibold">Lihat Peta</h1>
            </div>
            <div class="items-center flex space-x-4">
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('superAdmin'))
                <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-black">Dashboard</a>
                <a href="#" class="text-black-500 hover:text-black">Maps</a>
                @if(auth()->user()->hasRole('superAdmin'))
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                @endif
                <a href="{{route('ManageGround')}}" class="text-blue-500 hover:text-black">Manage Ground</a>
                @else
                <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-black">Dashboard</a>
                <a href="" class="text-black-500 hover:text-black">Maps</a>
                @endif
                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile"
                        class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                    <div
                        class="dropdown-content absolute right-0 z-[999] mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <a href="#"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                                <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z">
                                    </path>
                                </svg>
                                {{$currentUser}}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-2 w-full px-4 py-2 text-sm font-medium text-gray-700 bg-red-50 hover:bg-red-200 hover:text-red-800 rounded-md transition duration-200 ease-in-out">
                                    <svg class="w-4 h-4 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8.707 15.707a1 1 0 01-1.414 0L2.586 11l4.707-4.707a1 1 0 011.414 1.414L5.414 11l3.293 3.293a1 1 0 010 1.414zm9.414-1.414a1 1 0 01-1.414 0L11 8.414V7h2a3 3 0 000-6H7a3 3 0 000 6h2v1.414l-5.707 5.707a1 1 0 01-1.414-1.414L7 7.586V7a1 1 0 011-1h4a1 1 0 011 1v5.586l5.293 5.293a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
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
                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>
                </select>
            </div>

            <div class="overflow-y-auto flex-1">
                <ul id="ground-list">
                    @foreach ($dataGround as $ground)
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">{{ $ground->nama_asset }}</li>
                    @endforeach
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
        // Dropdown functionality
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

        // Fungsi Ascending Descending
        document.getElementById('sort').addEventListener('change', function() {
            const list = document.getElementById('ground-list');
            const items = Array.from(list.children); // Ambil semua item dalam list
            
            // Tentukan urutan pengurutan berdasarkan pilihan
            const sortOrder = this.value;

            // Mengurutkan berdasarkan nama_asset
            if(sortOrder === 'asc') {
                items.sort((a, b) => {
                    return a.textContent.localeCompare(b.textContent); // Urutkan ascending
                });
            } else {
                items.sort((a, b) => {
                    return b.textContent.localeCompare(a.textContent); // Urutkan descending
                });
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
            // Update map container width

        });


        // Initialize the Leaflet map
        const map = L.map('map', {zoomControl: false }).setView([-7.614555267905213, 110.43468152673236], 15); // Umbulharjo coordinates with zoom level 15

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

        // Mengganti layer topoLayer dengan Esri Satellite
        const esriSatelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: 'Esri, © OpenStreetMap contributors'
        });


        // Mengganti layer topoLayer dengan CartoDB Positron
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



        // Mengambil data JSON dari PHP dan parsing sebagai objek JavaScript
        var polygon = @json($polygonGeoJson);
        var markerpolygon = @json($markerGeoJson)



        // Parsing data GeoJSON dan tambahkan layer ke peta
        var polygonlayer = L.geoJSON(JSON.parse(polygon)).addTo(map);


        var detailsData = {!! $detailsJson !!}


        var markerlayer = L.geoJSON(JSON.parse(markerpolygon), {
            pointToLayer: function (feature, latlng) {
                const marker = L.marker(latlng);

                const params = new URLSearchParams(window.location.search);

                const param_lat = params.get("lat");
                const param_long = params.get("long");

                let param_detail = detailsData.find(item => item.hasOwnProperty(`${param_lat}_${param_long}`))
                let detailModal = document.getElementById('detailModal');
                const displayValue = detailModal.style.display;

                if(param_detail && (displayValue != "flex")){
                    // Hide info modal
                    const ground = param_detail[`${param_lat}_${param_long}`]

                    document.getElementById('infoModal').style.display = 'none';

                    // Set modal 2 content (detail modal)
                    document.getElementById('detailLandPhoto').src = "storage/ground_image/"+ground.photoGround;
                    document.getElementById('detailLandName').textContent = ground.nama_asset;
                    document.getElementById('detailLandAddress').textContent = ground.detail_alamat;
                    document.getElementById('detailLandOwnership').textContent = ground.tipe_tanah;

                    // Set additional details for modal 2
                    document.getElementById('landArea').textContent = ground.luas_asset;  // Contoh data, ganti sesuai data yang ada
                    document.getElementById('ownershipStatus').textContent = ground.tipe_tanah; // Contoh data, ganti sesuai data yang ada
                    document.getElementById('longtitude').textContent = ground.longitude;  // Contoh data, ganti sesuai data yang ada
                    document.getElementById('detailLandNumber').textContent = "001";
                    document.getElementById('numberSertif').textContent = "13423424134";

                    // Show detail modal
                    document.getElementById('detailModal').style.display = 'flex';
                }

                marker.addEventListener('click', function(){
                    const result = detailsData.find(item => item.hasOwnProperty(`${latlng.lat}_${latlng.lng}`));
                    if(result){
                        const ground = result[`${latlng.lat}_${latlng.lng}`]
                        document.getElementById('landPhoto').src = "storage/ground_image/"+ground.photoGround;
                        document.getElementById('landName').textContent = ground.nama_asset;
                        document.getElementById('landAddress').textContent = ground.detail_alamat;
                        document.getElementById('landOwnership').textContent = ground.tipe_tanah;

                        document.querySelector('#infoModal button:nth-child(2)').addEventListener('click', () => {
                            // Hide info modal
                            document.getElementById('infoModal').style.display = 'none';

                            // Set modal 2 content (detail modal)
                            document.getElementById('detailLandPhoto').src = document.getElementById('landPhoto').src;
                            document.getElementById('detailLandName').textContent = document.getElementById('landName').textContent;
                            document.getElementById('detailLandAddress').textContent = document.getElementById('landAddress').textContent;
                            document.getElementById('detailLandOwnership').textContent = document.getElementById('landOwnership').textContent;

                            // Set additional details for modal 2
                            document.getElementById('landArea').textContent = ground.luas_asset;  // Contoh data, ganti sesuai data yang ada
                            document.getElementById('ownershipStatus').textContent = ground.tipe_tanah; // Contoh data, ganti sesuai data yang ada
                            document.getElementById('longtitude').textContent = ground.longitude;  // Contoh data, ganti sesuai data yang ada
                            document.getElementById('detailLandNumber').textContent = ground.id;
                            document.getElementById('numberSertif').textContent = ground.certificate.substr(0, ground.certificate.length-4);

                            // Show detail modal
                            document.getElementById('detailModal').style.display = 'flex';
                        });

                        // Display modal
                        document.getElementById('infoModal').style.display = 'flex';
                    } else {
                        console.log('data salah')
                    }
                })
                return marker
            }
        }).addTo(map);

        // Close modal
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('infoModal').style.display = 'none';
        });

        // Show detail modal and hide info modal
        

        // Close detail modal
        document.getElementById('closeDetailModal').addEventListener('click', () => {
            document.getElementById('detailModal').style.display = 'none';
        });

    </script>
</body>

</html>
