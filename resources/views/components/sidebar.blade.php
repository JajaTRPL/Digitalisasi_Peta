<div id="sidebar" class="bg-[#F5F5F5] shadow-md h-screen flex flex-col w-1/5">
    <div class="flex items-center justify-between p-4 border-b">
        <span class="text-lg font-semibold">
            Ground Kelurahan
        </span>
        <button id="toggleSidebar">
            <img src="{{ asset('images/Sidebar.png') }}" alt="Toggle Sidebar" class="w-6 h-6">
        </button>
    </div>
    <div class="p-4" id="select-container">
        <label class="block text-sm font-medium text-gray-700" for="sort">
            Urutkan Berdasarkan:
        </label>
        <select
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            id="sort" name="sort">
            <option value="asc">Asc</option>
            <option value="desc">Desc</option>
        </select>
    </div>

    <div class="overflow-y-auto flex-1">
        <ul id="ground-list">
            @foreach ($dataGround as $ground)
                <li class="p-4 border-b cursor-pointer hover:bg-gray-100">{{ $ground->nama_asset }}</li>
            @endforeach
        </ul>
    </div>
</div>