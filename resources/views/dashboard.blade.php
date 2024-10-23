<!-- dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
            </div>
            <div class="items-center flex space-x-4">
                <a href="{{route('dashboard')}}" class="text-black-500 hover:text-black">Dashboard</a>
                <a href="{{route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                @if(auth()->user()->hasRole('superAdmin'))
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                @endif
                <a href="{{route('ManageGround')}}" class="text-blue-500 hover:text-black">Manage Ground</a>
                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                    <div class="dropdown-content absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
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

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            @for ($i = 1; $i <= 8; $i++)
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.21 15.89A10 10 0 1 1 12 2v10l9.21 5.89z"></path>
                </svg>
                <p class="text-gray-600">Data {{ $i }}</p>
            </div>
            @endfor
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
