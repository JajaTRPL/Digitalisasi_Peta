<!-- Navbar -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const token = localStorage.getItem('token');

        if (token) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/user',
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(user) {
                    localStorage.setItem('userData', JSON.stringify(user));

                    // Setelah data berhasil diambil dan disimpan, lanjut:
                    $('#user-name').text(user.name);

                    const roles = user.roles || [];

                    if (roles.includes('admin')) {
                        $('#manageGround').removeClass('hidden');
                    }

                    if (roles.includes('superAdmin')) {
                        $('#manageAdmin').removeClass('hidden');
                        $('#manageGround').removeClass('hidden');
                    }

                    console.log('User:', user);
                },
                error: function(xhr) {
                    console.error('Gagal ambil data user:', xhr);
                }
            });
        } else {
            console.warn('Token tidak ditemukan.');
        }

        // Event handler logout
        $(document).on('click', '#logout', function (e) {
            e.preventDefault(); // mencegah form submit default kalau button dalam form
            $.ajax({
                url: 'http://127.0.0.1:8000/api/logout',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    localStorage.removeItem('token');
                    localStorage.removeItem('userData');
                    alert(response.success || 'Berhasil logout');
                    window.location.href = '/login';
                },
                error: function(xhr) {
                    let errorMessage = 'Logout gagal';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        errorMessage = xhr.responseText;
                    }
                    console.error('Logout gagal:', errorMessage);
                }
            });
        });
    });
</script>
<nav class="bg-white shadow-md sticky top-0 z-[999999]">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 ">
            {{-- <h1 class="text-2xl font-semibold font-poppins">Daftar Pengguna Website</h1> --}}
        </div>
        <div id="navLinks" class="items-center flex space-x-4">
            <a id="dashboard" href="{{route('dashboard')}}" class="text-[#666CFF] hover:text-black ">Dashboard</a>
            <a id="viewPeta" href="{{route('ViewPeta')}}" class="text-[#666CFF] hover:text-black ">Maps</a>
            <a id="manageAdmin" href="{{route('admin.dashboard')}}" class="text-[#666CFF] hover:text-black hidden">Manage Admin</a>
            <a id="manageGround" href="{{route('ManageGround')}}" class="text-[#666CFF] hover:text-black hidden">Manage Ground</a>
            <div class="relative inline-block text-left">
                <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                    <div class="py-1">
                        <a id="user-name" href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                            <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z"></path>
                            </svg>
                        </a>
                        <form>
                            <button id="logout" type="submit" class="flex items-center gap-2 w-full px-4 py-2 text-sm font-medium text-gray-700 bg-red-50 hover:bg-red-200 hover:text-red-800 rounded-md transition duration-200 ease-in-out">
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




