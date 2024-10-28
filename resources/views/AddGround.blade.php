<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kelurahan Umbulharjo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <style>
        #map {
            height: 80vh;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 font-roboto">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
                <h1 class="text-lg font-semibold">Tambah Peta</h1>
            </div>
            <div class="items-center flex space-x-4">
                <a href="{{ route('dashboard')}}" class="text-blue-500 hover:text-black">Dashboard</a>
                <a href="{{ route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                <a href="{{route('ManageGround')}}" class="text-blue-500 hover:text-black">Manage Ground</a>
                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">
                    <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6 bg-white mt-6 shadow-md rounded-md">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700">Nama Aset</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Nama Asset" type="text" id="nama_asset"/>
            </div>
            <div>
                <label class="block text-gray-700">Status Kepemilikan</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Status Kepemilikan" type="text" id="status_kepemilikan"/>
            </div>
            <div>
                <label class="block text-gray-700">Status Tanah</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Status Tanah" type="text" id="status_tanah"/>
            </div>
            <div>
                <label class="block text-gray-700">Alamat</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Alamat" type="text" id="alamat"/>
            </div>
            <div>
                <label class="block text-gray-700">Tipe Tanah</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Tipe Tanah" type="text" id="tipe_tanah"/>
            </div>
            <div>
                <label class="block text-gray-700">Luas Aset Tanah</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Luas Asset Tanah" type="text" id="luas_asset"/>
            </div>
            <div>
                <label class="block text-gray-700">Longtitude</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Longtitude" type="text" id="longitude"/>
            </div>
            <div>
                <label class="block text-gray-700">Latitude</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Latitude" type="text" id="latitude"/>
            </div>
            {{-- <div class="col-span-2">
                <label class="block text-gray-700">Foto</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="file"/>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700">Sertifikat</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="file"/>
            </div> --}}
        </div>

        <!-- Peta Leaflet -->
        <div id="map" class="w-full h-96 border border-gray-300 rounded-md mt-6"></div>

        <div>
            <label>The layer To Be Stored:</label>
            <input id="polygon" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" name="polygon" value="{{request('polygon')}}">
        </div>

        <div class="flex justify-end space-x-4 mt-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md" id="simpan" name="simpan">Add</button>
            <button class="bg-gray-300 text-black px-4 py-2 rounded-md" onclick="history.back()">Cancel</button>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@7/turf.min.js"></script>

    <script>

        //user drop down
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

        // map
        var map = L.map('map').setView([-7.614555267905213, 110.43468152673236], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        var markerGroup = new L.FeatureGroup();
        map.addLayer(markerGroup);
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            edit: {
            featureGroup: drawnItems
            },
            draw: {
            polygon: true,
            marker: true,
            polyline: true,
            rectangle: true,
            circle: true,
            }
        });
        map.addControl(drawControl);


        map.on(L.Draw.Event.CREATED, function (event) {

            if (drawnItems.getLayers().length > 0) {
                const layers = drawnItems.getLayers();
                drawnItems.clearLayers();    // Hapus polygon lama
                markerGroup.clearLayers();   // Hapus marker lama
            }

            var type = event.layerType;
            var layer = event.layer;
            drawnItems.addLayer(layer);
            const geoJsonData = layer.toGeoJSON(); // Definisi geoJsonData ada di sini
            console.log(JSON.stringify(geoJsonData));
            $(document).ready(function() {
                $('#polygon').val(JSON.stringify(layer.toGeoJSON()));

                const centroid = turf.centroid(geoJsonData);
                const center = [centroid.geometry.coordinates[1], centroid.geometry.coordinates[0]];

                const centerMarker = L.marker(center);
                drawnItems.addLayer(centerMarker);
                document.getElementById('latitude').value = center[0];
                document.getElementById('longitude').value = center[1];
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('simpan').addEventListener('click', function(e) {
                e.preventDefault();

                // koordinat polygon
                const coordinates = document.getElementById('polygon').value;

                // longitude dan latitude marker
                const latitude = document.getElementById('latitude').value;
                const longitude = document.getElementById('longitude').value;

                // ground information
                const nama_asset = document.getElementById('nama_asset').value;
                const status_kepemilikan = document.getElementById('status_kepemilikan').value;
                const status_tanah = document.getElementById('status_tanah').value;
                const alamat = document.getElementById('alamat').value;
                const tipe_tanah = document.getElementById('tipe_tanah').value;
                const luas_asset = document.getElementById('luas_asset').value;

                // Buat data untuk dikirim
                const formData = {
                    coordinates: coordinates,
                    latitude: latitude,
                    longitude: longitude,
                    nama_asset: nama_asset,
                    status_kepemilikan: status_kepemilikan,
                    status_tanah: status_tanah,
                    alamat: alamat,
                    tipe_tanah: tipe_tanah,
                    luas_asset: luas_asset,
                    _token: '{{ csrf_token() }}'  // CSRF token Laravel
                };


                // Kirim request menggunakan axios
                axios.post('{{ route('save.ground') }}', formData)
                    .then(response => {
                        alert(response.data.message);
                        // Redirect ke halaman setelah sukses
                        window.location.href = '{{ route('ManageGround') }}';
                    })
                    .catch(error => {
                        if (error.response) {
                            alert('Error: ' + error.response.data.message || error.response.statusText);
                        } else {
                            alert('An error occurred');
                        }
                    });
            });
        });

    </script>
</body>
</html>
