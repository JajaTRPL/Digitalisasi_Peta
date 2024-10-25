<html>
 <head>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-green-50">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
            </div>
            <div class="items-center flex space-x-4">
                <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-black">Dashboard</a>
                <a href="{{route('ViewPeta')}}" class="text-blue-500 hover:text-black">Maps</a>
                @if(auth()->user()->hasRole('superAdmin'))
                <a href="#" class="text-blue-500 hover:text-black">Manage Admin</a>
                @endif
                <a href="{{route('ManageGround')}}" class="text-black-500 hover:text-black">Manage Ground</a>
                <div class="relative inline-block text-left">
                    <img src="{{ asset('images/Avatar.png') }}" alt="Profile" class="profile-avatar cursor-pointer w-10 h-10 rounded-full">

                    <div class="dropdown-content absolute right-0 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
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
  <div class="container mx-auto mt-10">
   <div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.location.href='/AddGround'">
        + Add Ground
    </button>
     <div class="flex items-center space-x-4">
      <label class="text-gray-700" for="show">
       Show:
      </label>
      <select class="border border-gray-300 rounded px-2 py-1" id="show">
       <option>
        10
       </option>
       <option>
        25
       </option>
       <option>
        50
       </option>
      </select>
      <input class="border border-gray-300 rounded px-4 py-2" placeholder="Search User" type="text"/>
     </div>
    </div>
    <table class="min-w-full bg-white">
     <thead>
      <tr>
       <th class="py-2">
        #
       </th>
       <th class="py-2">
        NAME GROUND
       </th>
       <th class="py-2">
        UPDATED AT
       </th>
       <th class="py-2">
        ACTION
       </th>
      </tr>
     </thead>
     <tbody>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4910
        </a>
       </td>
       <td class="py-2">
        Ground 1
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4909
        </a>
       </td>
       <td class="py-2">
        Ground 2
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4908
        </a>
       </td>
       <td class="py-2">
        Ground 3
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4907
        </a>
       </td>
       <td class="py-2">
        Ground 4
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4906
        </a>
       </td>
       <td class="py-2">
        Ground 5
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4905
        </a>
       </td>
       <td class="py-2">
        Ground 6
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4904
        </a>
       </td>
       <td class="py-2">
        Ground 7
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4903
        </a>
       </td>
       <td class="py-2">
        Ground 8
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
      <tr class="border-t">
       <td class="py-2">
        <a class="text-blue-500" href="#">
         #4902
        </a>
       </td>
       <td class="py-2">
        Ground 9
       </td>
       <td class="py-2">
        19/09/24
       </td>
       <td class="py-2">
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-pen">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-trash">
         </i>
        </a>
        <a class="text-gray-500 mx-1" href="#">
         <i class="fas fa-eye">
         </i>
        </a>
       </td>
      </tr>
     </tbody>
    </table>
    <div class="flex items-center justify-between mt-4">
     <p class="text-gray-600">
      Showing 1 to 10 of 50 entries
     </p>
     <div class="flex items-center space-x-2">
      <button class="px-3 py-1 border border-gray-300 rounded">
       &lt;
      </button>
      <button class="px-3 py-1 bg-blue-500 text-white rounded">
       1
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       2
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       3
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       4
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       5
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       &gt;
      </button>
     </div>
    </div>
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
