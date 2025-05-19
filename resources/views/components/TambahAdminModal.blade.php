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
                    <button type="submit" class="px-4 py-2 bg-[#666CFF] text-white rounded-md">Tambah</button>
                </div>
            </form>
        </div>
    </div>