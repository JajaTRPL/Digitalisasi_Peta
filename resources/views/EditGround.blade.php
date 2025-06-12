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

    @include('components.navbar')

    <div class="max-w-7xl mx-auto p-6 bg-white mt-6 shadow-md rounded-md">
        <form>
            <span class="block text-[24px] font-semibold mb-8 font-poppins">Edit Data Tanah</span>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-black-700 font-semibold">Nama Aset</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Nama Asset" type="text" id="nama_tanah" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Detail Alamat</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Detail Alamat" type="text" id="detail_alamat" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">RT</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RT"
                        type="text" id="rt" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">RW</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan no RW"
                        type="text" id="rw" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Padukuhan</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500" id="padukuhan">
                        <option value=""></option>
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
                        <option value="">
                        </option>
                    </select>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Status Tanah</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="status_tanah">
                        <option value=""></option>
                    </select>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Luas Aset Tanah</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Luas Tanah"
                        type="text" id="luas_tanah" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Tipe Tanah</label>
                    <select class="w-full mt-1 p-2 border border-gray-300 rounded-md text-gray-500 font-bold" id="tipe_tanah">
                        <option value=""></option>
                    </select>
                </div>

                <div class="font-[sans-serif] max-w-md mx-auto">
                    <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                    <input type="file"
                    class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                    id="foto_tanah" name="foto_tanah" value=""/>
                    <p class="text-xs text-gray-400 mt-2">Foto Tanah PNG JPG</p>
                </div>

                <div class="font-[sans-serif] max-w-md mx-auto">
                    <label class="text-base text-gray-500 font-semibold mb-2 block">Upload file</label>
                    <input type="file"
                    class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                    id="sertifikat_tanah" name="sertifikat" value=""/>
                    <p class="text-xs text-gray-400 mt-2">Sertifikat PDF</p>
                </div>

                <div>
                    <label class="block text-black-700 font-semibold">Longtitude</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Longtitude" type="text" id="longitude" value=""/>
                </div>
                <div>
                    <label class="block text-black-700 font-semibold">Latitude</label>
                    <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Masukkan Latitude" type="text" id="latitude" value=""/>
                </div>
            </div>

            <!-- Peta Leaflet -->
            <div id="map" class="w-full h-96 border border-gray-300 rounded-md mt-6"></div>

            <div>
                <input id="polygon" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" name="polygon" value="" style="display: none">
            </div>



            <div class="flex justify-end space-x-4 mt-6">
                <button class="bg-[#666CFF] text-white px-4 py-2 rounded-md" id="perbarui" name="perbarui">Perbarui</button>
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

        var map = L.map('map').setView([-7.614555267905213, 110.43468152673236], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        const drawnItems = new L.FeatureGroup();
        const markerGroup = new L.FeatureGroup();
        map.addLayer(drawnItems);
        map.addLayer(markerGroup);
        let centerMarker = null;

        const drawControl = new L.Control.Draw({
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

        map.on('draw:created', function (event) {
            drawnItems.clearLayers(); // hapus polygon lama
            markerGroup.clearLayers(); // hapus marker lama
            const layer = event.layer;
            drawnItems.addLayer(layer);

            const geoJsonData = layer.toGeoJSON();
            $('#polygon').val(JSON.stringify(geoJsonData));
            addMarker(geoJsonData);
        });

        // Jika polygon diedit
        map.on('draw:edited', function (event) {
            event.layers.eachLayer(function (layer) {
                const geoJsonData = layer.toGeoJSON();
                $('#polygon').val(JSON.stringify(geoJsonData));
                addMarker(geoJsonData);
            });
        });

        function addMarker(geoJsonData) {
            const centroid = turf.centroid(geoJsonData);
            const center = [centroid.geometry.coordinates[1], centroid.geometry.coordinates[0]];

            if (centerMarker) {
                markerGroup.removeLayer(centerMarker);
            }
            centerMarker = L.marker(center);
            markerGroup.addLayer(centerMarker);

            $('#latitude').val(center[0]);
            $('#longitude').val(center[1]);
        }

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const id = window.location.pathname.split('/').pop();

            // Ambil detail tanah dan render ke form + map
            $.ajax({
                url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/ground/' + id,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {
                    const data = response.data;
                    $('#nama_tanah').val(data.nama_tanah);
                    $('#detail_alamat').val(data.alamat);
                    $('#rt').val(data.rt);
                    $('#rw').val(data.rw);
                    $('#luas_tanah').val(data.luas_tanah);
                    $('#latitude').val(data.latitude);
                    $('#longitude').val(data.longitude);
                    $('#padukuhan').val(data.padukuhan);

                    // Tampilkan marker lokasi
                    if (data.latitude && data.longitude) {
                        const marker = L.marker([data.latitude, data.longitude]).addTo(markerGroup);
                    }

                    // Jika ada koordinat polygon dari DB, tampilkan polygon
                    if (data.coordinates) {
                        try {
                            const parsedData = JSON.parse(data.coordinates);
                            if (parsedData.geometry && parsedData.geometry.coordinates) {
                                const geoType = parsedData.geometry.type;
                                const coords = parsedData.geometry.coordinates;

                                if (geoType === 'Polygon') {
                                    const formattedCoords = coords[0].map(coord => [coord[1], coord[0]]);
                                    const polygon = L.polygon(formattedCoords, {
                                        color: 'blue',
                                        fillColor: '#1e90ff',
                                        fillOpacity: 0.5
                                    });
                                    drawnItems.addLayer(polygon);
                                    addMarker(parsedData);
                                }
                            }
                        } catch (e) {
                            console.error('Gagal parse polygon:', e);
                        }
                    }
                },
                error: function () {
                    alert('Gagal load data');
                }
            });

            // Load dropdown dropdown
            $.when(
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/tipe-tanah',
                    type: 'GET',
                    headers: { 'Authorization': 'Bearer ' + token }
                }),
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/status-tanah',
                    type: 'GET',
                    headers: { 'Authorization': 'Bearer ' + token }
                }),
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/status-kepemilikan',
                    type: 'GET',
                    headers: { 'Authorization': 'Bearer ' + token }
                }),
                $.ajax({
                    url: 'https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/get/ground/' + id,
                    type: 'GET',
                    headers: { 'Authorization': 'Bearer ' + token }
                })
            ).done(function (tipeTanahVal, statusTanahVal, statusKepemilikanVal, groundDetailVal) {
                const tipeTanah = tipeTanahVal[0].data;
                const statusTanah = statusTanahVal[0].data;
                const statusKepemilikan = statusKepemilikanVal[0].data;
                const detail = groundDetailVal[0].data;

                itemDropdown('#tipe_tanah', tipeTanah, 'id', 'nama_tipe_tanah', detail.tipe_tanah_id);
                itemDropdown('#status_tanah', statusTanah, 'id', 'nama_status_tanah', detail.status_tanah_id);
                itemDropdown('#status_kepemilikan', statusKepemilikan, 'id', 'nama_status_kepemilikan', detail.status_kepemilikan_id);
            });

            function itemDropdown(selector, data, valueKey, textKey, selectedVal) {
                const dropdown = $(selector);
                dropdown.empty();
                dropdown.append(`<option disabled>Pilih</option>`);
                data.forEach(item => {
                    const selected = item[valueKey] == selectedVal ? 'selected' : '';
                    dropdown.append(`<option value="${item[valueKey]}" ${selected}>${item[textKey]}</option>`);
                });
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const id = window.location.pathname.split('/').pop();

            $('#perbarui').on('click', function (e) {
                e.preventDefault();

                const formData = new FormData();

                formData.append('_method', 'PATCH'); // Method override

                // Data biasa
                formData.append('nama_tanah', $('#nama_tanah').val());
                formData.append('detail_alamat', $('#detail_alamat').val());
                formData.append('rt', $('#rt').val());
                formData.append('rw', $('#rw').val());
                formData.append('padukuhan', $('#padukuhan').val());
                formData.append('desa', $('#desa').val());
                formData.append('kecamatan', $('#kecamatan').val());
                formData.append('kabupaten', $('#kabupaten').val()); // Fix: kamu ambil dari kecamatan tadi
                formData.append('status_kepemilikan_id', $('#status_kepemilikan').val());
                formData.append('status_tanah_id', $('#status_tanah').val());
                formData.append('luas_tanah', $('#luas_tanah').val());
                formData.append('tipe_tanah_id', $('#tipe_tanah').val());
                formData.append('longitude', $('#longitude').val());
                formData.append('latitude', $('#latitude').val());
                formData.append('coordinates', $('#polygon').val()); // asumsi ini input geoJSON string

                // File upload (optional)
                if ($('#foto_tanah')[0].files.length > 0) {
                    formData.append('foto_tanah', $('#foto_tanah')[0].files[0]);
                }
                if ($('#sertifikat_tanah')[0].files.length > 0) {
                    formData.append('sertifikat_tanah', $('#sertifikat_tanah')[0].files[0]);
                }

                $.ajax({
                    url: "https://digitalmap-umbulharjo-api.madanateknologi.web.id/api/update/ground/" + id,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    success: function (res) {
                        alert('Data berhasil disimpan!');
                        window.location.href = "/ManageGround";
                    },
                    error: function (err) {
                        console.error(err);
                        if (err.responseJSON && err.responseJSON.message) {
                            alert('Error: ' + err.responseJSON.message);
                        } else {
                            alert('Terjadi kesalahan. Cek console untuk detail.');
                        }
                    }
                });
            });
        });
    </script>


</body>
</html>
