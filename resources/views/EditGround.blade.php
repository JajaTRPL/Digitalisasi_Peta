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

    <!-- Navbar -->

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
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                                <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z"></path>
                                </svg>
                                Profile
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
    </nav>

    <div class="max-w-7xl mx-auto p-6 bg-white mt-6 shadow-md rounded-md">
        <form method="post">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700">Nama Aset</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Nama Asset" type="text" id="nama_asset" value="{{$dataGround->nama_asset}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">Detail Alamat</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Detail Alamat" type="text" id="detail_alamat" value="{{$alamatGround->detail_alamat}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">RT</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RT"
                        type="text" id="rt" value="{{$alamatGround->rt}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">RW</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RW"
                        type="text" id="rw" value="{{$alamatGround->rw}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">Padukuhan</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500" id="padukuhan">
                        <option value="{{$alamatGround->padukuhan}}" disabled selected>{{$alamatGround->padukuhan}}</option>
                        <option value="Palemsari">Palemsari</option>
                        <option value="Pangukrejo">Pangukrejo</option>
                        <option value="Gondang">Gondang</option>
                        <option value="Gambretan">Gambretan</option>
                        <option value="Balong">Balong</option>
                        <option value="Plosorejo">Plosorejo</option>
                        <option value="Karanggeneng">Karanggeneng</option>
                        <option value="Plosokerep">Plosokerep</option>
                        <option value="Pentingsari">Pentingsari</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700">Desa</label>
                    <input
                        type="text"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                        value="Umbulharjo"
                        readonly
                        id="desa"
                    />
                </div>
                <div>
                    <label class="block text-gray-700">Kecamatan</label>
                    <input
                        type="text"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                        value="Cangkringan"
                        readonly
                        id="kecamatan"
                    />
                </div>
                <div>
                    <label class="block text-gray-700">Kabupaten</label>
                    <input
                        type="text"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                        value="Sleman"
                        readonly
                        id="kabupaten"
                    />
                </div>
                <div>
                    <label class="block text-gray-700">Status Kepemilikan</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500" id="status_kepemilikan">
                        @foreach ($statusKepemilikan as $option)
                        <option value="{{$option->id}}" {{ $option->id == $dataGround->status_kepemilikan_id ? 'selected' : '' }}>
                            {{$option->nama_status_kepemilikan}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700">Status Tanah</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500" id="status_tanah">
                        @foreach ($statusTanah as $option)
                        <option value="{{$option->id}}" {{$option->id == $dataGround->status_tanah_id ? 'selected' : ''}}>{{$option->nama_status_tanah}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700">Luas Aset Tanah</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Luas Tanah"
                        type="text" id="luas_asset" value="{{$dataGround->luas_asset}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">Tipe Tanah</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500" id="tipe_tanah">
                        @foreach ($tipeTanah as $option)
                        <option value="{{$option->id}}" {{$option->id == $dataGround->tipe_tanah_id ? 'selected' : ''}}>{{$option->nama_tipe_tanah}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="font-[sans-serif] max-w-md mx-auto">
                    <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                    <input type="file"
                    class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                    id="foto_tanah" name="foto_tanah" value="{{asset('storage/ground_image/' . $photoGround->name)}}"/>
                    <p class="text-xs text-gray-400 mt-2">Foto Tanah PNG JPG</p>
                </div>

                <div class="font-[sans-serif] max-w-md mx-auto">
                    <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                    <input type="file"
                    class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                    id="sertifikat" name="sertifikat" value="{{ asset('storage/ground_sertificate/' . $sertifikatGround->name)}}"/>
                    <p class="text-xs text-gray-400 mt-2">Sertifikat PDF</p>
                </div>

                <div>
                    <label class="block text-gray-700">Longtitude</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Longtitude" type="text" id="longitude" value="{{$dataGround->longitude}}"/>
                </div>
                <div>
                    <label class="block text-gray-700">Latitude</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Latitude" type="text" id="latitude" value="{{$dataGround->latitude}}"/>
                </div>
            </div>

            <!-- Peta Leaflet -->
            <div id="map" class="w-full h-96 border border-gray-300 rounded-md mt-6"></div>

            <div>
                <input id="polygon" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" name="polygon" value="{{$dataGround->coordinates}}" style="display: none">
            </div>



            <div class="flex justify-end space-x-4 mt-6">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md" id="perbarui" name="perbarui">Perbarui</button>
                <button class="bg-gray-300 text-black px-4 py-2 rounded-md"><a href="{{route('ManageGround')}}">Kembali</a></button>
            </div>
        </form>

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

        var polygon = @json($polygon);
        var markerpolygon = @json($marker);

        var polygonlayer = L.geoJSON(JSON.parse(polygon)).addTo(map);
        var markerlayer = L.geoJSON(JSON.parse(markerpolygon), {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng);
            }
        }).addTo(map);


        var drawnItems = new L.FeatureGroup();
        var markerGroup = new L.FeatureGroup();

        drawnItems.addLayer(polygonlayer);
        drawnItems.addLayer(markerlayer);

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

        let centerMarker;

        map.on(L.Draw.Event.CREATED, function (event) {

            if (drawnItems.getLayers().length > 0) {
                const layers = drawnItems.getLayers();
                drawnItems.clearLayers();    // Hapus polygon lama  // Hapus marker lama
            }

            markerGroup.clearLayers();

            var type = event.layerType;
            var layer = event.layer;
            polygon = layer;
            drawnItems.addLayer(polygon);

            const geoJsonData = layer.toGeoJSON(); // Definisi geoJsonData ada di sini
            console.log(JSON.stringify(geoJsonData));

            addMarker(geoJsonData);
        });

        map.on('draw:edited', function(event) {
            event.layers.eachLayer(function(layer) {
                const geoJsonData = layer.toGeoJSON();
                $('#polygon').val(JSON.stringify(geoJsonData)); // Update koordinat ke input
                addMarker(geoJsonData); // Update marker pusat (centroid) jika diperlukan
            });
        });

        function addMarker(geoJsonData){
            $('#polygon').val(JSON.stringify(geoJsonData));

            const centroid = turf.centroid(geoJsonData);
            const center = [centroid.geometry.coordinates[1], centroid.geometry.coordinates[0]];

            if (centerMarker) {
                markerGroup.removeLayer(centerMarker); // Ensure it's removed first
            }
            centerMarker = L.marker(center);
            markerGroup.addLayer(centerMarker);

            document.getElementById('latitude').value = center[0];
            document.getElementById('longitude').value = center[1];
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('perbarui').addEventListener('click', function(e) {
                e.preventDefault();

                const coordinates = document.getElementById('polygon').value;
                const latitude = document.getElementById('latitude').value;
                const longitude = document.getElementById('longitude').value;
                const nama_asset = document.getElementById('nama_asset').value;
                const status_kepemilikan = document.getElementById('status_kepemilikan').value;
                const status_tanah = document.getElementById('status_tanah').value;
                const detail_alamat = document.getElementById('detail_alamat').value;
                const rt = document.getElementById('rt').value;
                const rw = document.getElementById('rw').value;
                const padukuhan = document.getElementById('padukuhan').value;
                const tipe_tanah = document.getElementById('tipe_tanah').value;
                const luas_asset = document.getElementById('luas_asset').value;
                const formData = new FormData();

                formData.append('coordinates', coordinates);
                formData.append('latitude', latitude);
                formData.append('longitude', longitude);
                formData.append('nama_asset', nama_asset);
                formData.append('status_kepemilikan', status_kepemilikan);
                formData.append('status_tanah', status_tanah);
                formData.append('detail_alamat', detail_alamat);
                formData.append('rt', rt);
                formData.append('rw', rw);
                formData.append('padukuhan', padukuhan);
                formData.append('tipe_tanah', tipe_tanah);
                formData.append('luas_asset', luas_asset);

                const fotoTanah = document.querySelector('#foto_tanah').files[0];
                if (fotoTanah) {
                    formData.append('foto_tanah', fotoTanah);
                }
                const sertifikat = document.querySelector('#sertifikat').files[0];
                if (sertifikat) {
                    formData.append('sertifikat', sertifikat);
                }
                formData.append('_method', 'PUT');

                console.log(formData);

                // for (const [key, value] of formData.entries()) {
                //     console.log(`${key}:`, value);
                // }

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                axios.post(`/UpdatePeta/{{$dataGround->ground_detail_id}}`, formData, config)
                .then(response => {
                    alert(response.data.message);
                    window.location.href = '{{ route('ManageGround') }}';
                })
                .catch(error => {
                    console.log(error.reponse);
                    if (error.response?.data?.errors) {
                        const errors = error.response.data.errors;
                        let errorMessage = 'Validation Errors:\n';
                        for (const [field, messages] of Object.entries(errors)) {
                            errorMessage += `${field}: ${messages.join(', ')}\n`;
                        }
                        alert(errorMessage);
                    } else {
                        alert('Error: ' + (error.response?.data?.message || error.message));
                    }
                });
            });
        });

    </script>
</body>
</html>
