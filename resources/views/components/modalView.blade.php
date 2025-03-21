<div id="{{ $id }}" class="modal">
    <div class="modal-content bg-white rounded-lg shadow-lg overflow-hidden p-6">
        <!-- Modal Header with Image -->
        <div class="relative mb-4">
            <img id="{{ $id }}LandPhoto" src="" alt="Foto Tanah" class="w-full h-64 object-cover rounded-md">
        </div>

        <!-- Modal Body with Information -->
        <h2 class="text-2xl font-semibold mb-4">{{ $title }}</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="font-semibold">Nama:</p>
                <p id="{{ $id }}LandName">-</p>
            </div>
            <div>
                <p class="font-semibold">Nomor Asset:</p>
                <p id="{{ $id }}LandNumber">-</p>
            </div>
            <div>
                <p class="font-semibold">Alamat:</p>
                <p id="{{ $id }}LandAddress">-</p>
            </div>
            <div>
                <p class="font-semibold">Status Kepemilikan:</p>
                <p id="{{ $id }}OwnershipStatus">-</p>
            </div>
            <div>
                <p class="font-semibold">Tipe Tanah:</p>
                <p id="{{ $id }}LandOwnership">-</p>
            </div>
            <div>
                <p class="font-semibold">Luas Tanah:</p>
                <p id="{{ $id }}LandArea">-</p>
            </div>
            <div>
                <p class="font-semibold">Longtitude:</p>
                <p id="{{ $id }}Longtitude">-</p>
            </div>
            <div>
                <p class="font-semibold">Nomor Sertifikat:</p>
                <p id="{{ $id }}NumberSertif">-</p>
            </div>
        </div>

        <!-- Modal Footer with Close Button -->
        <div class="flex justify-center mt-5">
            <button id="close{{ ucfirst($id) }}Modal" class="px-4 py-2 bg-red-500 text-white rounded-md">Tutup</button>
        </div>
    </div>
</div>