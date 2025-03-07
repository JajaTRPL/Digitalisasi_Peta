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
 <body class="bg-green-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 ">
                <h1 class="text-2xl font-semibold font-poppins">Daftar Pengguna Website</h1>
            </div>
            <div class="items-center flex space-x-4">
                @if(auth()->user()->hasRole('guest'))
                    <a href="{{route('dashboard')}}" class="text-[#666CFF] hover:text-black text-[20px]">Dashboard</a>
                    <a href="{{route('ViewPeta')}}" class="text-[#666CFF] hover:text-black text-[20px]">Maps</a>
                @elseif (auth()->user()->hasRole('superAdmin') || auth()->user()->hasRole('admin'))
                    <a href="{{route('dashboard')}}" class="text-[#666CFF] hover:text-black text-[20px]">Dashboard</a>
                    <a href="{{route('ViewPeta')}}" class="text-[#666CFF] hover:text-black text-[20px]">Maps</a>
                    @if(auth()->user()->hasRole('superAdmin'))
                        <a href="#" class="text-[#666CFF] hover:text-black text-[20px]">Manage Admin</a>
                    @endif
                    <a href="{{route('ManageGround')}}" class="text-[#666CFF] hover:text-black text-[20px]">Manage Ground</a>
                @endif

                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                    <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-blue-50 hover:bg-blue-200 hover:text-blue-800 rounded-md transition duration-200 ease-in-out">
                                <svg class="w-4 h-4 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a6 6 0 016 6 5.989 5.989 0 01-3.6 5.48c-.227.11-.34.366-.25.6l1.94 4.86a1 1 0 01-.92 1.4H5.83a1 1 0 01-.92-1.4l1.94-4.86c.09-.234-.023-.49-.25-.6A5.99 5.99 0 014 8a6 6 0 016-6z"></path>
                                </svg>
                                {{-- {{$currentUser}} --}}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
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
