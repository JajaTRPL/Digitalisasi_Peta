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
            height: 100vh; /* Full viewport height */
            width: 100%;   /* Full width */
        }
        /* Custom styles for map controls */
        .map-control {
            background: white;
            padding: 8px;
            border-radius: 4px;
            box-shadow: 0 1px 5px rgba(0,0,0,0.65);
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </div>
            <div class="items-center flex space-x-4">
                <a href="#" class="text-blue-500 hover:text-black">Maps</a>
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

    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white shadow-md h-screen flex flex-col">
            <div class="flex items-center p-4 border-b">
                <span class="text-lg font-semibold">
                    Ground Kelurahan
                </span>
            </div>
            <div class="p-4">
                <label class="block text-sm font-medium text-gray-700" for="sort">
                    Sort by:
                </label>
                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" id="sort" name="sort">
                    <option>Asc</option>
                    <option>Desc</option>
                </select>
            </div>
            <div class="overflow-y-auto flex-1">
                <ul>
                    <!-- Example Ground Items -->
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">Ground 1</li>
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">Ground 2</li>
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">Ground 3</li>
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">Ground 4</li>
                    <li class="p-4 border-b cursor-pointer hover:bg-gray-100">Ground 5</li>
                    <!-- Add more grounds as needed -->
                </ul>
            </div>
        </div>

        <!-- Map Section -->
        <div class="w-3/4">
            <div id="map"></div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Optional: Include Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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

        // Initialize the Leaflet map
        const map = L.map('map').setView([-7.8213, 110.3841], 15); // Umbulharjo coordinates with zoom level 15

        // Define different tile layers
        const osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        });

        const satelliteLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenTopoMap'
        });

        const topoLayer = L.tileLayer('https://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png?apikey=YOUR_API_KEY', {
            maxZoom: 19,
            attribution: '© Thunderforest'
        });

        const terrainLayer = L.tileLayer('https://{s}.tile.stamen.com/terrain/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© Stamen'
        });

        // Add the default OSM layer to the map
        osmLayer.addTo(map);

        // Create a layer control and add it to the map
        const baseLayers = {
            "OpenStreetMap": osmLayer,
            "OpenTopoMap": satelliteLayer,
            "Thunderforest Landscape": topoLayer,
            "Stamen Terrain": terrainLayer
        };

        L.control.layers(baseLayers).addTo(map);

        // Add zoom control (optional, Leaflet includes it by default)
        // You can customize or reposition it if needed
        

        // Add a marker at Umbulharjo
        const marker = L.marker([-7.8213, 110.3841]).addTo(map)
            .bindPopup('Umbulharjo')
            .openPopup();

        // Optional: Add more interactive features like popups, tooltips, etc.

    </script>
</body>
</html>
