<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Daftar Pengguna Website</title>
    @vite(['resources/css/Admin.css'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
        <div class="bg-white px-10 py-7 rounded-lg shadow-md overflow-hidden">
            <div class="flex items-center justify-between mb-6">
                <button id="tambahAdminBtn" class="bg-[#666CFF] text-white px-4 py-2 rounded-lg transition-colors hover:bg-[#5a60e5]">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Admin
                </button>
            </div>

            <table class="min-w-full bg-white table-auto" id="adminTable">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b text-left bg-gray-200">NO</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-200">NAMA</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-200">EMAIL</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-200">PERAN</th>
                        <th class="py-3 px-4 border-b text-left bg-gray-200">AKSI</th>
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

    @include('components.TambahAdminModal')
    @include('components.UpdateAdminModal')

    <!-- Delete Confirmation Modal -->
    <div id="deleteAdminModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Konfirmasi Hapus Admin</h3>
                <button onclick="closeDeleteModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mb-6">
                <p>Apakah Anda yakin ingin menghapus admin ini?</p>
                <div class="mt-4 p-4 bg-amber-50 rounded-lg">
                    <p class="font-semibold" id="adminToDeleteName"></p>
                    <p class="text-gray-600 text-sm mt-1" id="adminToDeleteEmail"></p>
                </div>
            </div>
            <div class="flex justify-center mt-4 space-x-4">
                    <button onclick="closeDeleteModal()" class="px-4 py-2 w-full border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition-colors" onclick="toggleModal()">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn" class="px-4 py-2 w-full bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors" >
                        Hapus
                    </button>
                    <form id="modalDeleteForm" class="hidden"></form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Toast notification functions
        function showSuccessToast(message) {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true,
                className: "toast-success"
            }).showToast();
        }

        function showErrorToast(message) {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                stopOnFocus: true,
                className: "toast-error"
            }).showToast();
        }

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

        // Delete modal functions
        let currentDeleteId = null;
        let currentDeleteName = null;
        let currentDeleteEmail = null;

        function openDeleteModal(id, name, email) {
            currentDeleteId = id;
            currentDeleteName = name;
            currentDeleteEmail = email;
            $('#adminToDeleteName').text(name);
            $('#adminToDeleteEmail').text(email);
            $('#modalOverlay').addClass('open');
            $('#deleteAdminModal').addClass('open');
        }

        function closeDeleteModal() {
            $('#modalOverlay').removeClass('open');
            $('#deleteAdminModal').removeClass('open');
            currentDeleteId = null;
            currentDeleteName = null;
            currentDeleteEmail = null;
        }

        function confirmDelete() {
            if (!currentDeleteId) return;
            
            const token = localStorage.getItem('token');

            $.ajax({
                url: `{{ config('app.API_URL') }}/api/delete/admin/${currentDeleteId}`,
                type: 'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Delete response:', response);
                    if (response.status === 'success') {
                        showSuccessToast('Admin berhasil dihapus!');
                        // Reload halaman setelah 1 detik
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showErrorToast('Gagal menghapus admin: ' + response.message);
                    }
                    closeDeleteModal();
                    setTimeout(() => window.location.reload(), 1000);
                },
                error: function(xhr) {
                    console.error('Error during delete:', xhr.responseText);
                    showErrorToast('Terjadi kesalahan saat menghapus admin');
                    closeDeleteModal();
                    setTimeout(() => window.location.reload(), 1000);
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
                closeDeleteModal();
            });

            // Initialize DataTable
            let table = $('#adminTable').DataTable({
                "language": {
                    "emptyTable": "Tidak ada data admin",
                    "info": "<span class='text-gray-500' font-inter> Menampilkan _START_ sampai _END_ dari _TOTAL_ entri </span>",
                    "infoEmpty": " Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(difilter dari total _MAX_ entri)",
                    "lengthMenu": "Tampilkan: _MENU_",
                    "search": "",
                    "searchPlaceholder": "Cari admin",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "paginate": {
                        "first": "<span class='pagination-icon-wrapper'><i class='fas fa-angle-double-left'></i></span>",
                        "last": "<span class='pagination-icon-wrapper'><i class='fas fa-angle-double-right'></i></span>",
                        "next": "<span class='pagination-icon-wrapper'><i class='fas fa-angle-right'></i></span>",
                        "previous": "<span class='pagination-icon-wrapper'><i class='fas fa-angle-left'></i></span>"
                    }
                },
                "pagingType": "full_numbers",
                "responsive": true,
                "dom": '<"flex justify-between items-center mb-4"lf>rt<"flex justify-between items-center mt-4"ip>',
                "initComplete": function() {
                    $('.dataTables_filter input').attr('placeholder', 'Cari nama/email...');
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3;
                    }).remove();
                }
            });

            // Add event listener for add admin button
            $('#tambahAdminBtn').on('click', function() {
                openTambahModal();
            });

            // Add event listener for confirm delete button
            $('#confirmDeleteBtn').on('click', confirmDelete);

            // Event handler for edit and delete buttons using event delegation
            $('#adminTable').on('click', '.edit-btn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const email = $(this).data('email');
                const role = $(this).data('role');
                openEditModal(id, name, email, role);
            });

            $('#adminTable').on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                const row = $(this).closest('tr');
                const name = row.find('td:eq(1)').text();
                const email = row.find('td:eq(2)').text();
                openDeleteModal(id, name, email);
            });

            // Function to generate random avatar color
            function getRandomAvatarColor() {
                const colors = [
                    'bg-red-500', 'bg-blue-500', 'bg-green-500', 
                    'bg-yellow-500', 'bg-purple-500', 'bg-pink-500',
                    'bg-indigo-500', 'bg-teal-500', 'bg-orange-500'
                ];
                return colors[Math.floor(Math.random() * colors.length)];
            }

            // Function to get initials from name
            function getInitials(name) {
                const names = name.split(' ');
                let initials = names[0].substring(0, 1).toUpperCase();
                
                if (names.length > 1) {
                    initials += names[names.length - 1].substring(0, 1).toUpperCase();
                }
                
                return initials;
            }

            // Load admin data
            window.loadAdminData = function() {
                if (token) {
                    $.ajax({
                        url: '{{ config('app.API_URL') }}/api/get/admin',
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
                                    // Create avatar with initials
                                    const avatarColor = getRandomAvatarColor();
                                    const initials = getInitials(item.name);
                                    
                                    const emailWithAvatar = `
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full ${avatarColor} flex items-center justify-center text-white font-semibold mr-3">
                                                ${initials}
                                            </div>
                                            <div>
                                                ${item.email}
                                            </div>
                                        </div>
                                    `;

                                    const deleteButton = `<button type="button" class="text-red-500 delete-btn" data-id="${item.id}"> <img src="/images/DeleteBtn.png" alt="Delete"></button>`;
                                    const editButton = `<button type="button" class="text-blue-500 mx-1 edit-btn" data-id="${item.id}" data-name="${item.name}" data-email="${item.email}" data-role="${item.roles}"><img src="/images/UpdateBtn.png" alt="Update"></button>`;
                                    

                                    table.row.add([
                                        index + 1,
                                        item.name,
                                        emailWithAvatar,
                                        item.roles,
                                        `<div class="flex items-center justify-start">${deleteButton}${editButton}</div>`
                                    ]).draw(false);
                                });
                            } else {
                                console.error('Error in API response:', response.message || 'Invalid data format');
                                if (response.message) {
                                    showErrorToast('Gagal memuat data admin: ' + response.message);
                                }
                            }
                        },
                        error: function(xhr) {
                            console.error('AJAX error:', xhr.responseText);
                            showErrorToast('Terjadi kesalahan saat mengambil data admin');
                        }
                    });
                } else {
                    console.error('Token not found');
                    showErrorToast('Tidak dapat mengakses data. Silakan login kembali.');
                    // Redirect to login page
                    window.location.href = '/login';
                }
            };

            // Load admin data initially
            loadAdminData();

            // Handle Add Admin form submission
            $('#tambahAdminForm').submit(function(e) {
                e.preventDefault();

                let username = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let confirmPassword = $('#confirmPassword').val();

                if (password === confirmPassword) {
                    $.ajax({
                        url: '{{ config('app.API_URL') }}/api/register/admin',
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
                            showSuccessToast('Admin berhasil ditambahkan!');
                            $('#tambahAdminForm')[0].reset();
                            closeTambahModal();
                            // Reload halaman setelah 1 detik
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        },
                        error: function(xhr) {
                            let errorMessage = 'Registrasi gagal';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.responseText) {
                                errorMessage = xhr.responseText || 'An error occurred';
                            }
                            console.log('Registrasi gagal:', errorMessage);
                            showErrorToast('Registrasi gagal: ' + errorMessage);
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    });
                } else {
                    showErrorToast("Password yang dimasukkan tidak cocok");
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
                    url: `{{ config('app.API_URL') }}/api/update/admin/${userId}`,
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
                        showSuccessToast('Admin berhasil diperbarui!');
                        closeEditModal();
                        // Reload halaman setelah 1 detik
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                    error: function(xhr) {
                        let errorMessage = 'Update gagal';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText || 'An error occurred';
                        }
                        console.log('Update gagal:', errorMessage);
                        showErrorToast('Update gagal: ' + errorMessage);
                        setTimeout(() => window.location.reload(), 1000);
                    }
                });
            });
        });
    </script>
</body>
</html>