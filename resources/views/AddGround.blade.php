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
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </div>
            <div class="items-center flex space-x-4">
                <a href="#" class="text-blue-500 hover:text-black">Maps</a>
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                <a href="#" class="text-blue-500 hover:text-black">Manage Ground</a>
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
                <label class="block text-gray-700">Assets Number</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Assets Number" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700">Assets Name</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Assets Name" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700">Acquisition Date</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Acquisition Date" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700">Ownership Status</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Ownership Status" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700">Surface Area(m2)</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Surface Area" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700">Address</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter Address" type="text"/>
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700">Add Photo</label>
                <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="file"/>
            </div>
        </div>

        <!-- Peta Leaflet -->
        <div id="map" class="w-full h-96 border border-gray-300 rounded-md mt-6"></div>

        <div class="flex justify-end space-x-4 mt-6">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Add</button>
            <button class="bg-gray-300 text-black px-4 py-2 rounded-md" onclick="history.back()">Cancel</button>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>

    <script>
      var map = L.map('map').setView([-7.8046, 110.3590], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      var drawnItems = new L.FeatureGroup();
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
          var layer = event.layer;
          drawnItems.addLayer(layer);

          if (layer instanceof L.Marker) {
              var message = prompt("Masukkan pesan untuk marker:", "Marker ditambahkan!");
              layer.bindPopup(message).openPopup();
          } else if (layer instanceof L.Polygon) {
              var polygonMessage = prompt("Masukkan pesan untuk polygon:", "Polygon ditambahkan!");
              layer.bindPopup(polygonMessage).openPopup();
          }
      });
    </script>
</body>
</html>
