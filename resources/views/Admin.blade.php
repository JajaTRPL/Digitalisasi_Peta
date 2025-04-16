<html lang="en">
 <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
    Daftar Pengguna Website
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Popup Styles */
        .popup-overlay {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,0.5);
          z-index: 1000;
        }
        
        .popup-container {
          position: fixed;
          top: 0;
          right: 0;
          width: 400px;
          height: 100%;
          background-color: white;
          box-shadow: -2px 0 5px rgba(0,0,0,0.2);
          overflow-y: auto;
          transform: translateX(100%);
          transition: transform 0.3s ease-out;
        }
        
        .popup-header {
          padding: 15px;
          border-bottom: 1px solid #eee;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        
        .popup-content {
          padding: 20px;
        }
        
        .close-btn {
          background: none;
          border: none;
          font-size: 20px;
          cursor: pointer;
          color: #777;
        }
        
        .form-group {
          margin-bottom: 15px;
        }
        
        .form-group label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
        }
        
        .form-group input {
          width: 100%;
          padding: 8px;
          border: 1px solid #ddd;
          border-radius: 4px;
          box-sizing: border-box;
        }
        
        .form-actions {
          display: flex;
          justify-content: flex-end;
          gap: 10px;
          margin-top: 20px;
        }
        
        .btn {
          padding: 8px 15px;
          border-radius: 4px;
          cursor: pointer;
        }
        
        .btn-submit {
          background-color: #4CAF50;
          color: white;
          border: none;
        }
        
        .btn-cancel {
          background-color: #f44336;
          color: white;
          border: none;
        }
        
        /* When popup is active */
        .popup-active {
          transform: translateX(0);
        }
      </style>
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
</script>
 </body>
</html>
