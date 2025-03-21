<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Daftar Tanah Kalurahan Umbulharjo
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-[#F6F9EE]">
  <!-- Navbar -->
  @include('components.navbar')
  
  <main class="container mx-auto mt-6">
   <div class="bg-white shadow-md rounded-lg p-4">
    <div class="flex items-center justify-between mb-4">
     <button class="bg-blue-500 text-white px-4 py-2 rounded">
      <i class="fas fa-arrow-left">
      </i>
      Kembali
     </button>
     <h2 class="text-xl font-semibold">
      Pulihkan Data Tanah
     </h2>
     <div class="flex items-center space-x-2">
      <label class="text-gray-700" for="entries">
       Tampilkan:
      </label>
      <select class="border border-gray-300 rounded px-2 py-1" id="entries">
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
      <input class="border border-gray-300 rounded px-2 py-1" placeholder="Cari Tanah" type="text"/>
     </div>
    </div>
    <table class="w-full border-collapse border border-gray-300">
     <thead>
      <tr class="bg-gray-200">
       <th class="border border-gray-300 px-4 py-2">
        NO
       </th>
       <th class="border border-gray-300 px-4 py-2">
        NAMA TANAH
       </th>
       <th class="border border-gray-300 px-4 py-2">
        DIHAPUS OLEH
       </th>
       <th class="border border-gray-300 px-4 py-2">
        TANGGAL DIHAPUS
       </th>
       <th class="border border-gray-300 px-4 py-2">
        AKSI
       </th>
      </tr>
     </thead>
     <tbody>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        1
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin1
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        2
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin1
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        3
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin3
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        4
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin1
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        5
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin1
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        6
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin2
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        7
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin3
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        8
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin3
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
      <tr class="hover:bg-gray-100">
       <td class="border border-gray-300 px-4 py-2 text-blue-500">
        9
       </td>
       <td class="border border-gray-300 px-4 py-2">
        Nama Tanah
       </td>
       <td class="border border-gray-300 px-4 py-2">
        admin2
       </td>
       <td class="border border-gray-300 px-4 py-2">
        19/09/24
       </td>
       <td class="border border-gray-300 px-4 py-2 text-center">
        <i class="fas fa-undo text-blue-500 cursor-pointer">
        </i>
        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
        </i>
       </td>
      </tr>
     </tbody>
    </table>
    <div class="flex items-center justify-between mt-4">
     <span class="text-gray-700">
      Menampilkan 1 hingga 10 dari 50 entri
     </span>
     <div class="flex items-center space-x-2">
      <button class="px-3 py-1 border border-gray-300 rounded">
       &lt;&lt;
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       &lt;
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded bg-blue-500 text-white">
       1
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       ...
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       5
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       &gt;
      </button>
      <button class="px-3 py-1 border border-gray-300 rounded">
       &gt;&gt;
      </button>
     </div>
    </div>
   </div>
  </main>
 </body>
</html>
