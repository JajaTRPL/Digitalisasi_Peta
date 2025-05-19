<!-- Edit Admin Modal (Right Side) -->
    <div id="editAdminModal" class="modal-right z-[999999999]">
        <div class="modal-header">
            <h3 class="text-lg font-semibold">Edit Admin</h3>
            <button class="text-gray-500 hover:text-gray-700" onclick="closeEditModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editAdminForm" class="space-y-4">
                <input type="hidden" id="editUserId">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="editName" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>
                <div>
                    <label for="editRole" class="block text-sm font-medium text-gray-700">Peran</label>
                    <select id="editRole" name="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="admin">Admin</option>
                        <option value="super admin">Super Admin</option>
                    </select>
                </div>
                <div>
                    <label for="editPassword" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" id="editPassword" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="flex space-x-3 justify-end pt-4">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-[#666CFF] text-white rounded-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>