<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Daftar Pengguna Website
    </title>
    @vite(['resources/css/Admin.css'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

</head>

<body class="bg-[#F6F9EE]">
    @if(session('success'))
    <div class="bg-green-100 text-green-800 border-l-4 border-green-500 p-4 mb-4 rounded-lg">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 border-l-4 border-red-500 p-4 mb-4 rounded-lg">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Navbar -->
    @include('components.navbar')

    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-4 gap-5">
                <button id="tambahAdminBtn" class="bg-blue-500 text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Admin
                </button>
                <div class="flex-1">
                    <h2 class="text-xl font-semibold">Daftar Pengguna Website</h2>
                </div>
            </div>

            <table class="min-w-full bg-white table-auto" id="adminTable">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            NO
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            NAMA
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            EMAIL
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            PERAN
                        </th>
                        <th class="py-2 px-4 border-b text-left bg-gray-200">
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- append from ajax --}}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Overlay -->
    <div id="modalOverlay" class="modal-overlay"></div>

    <!-- Tambah Admin Modal (Right Side) -->
    <div id="tambahAdminModal" class="modal-right z-[999999999]">
        <div class="modal-header">
            <h3 class="text-lg font-semibold">Tambah Admin</h3>
            <button class="text-gray-500 hover:text-gray-700" onclick="closeTambahModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="tambahAdminForm" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div class="flex space-x-3 justify-end pt-4">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" onclick="closeTambahModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Admin Modal (Right Side) -->
    <div id="editAdminModal" class="modal-right z-[999999999]">
        <div class="modal-header">
            <h3 class="text-lg font-semibold">Edit Admin</h3>
            <button class="text-gray-500 hover:text-gray-700" onclick="closeEditModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editAdminForm" class="space-y-4">
                <input type="hidden" id="editUserId">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="editName" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="editRole" class="block text-sm font-medium text-gray-700">Peran</label>
                    <select id="editRole" name="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="admin">Admin</option>
                        <option value="super admin">Super Admin</option>
                    </select>
                </div>
                <div>
                    <label for="editPassword" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" id="editPassword" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="flex space-x-3 justify-end pt-4">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        // Modal functions
        function openTambahModal() {
            $('#modalOverlay').addClass('open');
            $('#tambahAdminModal').addClass('open');
        }

        function closeTambahModal() {
            $('#modalOverlay').removeClass('open');
            $('#tambahAdminModal').removeClass('open');
            $('#tambahAdminForm')[0].reset();
        }

        function openEditModal(id, name, email, role) {
            $('#editUserId').val(id);
            $('#editName').val(name);
            $('#editEmail').val(email);
            $('#editRole').val(role.toLowerCase());
            $('#editPassword').val('');
            $('#modalOverlay').addClass('open');
            $('#editAdminModal').addClass('open');
        }

        function closeEditModal() {
            $('#modalOverlay').removeClass('open');
            $('#editAdminModal').removeClass('open');
            $('#editAdminForm')[0].reset();
        }

        function deleteAdmin(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus admin ini?')) return;

            const token = localStorage.getItem('token');

            $.ajax({
                url: `http://127.0.0.1:8000/api/delete/admin/${id}`,
                type: 'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Delete response:', response);
                    if (response.status === 'success') {
                        alert('Admin berhasil dihapus!');
                        loadAdminData();
                    } else {
                        alert('Gagal menghapus admin: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error during delete:', xhr.responseText);
                    alert('Terjadi kesalahan saat menghapus admin');
                }
            });
        }

        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            // Close modals when clicking on overlay
            $('#modalOverlay').on('click', function() {
                closeTambahModal();
                closeEditModal();
            });

            // Inisialisasi DataTable
            let table = $('#adminTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada data admin",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(difilter dari total _MAX_ entri)",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai"
                },
                "responsive": true
            });

            // Tambah event listener untuk tombol tambah admin
            $('#tambahAdminBtn').on('click', function() {
                openTambahModal();
            });

            // Event handler untuk tombol edit dan delete menggunakan delegasi event
            $('#adminTable').on('click', '.edit-btn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const email = $(this).data('email');
                const role = $(this).data('role');
                openEditModal(id, name, email, role);
            });

            $('#adminTable').on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                deleteAdmin(id);
            });

            // Load data admin
            window.loadAdminData = function() {
                if (token) {
                    // Tambahkan log untuk debugging
                    console.log('Token retrieved:', token ? 'Yes' : 'No');

                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/get/admin',
                        type: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function (response) {
                            console.log('Full API response:', response);

                            if (response.status === 'success' && Array.isArray(response.data)) {
                                // Clear table first
                                table.clear();

                                response.data.forEach((item, index) => {
                                    const editButton = `<button type="button" class="text-blue-500 mx-1 edit-btn" data-id="${item.id}" data-name="${item.name}" data-email="${item.email}" data-role="${item.roles}"><i class="fas fa-pen"></i></button>`;
                                    const deleteButton = `<button type="button" class="text-red-500 mx-1 delete-btn" data-id="${item.id}"><i class="fas fa-trash"></i></button>`;

                                    table.row.add([
                                        index + 1,
                                        item.name,
                                        item.email,
                                        item.roles,
                                        `<div class="flex items-center justify-start">${editButton}${deleteButton}</div>`
                                    ]).draw(false);
                                });
                            } else {
                                console.error('Error in API response:', response.message || 'Format data tidak valid');
                                if (response.message) {
                                    alert('Gagal memuat data admin: ' + response.message);
                                }
                            }
                        },
                        error: function(xhr) {
                            console.error('AJAX error:', xhr.responseText);
                            alert('Terjadi kesalahan saat mengambil data admin');
                        }
                    });
                } else {
                    console.error('Token not found');
                    alert('Tidak dapat mengakses data. Silakan login kembali.');
                    // Redirect to login page
                    window.location.href = '/login';
                }
            };

            // Load admin data initially
            loadAdminData();

            // Handle Tambah Admin form submission
            $('#tambahAdminForm').submit(function(e) {
                e.preventDefault();

                let username = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let confirmPassword = $('#confirmPassword').val();

                if (password === confirmPassword) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/register/admin',
                        type: 'POST',
                        data: JSON.stringify({
                            name: username,
                            email: email,
                            password: password
                        }),
                        contentType: 'application/json',
                        dataType: 'json',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function(response) {
                            console.log(response);
                            alert('Admin berhasil ditambahkan!');
                            $('#tambahAdminForm')[0].reset();
                            closeTambahModal();
                            loadAdminData();
                        },
                        error: function(xhr) {
                            let errorMessage = 'Registrasi gagal';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.responseText) {
                                errorMessage = xhr.responseText || 'An error occurred';
                            }
                            console.log('Registrasi gagal:', errorMessage);
                            alert('Registrasi gagal: ' + errorMessage);
                        }
                    });
                } else {
                    alert("Password yang dimasukkan tidak cocok");
                }
            });

            // Handle Edit Admin form submission
            $('#editAdminForm').submit(function(e) {
                e.preventDefault();

                const userId = $('#editUserId').val();
                const name = $('#editName').val();
                const email = $('#editEmail').val();
                const role = $('#editRole').val();
                const password = $('#editPassword').val();

                // Prepare data object
                const data = {
                    name: name,
                    email: email,
                    role: role
                };

                // Include password only if provided
                if (password) {
                    data.password = password;
                }

                $.ajax({
                    url: `http://127.0.0.1:8000/api/update/admin/${userId}`,
                    type: 'PUT',
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        alert('Admin berhasil diperbarui!');
                        closeEditModal();
                        loadAdminData();
                    },
                    error: function(xhr) {
                        let errorMessage = 'Update gagal';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText || 'An error occurred';
                        }
                        console.log('Update gagal:', errorMessage);
                        alert('Update gagal: ' + errorMessage);
                    }
                });
            });
        });
    </script>
</body>

</html>
