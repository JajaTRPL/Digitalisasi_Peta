@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-[#F6F9EE] ">
    <div class="bg-white p-8 rounded-lg shadow-lg w-auto">
        <div class="flex flex-col items-center justify-center">
            <p class="text-[#000000] text-[30px] font-bold mb-4 font-poppins">Daftar</p>
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-[#262B43E5] text-2xl font-semibold mb-2 font-poppis">Peta Digital Kelurahan Umbulharjo</h1>
        </div>
        <form id="regisForm">
            <!-- Name -->
            {{-- <div class="mb-4">
            <input id="fullname" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="name" placeholder="Nama Lengkap" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div> --}}

            <div class="mb-4">
            <input id="username" type="text" name="username" :value="old('username')" required autofocus autocomplete="name" placeholder="Nama Pengguna" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
            <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="email" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg pr-10">
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'eye-icon-password', 'eye-slash-password')">
                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path d="M3.293 3.293a1 1 0 011.414 0L16.707 15.293a1 1 0 01-1.414 1.414L3.293 4.707a1 1 0 010-1.414zm4.547 4.547l1.415 1.415A3.001 3.001 0 0110 13a3.001 3.001 0 01-1.999-.757z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 relative">
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Confirmation Password" class="w-full p-3 border border-gray-300 rounded-lg pr-10">
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password_confirmation', 'eye-icon-confirm', 'eye-slash-confirm')">
                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path d="M3.293 3.293a1 1 0 011.414 0L16.707 15.293a1 1 0 01-1.414 1.414L3.293 4.707a1 1 0 010-1.414zm4.547 4.547l1.415 1.415A3.001 3.001 0 0110 13a3.001 3.001 0 01-1.999-.757z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <button class="w-full bg-[#666CFF] text-white p-3 rounded-lg hover:bg-blue-700" type="submit">
                Daftar
            </button>

            <div class="flex items-center justify-center mb-4 mt-4 text-center">
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">
                    {{ __('Sudah memiliki akun?') }}
                </a>
                <a class="text-sm text-[#666CFF] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Masuk') }}
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, eyeId, slashId) {
        // Cari elemen input password, ikon mata terbuka, dan ikon mata tertutup
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);
        const eyeSlash = document.getElementById(slashId);

        // Debugging: Log ID dan elemen yang ditemukan
        console.log("Memanggil togglePassword dengan:");
        console.log("Input ID:", inputId, "Elemen:", passwordInput);
        console.log("Eye Icon ID:", eyeId, "Elemen:", eyeIcon);
        console.log("Eye Slash ID:", slashId, "Elemen:", eyeSlash);

        // Jika elemen tidak ditemukan, tampilkan pesan error dan hentikan fungsi
        if (!passwordInput || !eyeIcon || !eyeSlash) {
            console.error("Error: Salah satu elemen tidak ditemukan!");
            return;
        }

        // Toggle visibility password
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text'; // Tampilkan password
            eyeSlash.style.display = "block"; // Tampilkan ikon mata tertutup
            eyeIcon.style.display = "none"; // Sembunyikan ikon mata terbuka
        } else {
            passwordInput.type = 'password'; // Sembunyikan password
            eyeSlash.style.display = "none"; // Sembunyikan ikon mata tertutup
            eyeIcon.style.display = "block"; // Tampilkan ikon mata terbuka
        }
    }
</script>

<script>
    $('#regisForm').submit(function(e) {
        e.preventDefault();

        let username = $('input[name="username"]').val();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();

        console.log('username: ', username);
        console.log('email: ', email);

        if(password === confirmPassword){
            $.ajax({
                url: 'http://127.0.0.1:8000/api/register/guest',
                type: 'POST',
                data: JSON.stringify({
                    name: username,
                    email: email,
                    password: password
                }),
                contentType: 'application/json',
                dataType: 'json',
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function(response){
                    console.log('Regis berhasil!', response);
                    localStorage.setItem('token', response.access_token);
                    window.location.href = 'login';
                },
                error: function(xhr) {
                    let errorMessage = 'Registrasi gagal';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        errorMessage = xhr.responseText || 'An error occurred';
                    }
                    console.log('Login gagal:', errorMessage);
                }
            })
        } else {
            alert("password yang dimasukkan tidak cocok")
        }

    })
</script>



@endsection
