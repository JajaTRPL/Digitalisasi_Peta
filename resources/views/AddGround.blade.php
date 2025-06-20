<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kelurahan Umbulharjo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="icon" href="{{ asset('images/sleman-logo.png') }}" type="image/png">
    <style>
        #map {
            width: 100%;
        }
        .fullscreen-map {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            display: hidden;
            background-color: black;
        }

        .toastify {
            font-family: 'Roboto', sans-serif;
            border-radius: 4px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        }
    </style>
</head>

<body class="bg-gray-100 font-roboto">

    <!-- NavBar -->

    @include('components.navbar_tambah_tanah')
    <!-- Form Add -->
    <div class="max-w-7xl mx-auto p-6 bg-white mt-6 shadow-md rounded-md">
        <span class="block text-[24px] font-semibold mb-8 font-poppins">Tambah Data Tanah</span>
        <div class="grid grid-cols-2 gap-6">
            {{-- <div>
                <label class="block text-black-700 font-semibold">Nomor Asset</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Nomor Asset"
                    type="text" id="nomor_asset" />
            </div> --}}
            <div>
                <label class="block text-black-700 font-semibold">Nama Aset</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Nama Asset"
                    type="text" id="nama_tanah" />
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>
            </div>
            <div>
                <label class="block text-black-700 font-semibold">Detail Alamat</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Detail Alamat (Jalan, Blok, Nomor)"
                    type="text" id="detail_alamat" />
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">RT</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RT"
                    type="text" id="rt" />
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">RW</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RW"
                    type="text" id="rw" />
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Padukuhan</label>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="padukuhan">
                    <option value="" disabled selected >Pilih</option>
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
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Desa</label>
                <input
                    type="text"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                    value="Umbulharjo"
                    readonly
                    id="desa"
                />
            </div>
            <div>
                <label class="block text-black-700 font-semibold">Kecamatan</label>
                <input
                    type="text"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                    value="Cangkringan"
                    readonly
                    id="kecamatan"
                />
            </div>
            <div>
                <label class="block text-black-700 font-semibold">Kabupaten</label>
                <input
                    type="text"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                    value="Sleman"
                    readonly
                    id="kabupaten"
                />
            </div>
            <div>
                <label class="block text-black-700 font-semibold">Status Kepemilikan</label>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="status_kepemilikan">
                </select>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Status Tanah</label>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="status_tanah">
                </select>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Luas Aset Tanah</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Luas Tanah"
                    type="text" id="luas_tanah" name="luas_tanah"/>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>
            </div>
            <div>
                <label class="block text-black-700 font-semibold">Tipe Tanah</label>
                <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="tipe_tanah">
                </select>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div class="font-[sans-serif] max-w-md mx-auto">
                <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                <input type="file"
                  class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                  id="foto_tanah" name="foto_tanah"/>
                <p class="text-xs text-gray-400 mt-2">Foto Tanah PNG JPG</p>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>

            <div class="font-[sans-serif] max-w-md mx-auto">
                <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                <input type="file"
                  class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                  id="sertifikat_tanah" name="sertifikat"/>
                <p class="text-xs text-gray-400 mt-2">Sertifikat PDF</p>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Longtitude</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Longtitude"
                    type="text" id="longitude" readonly />
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>

            </div>
            <div>
                <label class="block text-black-700 font-semibold">Latitude</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Latitude"
                    type="text" id="latitude" readonly/>
                <p id="error-luas_tanah" class="text-red-500 text-sm mt-1"></p>
            </div>
        </div>

        <!-- Peta Leaflet -->
        <div id="map" class="w-full h-[80vh] border border-gray-300 rounded-md mt-6"></div>


        <div>
            {{-- <label>The layer To Be Stored:</label> --}}
            <input id="polygon" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" name="polygon"
                value="{{request('polygon')}}" style="display: none">
        </div>



        <div class="flex justify-end space-x-4 mt-6">
            <button class="bg-[#666CFF] text-white px-4 py-2 rounded-md" id="submit" name="submit">Add</button>
            <button class="bg-gray-300 text-black px-4 py-2 rounded-md" onclick="history.back()">Cancel</button>
        </div>

    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@7/turf.min.js"></script>

    <script>

        // map
        var map = L.map('map').setView([-7.614555267905213, 110.43468152673236], 15);

        // Definisi layer tile
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

        // Menambahkan layer default (OpenStreetMap) ke peta
        osmLayer.addTo(map);

        // Menyiapkan kontrol layer dan menambahkannya ke peta
        const baseLayers = {
            "OpenStreetMap": osmLayer,
            "Esri Satellite": esriSatelliteLayer,
            "CartoDB Positron": cartoDBPositronLayer,
            "OpenTopoMap": satelliteLayer
        };

        L.control.layers(baseLayers).addTo(map);

        // Buat kontrol kustom untuk fullscreen
        const FullscreenControl = L.Control.extend({
            options: {
                position: 'topright' // Atur posisi tombol
            },

            onAdd: function (map) {
                const container = L.DomUtil.create('button', 'leaflet-bar leaflet-control leaflet-control-custom');

                container.innerHTML = '⛶'; // Icon atau teks tombol
                container.style.backgroundColor = 'white';
                container.style.width = '30px';
                container.style.height = '30px';
                container.style.cursor = 'pointer';

                let isFullscreen = false;

                container.onclick = function () {
                    const mapContainer = document.getElementById('map');
                    // <div id="map" class="w-full h-[80vh] border border-gray-300 rounded-md mt-6"></div>
                    // <div id="map" class="w-screen h-screen fixed top-0 translate-x-[-50%] left-[50%] border border-gray-300 rounded-md"></div>
                    if (!isFullscreen) {
                        mapContainer.classList.remove('w-full');
                        mapContainer.classList.remove('h-[80vh]');
                        mapContainer.classList.remove('mt-6');
                        mapContainer.classList.add('w-screen');
                        mapContainer.classList.add('h-screen');
                        mapContainer.classList.add('fixed');
                        mapContainer.classList.add('top-0');
                        mapContainer.classList.add('translate-x-[-50%]');
                        mapContainer.classList.add('left-[50%]');
                        mapContainer.setAttribute("style","position:fixed;")
                        container.innerHTML = '↩'; // Ubah ikon ke "kembali"
                        isFullscreen = true;
                    } else {
                        mapContainer.classList.add('w-full');
                        mapContainer.classList.add('h-[80vh]');
                        mapContainer.classList.add('mt-6');
                        mapContainer.classList.remove('w-screen');
                        mapContainer.classList.remove('h-screen');
                        mapContainer.classList.remove('fixed');
                        mapContainer.classList.remove('top-0');
                        mapContainer.classList.remove('translate-x-[-50%]');
                        mapContainer.classList.remove('left-[50%]');
                        mapContainer.setAttribute("style","position:relative;")
                        container.innerHTML = '⛶'; // Kembali ke ikon fullscreen
                        isFullscreen = false;
                    }
                    map.invalidateSize(); // Refresh ukuran peta setelah mengubah ukurannya
                };

                return container;
            }
        });

        // Tambahkan kontrol kustom ke peta
        map.addControl(new FullscreenControl());


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
            marker: false,
            polyline: false,
            rectangle: false,
            circle: false,
            }
        });
        map.addControl(drawControl);

        let centerMarker;

        map.on(L.Draw.Event.CREATED, function (event) {
            // Clear previous layers
            if (drawnItems.getLayers().length > 0) {
                drawnItems.clearLayers(); // Clear old polygons
            }
            markerGroup.clearLayers(); // Clear old markers

            // Add the new layer
            var type = event.layerType;
            var layer = event.layer;
            drawnItems.addLayer(layer);

            // Convert to GeoJSON and process
            const geoJsonData = layer.toGeoJSON();
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

        function addMarker(geoJsonData) {
            // Update polygon value
            $('#polygon').val(JSON.stringify(geoJsonData));

            // Calculate the centroid
            const centroid = turf.centroid(geoJsonData);
            const center = [centroid.geometry.coordinates[1], centroid.geometry.coordinates[0]];

            // Remove existing marker and add a new one
            if (centerMarker) {
                markerGroup.removeLayer(centerMarker); // Ensure it's removed first
            }
            centerMarker = L.marker(center);
            markerGroup.addLayer(centerMarker);

            // Update latitude and longitude
            document.getElementById('latitude').value = center[0];
            document.getElementById('longitude').value = center[1];
        }

    </script>

    <script>
        $('input, select, textarea').on('input', function () {
            const fieldName = $(this).attr('name');
            $(`#error-${fieldName}`).text('');
            $(this).removeClass('border-red-500');
        });

        $(document).ready(function () {
        const token = localStorage.getItem('token');
        const user = JSON.parse(localStorage.getItem('userData'));

        if (token) {
            $("#submit").click(function (e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('coordinates', document.getElementById('polygon').value);
                formData.append('latitude', document.getElementById('latitude').value);
                formData.append('longitude', document.getElementById('longitude').value);
                formData.append('nama_tanah', document.getElementById('nama_tanah').value);
                formData.append('status_kepemilikan_id', document.getElementById('status_kepemilikan').value);
                formData.append('status_tanah_id', document.getElementById('status_tanah').value);
                formData.append('detail_alamat', document.getElementById('detail_alamat').value);
                formData.append('rt', document.getElementById('rt').value);
                formData.append('rw', document.getElementById('rw').value);
                formData.append('padukuhan', document.getElementById('padukuhan').value);
                formData.append('tipe_tanah_id', document.getElementById('tipe_tanah').value);
                formData.append('luas_tanah', document.getElementById('luas_tanah').value);

                // file handling
                const foto = document.getElementById('foto_tanah').files[0];
                const sertifikat = document.getElementById('sertifikat_tanah').files[0];
                if (foto) formData.append('foto_tanah', foto);
                if (sertifikat) formData.append('sertifikat_tanah', sertifikat);

                // Show loading indicator
                const submitBtn = document.getElementById('submit');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                submitBtn.disabled = true;

                $.ajax({
                    url: '{{ config('app.API_URL') }}/api/create/ground',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhrFields: {
                        withCredentials: true
                    },
                    success: function (response) {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        Toastify({
                            text: "Data tanah berhasil ditambahkan",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            stopOnFocus: true,
                        }).showToast();

                        setTimeout(function() {
                            window.location.href = 'ManageGround';
                        }, 2000);
                    },
                    error: function (xhr, status, error) {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        
                        console.log(xhr.responseJSON.errors);
                        console.log(xhr.responseJSON.message);

                        const errors = xhr.responseJSON.errors;
                        
                        if (errors.luas_tanah) {
                            $('#error-luas_tanah').text(errors.luas_tanah[0]);
                        }

                        let errorMessage = "Terjadi kesalahan saat menyimpan data";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        Toastify({
                            text: errorMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            stopOnFocus: true,
                        }).showToast();
                    }
                });
            });
            } else {
                Toastify({
                    text: "✗ Sesi telah berakhir, silakan login kembali",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#F44336",
                    stopOnFocus: true,
                }).showToast();
                
                setTimeout(function() {
                    window.location.href = '/login';
                }, 2000);
            }
        });
    </script>


    <script>
        $(document).ready(function(){
            const token = localStorage.getItem('token');

            $.when(
                $.ajax({
                    url: '{{ config('app.API_URL') }}/api/get/tipe-tanah',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                }),
                $.ajax({
                    url: '{{ config('app.API_URL') }}/api/get/status-tanah',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                }),
                $.ajax({
                    url: '{{ config('app.API_URL') }}/api/get/status-kepemilikan',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                }),
            ).done(function(tipeTanahVal, statusTanahVal, statusKepemilikanVal) {
                const tipeTanah = tipeTanahVal[0].data;
                const statusTanah = statusTanahVal[0].data;
                const statusKepemilikan = statusKepemilikanVal[0].data;

                console.log(tipeTanah);
                console.log(statusTanah);
                console.log(statusKepemilikan);

                itemDropdown('#tipe_tanah', tipeTanah, 'id', 'nama_tipe_tanah');
                itemDropdown('#status_tanah', statusTanah, 'id', 'nama_status_tanah');
                itemDropdown('#status_kepemilikan', statusKepemilikan, 'id', 'nama_status_kepemilikan');

            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error ambil data:', textStatus);
            });

            function itemDropdown(selector, data, valueKey, textKey){
                const dropdown = $(selector);

                dropdown.empty();
                dropdown.append(`<option disabled selected>Pilih</option>`);
                data.forEach(item => {
                    dropdown.append(`<option value="${item[valueKey]}">${item[textKey]}</option>`);
                });
            }
        })
    </script>
</body>

</html>
