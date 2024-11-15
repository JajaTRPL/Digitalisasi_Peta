<html>

<head>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-green-50">
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
                                Profile
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
                <div class="flex items-center space-x-4">
                    <label class="text-gray-700" for="show">
                        Show:
                    </label>
                    <select class="border border-gray-300 rounded px-2 py-1" id="show">
                        <option>
                            10
                        </option>
                        <option>
                            25
                        </option>
                        <option>
                            50
                        </option>
                    </select>
                    <input class="border border-gray-300 rounded px-4 py-2" placeholder="Search User" type="text" />
                </div>
            </div>
            <table class="min-w-full bg-white table-auto">
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
                            <a class="text-gray-500 mx-1" href="{{route('editPeta', $ground->ground_detail_id)}}">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{route('GroundDestroy', $ground->ground_detail_id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-gray-500 mx-1" onclick="return confirm('Rill mau hapus?')"
                                    type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            <a class="text-gray-500 mx-1" href="#">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex items-center justify-between mt-4">
                <p class="text-gray-600">
                    Showing 1 to 10 of 50 entries
                </p>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        &lt;
                    </button>
                    <button class="px-3 py-1 bg-blue-500 text-white rounded">
                        1
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        2
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        3
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        4
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        5
                    </button>
                    <button class="px-3 py-1 border border-gray-300 rounded">
                        &gt;
                    </button>
                </div>
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
    </script>
</body>

</html>
