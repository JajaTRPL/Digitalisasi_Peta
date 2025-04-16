<html lang="en">
 <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
      Daftar Pengguna Website
    </title>
    @vite(['resources/css/Admin.css'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
                <input class="border border-gray-300 rounded px-2 py-1" placeholder="Cari Admin" type="text"/>
            </div>
        </div>
        <table class="w-full text-left">
        <thead>
            <tr class="bg-gray-100">
            <th class="py-2 px-4">
                #
            </th>
            <th class="py-2 px-4">
                NAMA
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
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4910
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Jordan Stevenson
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4909
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Richard Payne
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        super admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4908
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Jennifer Summers
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        super admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4907
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Mr. Justin Richardson
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4906
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Nicholas Tanner
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4905
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Crystal Mays
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4904
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Mary Garcia
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="border-b">
       <td class="py-2 px-4 text-blue-500">
        #4903
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Megan Roberts
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        super admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr>
       <td class="py-2 px-4 text-blue-500">
        #4902
       </td>
       <td class="py-2 px-4 flex items-center">
        <img alt="User Avatar" class="w-8 h-8 rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/DkJMRZ69t_bhHwLg_L7KSb5fjK84HI1wXhl3EdpVxcs.jpg" width="30"/>
        <div>
         <div class="font-bold">
          Joseph Oliver
         </div>
         <div class="text-gray-500 text-sm">
          Layne_Kuvalis@gmail.com
         </div>
        </div>
       </td>
       <td class="py-2 px-4">
        admin
       </td>
       <td class="py-2 px-4">
        <i class="fas fa-trash-alt text-gray-500 cursor-pointer">
        </i>
        <i class="fas fa-edit text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
     </tbody>
    </table>
    <div class="flex items-center justify-between mt-4">
     <div class="text-gray-600">
      Menampilkan 1 hingga 10 dari 50 entri
     </div>
     <div class="flex items-center space-x-2">
      <button class="px-2 py-1 border border-gray-300 rounded">
       &lt;
      </button>
      <button class="px-2 py-1 border border-gray-300 rounded bg-blue-500 text-white">
       1
      </button>
      <button class="px-2 py-1 border border-gray-300 rounded">
       ...
      </button>
      <button class="px-2 py-1 border border-gray-300 rounded">
       5
      </button>
      <button class="px-2 py-1 border border-gray-300 rounded">
       &gt;
      </button>
     </div>
    </div>
   </div>
  </div>

  <div class="popup-overlay z-[999999]" id="popupOverlay" >
    <div class="popup-container" id="popupContainer">
        <div class="popup-header">
            <h2>Tambah Admin</h2>
            <button class="close-btn" id="closePopupBtn">&times;</button>
        </div>
        <div class="popup-content">
            <form id="adminForm">
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
    
    // Form submission
    adminForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Here you would typically send the data to a server
        // For demo purposes, we'll just log it and close the popup
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        };
        
        console.log('Form submitted:', formData);
        alert('Admin berhasil ditambahkan!');
        adminForm.reset();
        closePopup();
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
 </body>
</html>
