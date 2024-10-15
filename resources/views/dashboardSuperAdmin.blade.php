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
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </div>
            <div class="items-center flex space-x-4">
                <a href="#" class="text-blue-500 hover:text-black-700">Maps</a>
                <a href="#" class="text-blue-500 hover:text-black-700">Manage Admin</a>
                <a href="#" class="text-blue-500 hover:text-black-700">Manage Ground</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="h-12 w-12 rounded-full">
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

</body>
</html>
