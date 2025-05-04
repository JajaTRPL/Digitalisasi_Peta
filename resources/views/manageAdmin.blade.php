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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css" />
</head>

<body class="bg-[#F6F9EE]">
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <button id="tambahAdminBtn" class="bg-[#666CFF] text-white px-5 py-2 rounded">
                    Tambah Admin
                </button>
                <div class="flex items-center space-x-2">
                    <label class="text-gray-700" for="entries">
                        Tampilkan:
                    </label>
                    <select class="border border-gray-300 rounded px-3 py-2" id="entries">
                        <option value="10">
                            10
                        </option>
                        <option value="25">
                            25
                        </option>
                        <option value="50">
                            50
                        </option>
                    </select>
                    <input class="border border-gray-300 rounded px-2 py-1" placeholder="Cari Admin" type="text" />
                </div>
            </div>
            <table class="w-full text-left" id="adminTable">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4">
                            #
                        </th>
                        <th class="py-2 px-4">
                            NAMA
                        </th>
                        <th class="py-2 px-4">
                            EMAIL
                        </th>
                        <th class="py-2 px-4">
                            PERAN
                        </th>
                        <th class="py-2 px-4">
                            AKSI
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="popup-overlay z-[999999]" id="popupOverlay">
        <div class="popup-container" id="popupContainer">
            <div class="popup-header">
                <h2>Tambah Admin</h2>
                <button class="close-btn" id="closePopupBtn">&times;</button>
            </div>
            <div class="popup-content">
                <form id="tambahAdminForm">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" id="cancelBtn">Batal</button>
                        <button type="submit" class="btn btn-submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="popup-overlay z-[999999]" id="editPopupOverlay">
        <div class="popup-container" id="editPopupContainer">
            <div class="popup-header">
                <h2>Edit Admin</h2>
                <button class="close-btn" id="closeEditPopupBtn">&times;</button>
            </div>
            <div class="popup-content">
                <form id="editAdminForm">
                    <div class="form-group">
                        <label for="editName">Nama</label>
                        <input type="text" id="editName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editRole">Peran</label>
                        <select id="editRole" name="role" class="w-full p-2 border border-gray-300 rounded">
                            <option value="admin">Admin</option>
                            <option value="super admin">Super Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Password (Biarkan kosong jika tidak ingin mengubah)</label>
                        <input type="password" id="editPassword" name="password">
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" id="cancelEditBtn">Batal</button>
                        <button type="submit" class="btn btn-submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Get DOM elements
    const tambahAdminBtn = document.getElementById('tambahAdminBtn');
    const popupOverlay = document.getElementById('popupOverlay');
    const popupContainer = document.getElementById('popupContainer');
    const closePopupBtn = document.getElementById('closePopupBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const adminForm = document.getElementById('adminForm');

    // Show popup when Tambah Admin button is clicked
    tambahAdminBtn.addEventListener('click', function() {
        popupOverlay.style.display = 'block';
        setTimeout(() => {
            popupContainer.classList.add('popup-active');
        }, 10);
    });

    // Close popup functions
    function closePopup() {
        popupContainer.classList.remove('popup-active');
        setTimeout(() => {
            popupOverlay.style.display = 'none';
        }, 300);
    }

    // Close popup when close button is clicked
    closePopupBtn.addEventListener('click', closePopup);

    // Close popup when cancel button is clicked
    cancelBtn.addEventListener('click', closePopup);

    // Close popup when clicking outside the popup
    popupOverlay.addEventListener('click', function(e) {
        if (e.target === popupOverlay) {
            closePopup();
        }
    });

    // Edit Popup functionality
    const editButtons = document.querySelectorAll('.fa-edit');
    const editPopupOverlay = document.getElementById('editPopupOverlay');
    const editPopupContainer = document.getElementById('editPopupContainer');
    const closeEditPopupBtn = document.getElementById('closeEditPopupBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');
    const editAdminForm = document.getElementById('editAdminForm');

    // Function to open edit popup with user data
    function openEditPopup(userData) {
        document.getElementById('editName').value = userData.name;
        document.getElementById('editEmail').value = userData.email;
        document.getElementById('editRole').value = userData.role.toLowerCase();

        editPopupOverlay.style.display = 'block';
        setTimeout(() => {
            editPopupContainer.classList.add('popup-active');
        }, 10);
    }

    // Close edit popup functions
    function closeEditPopup() {
        editPopupContainer.classList.remove('popup-active');
        setTimeout(() => {
            editPopupOverlay.style.display = 'none';
        }, 300);
    }

    // Add click event to all edit buttons
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get user data from the table row
            const row = this.closest('tr');
            const userData = {
                name: row.querySelector('.font-bold').textContent.trim(),
                email: row.querySelector('.text-gray-500').textContent.trim(),
                role: row.querySelector('td:nth-child(3)').textContent.trim()
            };

            openEditPopup(userData);
        });
    });

    // Close edit popup when close button is clicked
    closeEditPopupBtn.addEventListener('click', closeEditPopup);

    // Close edit popup when cancel button is clicked
    cancelEditBtn.addEventListener('click', closeEditPopup);

    // Close edit popup when clicking outside the popup
    editPopupOverlay.addEventListener('click', function(e) {
        if (e.target === editPopupOverlay) {
            closeEditPopup();
        }
    });

    // Edit form submission
    editAdminForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Here you would typically send the updated data to a server
        const formData = {
            name: document.getElementById('editName').value,
            email: document.getElementById('editEmail').value,
            role: document.getElementById('editRole').value,
            password: document.getElementById('editPassword').value
        };

        console.log('Edit form submitted:', formData);
        alert('Perubahan berhasil disimpan!');
        editAdminForm.reset();
        closeEditPopup();

        // In a real application, you would update the table row here
    });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));

            const table = $('#adminTable').DataTable();

            function loadAdminData() {
                if (token) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/get/admin',
                        type: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + token
                        },
                        success: function (response) {
                            if (response.status === 'success' && Array.isArray(response.data)) {
                                table.clear();

                                response.data.forEach(item => {
                                    table.row.add([
                                        item.id,
                                        item.name,
                                        item.email,
                                        item.roles,
                                        `
                                        <a class="text-gray-500 mx-1 edit-btn" data-id="${item.id}" data-name="${item.name}" data-email="${item.email}" data-role="${item.roles}">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button type="button" class="text-gray-500 mx-1 delete-btn" data-id="${item.id}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        `
                                    ]);
                                });
                                table.draw(false);
                            } else {
                                console.warn('Data tidak ditemukan atau format salah.');
                            }
                        },
                        error: function (xhr) {
                            console.error('Gagal mengambil data:', xhr.responseText);
                        }
                    });
                }
            }

            loadAdminData();
            setInterval(loadAdminData, 5000);
        });
    </script>

    <script>
        $('#tambahAdminForm').submit(function(e){
            e.preventDefault();

            let username = $('input[name="name"]').val();
            let email = $('input[name="email"]').val();
            let password = $('input[name="password"]').val();
            let confirmPassword = $('input[name="confirmPassword"]').val();

            if(password === confirmPassword){
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
                    xhrFields: {
                        withCredentials: true
                    },
                    crossDomain: true,
                    success: function(response){
                        console.log(response);
                        alert('Admin berhasil ditambahkan!');
                        tambahAdminForm.reset();
                        closePopup();
                    },
                    error: function(xhr) {
                        let errorMessage = 'Registrasi gagal';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText || 'An error occurred';
                        }
                        console.log('Registrasi gagal:', errorMessage);
                    }
                })
            } else {
                alert("password yang dimasukkan tidak cocok")
            }
        })
    </script>
</body>

</html>
