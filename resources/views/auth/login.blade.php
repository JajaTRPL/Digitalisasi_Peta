@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-[#F6F9EE]">
    <div class="bg-white p-8 rounded-lg shadow-lg w-auto">
        <div class="flex flex-col items-center justify-center">
            <p class="text-[#000000] text-[30px] font-bold mb-4 font-poppins">Masuk</p>
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-[#262B43E5] text-2xl font-semibold mb-3 mt-4 font-poppins">Peta Digital Kalurahan Umbulharjo</h1>
        </div>
        <form id="loginForm">
            @csrf

            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" class="w-full p-3 border border-gray-300 rounded-lg ">
                <x-input-error :messages="$errors->get('email')" class="mt-2" id="error-email"/>
            </div>

            <div class="mb-4 relative">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Kata Sandi" class="w-full p-3 border border-gray-300 rounded-lg pr-10">
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'eye-icon1', 'eye-slash1')">
                    <svg id="eye-icon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path d="M3.293 3.293a1 1 0 011.414 0L16.707 15.293a1 1 0 01-1.414 1.414L3.293 4.707a1 1 0 010-1.414zm4.547 4.547l1.415 1.415A3.001 3.001 0 0110 13a3.001 3.001 0 01-1.999-.757z" />
                    </svg>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" id="error-password"/>
            </div>

            <!-- Forgot Password Link -->
            <div class="text-center mb-4 flex justify-end">
                <a href="{{ route('password.request') }}" id="forgotPasswordLink" class="text-[#666CFF] hover:underline text-sm relative">
                    <span id="forgotText">forgot password?</span>
                    <span id="forgotSpinner" class="hidden absolute inset-0 flex items-center justify-center">
                        <svg class="animate-spin h-4 w-4 text-[#666CFF]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="mb-4 mt-6 md:mt-10 lg:mt-4 relative">
                <button type="submit" id="loginButton" class="w-full bg-[#666CFF] text-white p-3 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <span id="loginText">Masuk</span>
                    <span id="loginSpinner" class="hidden absolute inset-0 flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>

            <div class="text-center">
                <p class="text-sm">Tidak memiliki akun?
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" id="registerLink" class="text-blue-600 hover:underline transition-colors duration-300 relative">
                            <span id="registerText">Daftar</span>
                            <span id="registerSpinner" class="hidden absolute inset-0 flex items-center justify-center">
                                <svg class="animate-spin h-4 w-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </a>
                    @endif
                </p>
            </div>
        </form>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl text-center">
        <svg class="animate-spin h-12 w-12 text-[#666CFF] mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p class="text-lg font-semibold">Mengarahkan...</p>
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

    // Add animation to register link
    document.getElementById('registerLink')?.addEventListener('click', function(e) {
        const link = e.currentTarget;
        const text = link.querySelector('#registerText');
        const spinner = link.querySelector('#registerSpinner');
        
        text.classList.add('opacity-0');
        spinner.classList.remove('hidden');
        
        // Show loading overlay
        document.getElementById('loadingOverlay').classList.remove('hidden');
    });

    // Add animation to forgot password link
    document.getElementById('forgotPasswordLink')?.addEventListener('click', function(e) {
        const link = e.currentTarget;
        const text = link.querySelector('#forgotText');
        const spinner = link.querySelector('#forgotSpinner');
        
        text.classList.add('opacity-0');
        spinner.classList.remove('hidden');
        
        // Show loading overlay
        document.getElementById('loadingOverlay').classList.remove('hidden');
    });

    // Login form submission
    $('#loginForm').submit(function(e) {
        e.preventDefault();

        // Show loading state on button
        const loginButton = document.getElementById('loginButton');
        const loginText = document.getElementById('loginText');
        const loginSpinner = document.getElementById('loginSpinner');
        
        loginText.classList.add('opacity-0');
        loginSpinner.classList.remove('hidden');
        loginButton.disabled = true;

        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();

        $.ajax({
            url: '{{ config('app.API_URL') }}/api/login',
            type: 'POST',
            data: JSON.stringify({
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
                console.log('Login berhasil!', response);
                localStorage.setItem('token', response.access_token);
                
                // Show loading overlay
                document.getElementById('loadingOverlay').classList.remove('hidden');
                
                // Success toast
                Toastify({
                    text: "Login berhasil! Mengarahkan ke dashboard...",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    stopOnFocus: true,
                }).showToast();
                
                const token = encodeURIComponent(response.access_token);
                document.cookie = `auth_token=${token}; path=/; SameSite=None; Secure`;
                
                // Redirect after 3 seconds
                setTimeout(function() {
                    window.location.href = 'dashboard';
                }, 3000);
            },
            error: function(xhr) {

                $('#error-email').text('');
                $('#error-password').text('');

                // Reset button state
                loginText.classList.remove('opacity-0');
                loginSpinner.classList.add('hidden');
                loginButton.disabled = false;
                
                let errorMessage = 'Login Gagal';
                try {
                    let response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMessage = response.message;
                    }
                } catch (e) {
                    errorMessage = xhr.responseText;
                }

                if (errorMessage.toLowerCase().includes('password')) {
                    $('#error-password').text(errorMessage);
                } else if (errorMessage.toLowerCase().includes('email')) {
                    $('#error-email').text(errorMessage);
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
</script>



@endsection