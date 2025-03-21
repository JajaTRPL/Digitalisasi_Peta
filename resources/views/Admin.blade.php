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
 </head>
 <body class="bg-[#F6F9EE]">
    <!-- Navbar -->
    @include('components.navbar')
  
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
            <button class="bg-[#666CFF] text-white px-5 py-2 rounded">
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
 </body>
</html>
