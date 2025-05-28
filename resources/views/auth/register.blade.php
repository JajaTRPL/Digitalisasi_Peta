@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-[#F6F9EE]">
    <div class="bg-white p-8 rounded-lg shadow-lg w-auto">
        <div class="flex flex-col items-center justify-center">
            <p class="text-[#000000] text-[30px] font-bold mb-4 font-poppins">Daftar</p>
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-[#262B43E5] text-2xl font-semibold mb-2 font-poppins">Peta Digital Kelurahan Umbulharjo</h1>
        </div>
        <form id="regisForm">
            <!-- Username -->
            <div class="mb-4">
                <input id="username" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Nama Pengguna" class="w-full p-3 border border-gray-300 rounded-lg transition duration-300 focus:border-[#666CFF] focus:ring focus:ring-[#666CFF] focus:ring-opacity-50">
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autocomplete="email" class="w-full p-3 border border-gray-300 rounded-lg transition duration-300 focus:border-[#666CFF] focus:ring focus:ring-[#666CFF] focus:ring-opacity-50">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4 relative">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg pr-10 transition duration-300 focus:border-[#666CFF] focus:ring focus:ring-[#666CFF] focus:ring-opacity-50">
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'eye-icon-password', 'eye-slash-password')">
                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition duration-300 hover:text-[#666CFF]" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition duration-300 hover:text-[#666CFF]" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path d="M3.293 3.293a1 1 0 011.414 0L16.707 15.293a1 1 0 01-1.414 1.414L3.293 4.707a1 1 0 010-1.414zm4.547 4.547l1.415 1.415A3.001 3.001 0 0110 13a3.001 3.001 0 01-1.999-.757z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 relative">
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Konfirmasi Password" class="w-full p-3 border border-gray-300 rounded-lg pr-10 transition duration-300 focus:border-[#666CFF] focus:ring focus:ring-[#666CFF] focus:ring-opacity-50">
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password_confirmation', 'eye-icon-confirm', 'eye-slash-confirm')">
                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition duration-300 hover:text-[#666CFF]" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition duration-300 hover:text-[#666CFF]" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path d="M3.293 3.293a1 1 0 011.414 0L16.707 15.293a1 1 0 01-1.414 1.414L3.293 4.707a1 1 0 010-1.414zm4.547 4.547l1.415 1.415A3.001 3.001 0 0110 13a3.001 3.001 0 01-1.999-.757z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <div class="mb-4">
                <button id="registerButton" class="w-full bg-[#666CFF] text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300" type="submit">
                    <span id="registerText" class="relative z-10">Daftar</span>
                    <span id="registerSpinner" class="absolute inset-0 flex items-center justify-center hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="flex items-center justify-center mb-4 mt-4 text-center">
                <span class="text-sm text-gray-600 mr-2">
                    {{ __('Sudah memiliki akun?') }}
                </span>
                <a href="{{ route('login') }}" id="loginLink" class="text-sm text-[#666CFF] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 relative">
                    <span id="loginText" class="relative z-10">{{ __('Masuk') }}</span>
                    <span id="loginSpinner" class="absolute inset-0 flex items-center justify-center hidden">
                        <svg class="animate-spin h-4 w-4 text-[#666CFF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Loading Overlay untuk Transisi -->
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <div class="bg-white p-8 rounded-lg shadow-xl text-center">
        <svg class="animate-spin h-12 w-12 text-[#666CFF] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p class="text-lg font-semibold">Memproses...</p>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword(inputId, eyeIconId, eyeSlashId) {
        const input = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeIconId);
        const eyeSlash = document.getElementById(eyeSlashId);
        
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.style.display = 'none';
            eyeSlash.style.display = 'block';
        } else {
            input.type = 'password';
            eyeIcon.style.display = 'block';
            eyeSlash.style.display = 'none';
        }
    }

    // Show loading state - untuk transisi
    function showLoading(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            const text = element.querySelector(`#${elementId}Text`);
            const spinner = element.querySelector(`#${elementId}Spinner`);
            
            if (text) text.classList.add('opacity-0');
            if (spinner) spinner.classList.remove('hidden');
            
            // Disable element
            element.disabled = true;
        }
        
        // Show loading overlay
        document.getElementById('loadingOverlay').classList.remove('hidden');
    }

    // Hide loading state
    function hideLoading(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            const text = element.querySelector(`#${elementId}Text`);
            const spinner = element.querySelector(`#${elementId}Spinner`);
            
            if (text) text.classList.remove('opacity-0');
            if (spinner) spinner.classList.add('hidden');
            
            // Enable element
            element.disabled = false;
        }
        
        // Hide loading overlay
        document.getElementById('loadingOverlay').classList.add('hidden');
    }

    // Form submission handler
    $('#regisForm').submit(function(e) {
        e.preventDefault();
        showLoading('register');

        let username = $('input[name="username"]').val();
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();

        // Password validation
        if(password.length < 8) {
            hideLoading('register');
            Swal.fire({
                icon: 'error',
                title: 'Password Terlalu Pendek',
                text: 'Password harus memiliki minimal 8 karakter',
                confirmButtonColor: '#666CFF',
            });
            return false;
        }

        // Password confirmation validation
        if(password !== confirmPassword) {
            hideLoading('register');
            Swal.fire({
                icon: 'error',
                title: 'Password Tidak Cocok',
                text: 'Password dan Konfirmasi Password harus sama',
                confirmButtonColor: '#666CFF',
            });
            return false;
        }

        // API call
        $.ajax({
            url: '{{ config('app.API_URL') }}/api/register/guest',
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
            success: function(response) {
                console.log('Registrasi berhasil!', response);
                localStorage.setItem('token', response.access_token);
                
                // Success toast dengan transisi
                Toastify({
                    text: "Registrasi berhasil! Mengarahkan ke halaman login...",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    stopOnFocus: true,
                }).showToast();
                
                // Redirect after 3 seconds dengan transisi overlay
                setTimeout(function() {
                    window.location.href = 'login';
                }, 3000);
            },
            error: function(xhr) {
                hideLoading('register');
                
                let errorMessage = 'Registrasi gagal';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    errorMessage = xhr.responseText || 'Terjadi kesalahan';
                }

                // Error toast
                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                    stopOnFocus: true,
                }).showToast();
            }
        });
    });
    
    // Login link click handler dengan transisi
    document.getElementById('loginLink')?.addEventListener('click', function(e) {
        e.preventDefault();
        showLoading('login');
        
        // Redirect after showing loading
        setTimeout(() => {
            window.location.href = this.href;
        }, 500);
    });
</script>

<style>
    /* Hanya animasi spinner untuk loading */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    /* Transisi untuk opacity */
    .transition-opacity {
        transition: opacity 0.3s ease;
    }
    
    /* Transisi untuk loading overlay */
    #loadingOverlay {
        transition: opacity 0.3s ease;
    }
</style>
@endsection