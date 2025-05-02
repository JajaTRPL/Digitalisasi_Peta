<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Daftar Tanah Kalurahan Umbulharjo
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-[#F6F9EE]">
    <!-- Navbar -->
    @include('components.navbar')

    <main class="container mx-auto mt-6">
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex items-center justify-between mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="history.back()">
                    <i class="fas fa-arrow-left">
                    </i>
                    Kembali
                </button>
                <h2 class="text-xl font-semibold">
                    Pulihkan Data Tanah
                </h2>
                <input class="border border-gray-300 rounded px-2 py-1" placeholder="Cari Tanah" type="text" />
            </div>

            <table class="w-full border-collapse border border-gray-300" id="deletedGroundTable">
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
                <tbody></tbody>
            </table>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready(function () {
            const token = localStorage.getItem('token');
            const user = JSON.parse(localStorage.getItem('userData'));


            $('#deletedGroundTable').DataTable();

            if (token) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/get/deleted-ground',
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('Full API response:', response);

                        if (response.status === 'success') {
                            const table = $('#deletedGroundTable').DataTable();

                            response.data.forEach(item => {
                                table.row.add([
                                    item.detail_tanah_id,
                                    item.nama_tanah,
                                    `<p>user</p>`,
                                    item.deleted_at ?? '-',
                                    `
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <i class="fas fa-undo text-blue-500 cursor-pointer">
                                        </i>
                                        <i class="fas fa-info-circle text-gray-500 cursor-pointer ml-2">
                                        </i>
                                    </td>
                                    `
                                ]).draw(false);
                            });
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>
