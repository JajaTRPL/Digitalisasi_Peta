@extends('layouts.app')

@section('title', 'Atur Ulang Kata Sandi')

@section('content')

<div class="bg-[#F4F7ED] min-h-screen flex items-center justify-center p-4">
    <main class="bg-white rounded-lg shadow-md p-8 w-full max-w-md flex flex-col items-center transition-all duration-300 transform hover:shadow-lg form-container">
        <h1 class="font-semibold text-xl mb-8">
            Atur Ulang Kata Sandi
        </h1>
        <img alt="Emblem logo of Sleman" class="mb-8 w-24 h-24" src="{{ asset('images/sleman-logo.png') }}"/>
        <h2 class="font-semibold text-base text-[#4B506D] mb-6 text-center">
            Peta Digital Kalurahan Umbulharjo
        </h2>
        
        <!-- Success Message (hidden initially) -->
        <div id="successMessage" class="success-message text-center mb-6">
            <svg class="h-12 w-12 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-green-600 font-medium">OTP berhasil diverifikasi. Silakan buat password baru Anda.</p>
        </div>
        
        <!-- Email Form (visible initially) -->
        <form id="emailForm" class="w-full space-y-6">
            <!-- Email Address -->
            <div class="relative">
                <input id="email" name="email"
                       class="w-full border border-gray-300 rounded-lg py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Email" 
                       type="email"
                       required/>
            </div>
            
            <button id="sendOtp" class="w-full bg-indigo-600 text-white text-sm rounded-lg py-3 mt-2 hover:bg-indigo-700 transition-colors duration-300" type="button">
                Kirim OTP
            </button>
        </form>
        
        <!-- OTP Form (hidden initially) -->
        <form id="otpForm" class="w-full space-y-6 mt-6">
            <div class="text-sm text-gray-600 mb-4">
                Kode OTP telah dikirim ke <span id="emailDisplay" class="font-medium"></span>. 
                <span id="resendOtp" class="resend-otp">Kirim ulang OTP</span>
                <span id="countdown" class="text-gray-500 ml-1">(20)</span>
            </div>
            
            <!-- OTP Code -->
            <div class="relative">
                <input id="otp" name="otp"
                       class="w-full border border-gray-300 rounded-lg py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Masukkan 6 digit kode OTP" 
                       type="text"
                       maxlength="6"
                       required/>
            </div>
            
            <button id="submitOtp" class="w-full bg-indigo-600 text-white text-sm rounded-lg py-3 mt-2 hover:bg-indigo-700 transition-colors duration-300" type="button">
                Verifikasi OTP
            </button>
        </form>
        
        <!-- Password Form (hidden initially) -->
        <form id="passwordForm" class="w-full space-y-6 mt-6">
            <!-- Password -->
            <div class="relative">
                <input id="new_password" name="new_password"
                       class="w-full border border-gray-300 rounded-lg py-3 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Kata Sandi Baru" 
                       type="password"
                       required/>
                <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePassword('new_password', 'eye-icon1', 'eye-slash1')">
                    <svg id="eye-icon1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                    </svg>
                </span>
            </div>
            
            <!-- Confirm Password -->
            <div class="relative">
                <input id="new_password_confirmation" name="new_password_confirmation"
                       class="w-full border border-gray-300 rounded-lg py-3 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                       placeholder="Konfirmasi Kata Sandi Baru" 
                       type="password"
                       required/>
                <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePassword('new_password_confirmation', 'eye-icon2', 'eye-slash2')">
                    <svg id="eye-icon2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3.5c4.136 0 7.742 2.91 9.41 6.753a.75.75 0 010 .494C17.742 13.59 14.136 16.5 10 16.5s-7.742-2.91-9.41-6.753a.75.75 0 010-.494C2.258 6.41 5.864 3.5 10 3.5zm0 1.5C6.512 5 3.523 7.364 2.09 10c1.433 2.636 4.422 5 7.91 5s6.477-2.364 7.91-5C16.477 7.364 13.488 5 10 5zM10 7a3 3 0 110 6 3 3 0 010-6z" />
                    </svg>
                    <svg id="eye-slash2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                    </svg>
                </span>
            </div>
            
            <button id="submitPassword" class="w-full bg-indigo-600 text-white text-sm rounded-lg py-3 mt-2 hover:bg-indigo-700 transition-colors duration-300" type="button">
                Ubah Kata Sandi
            </button>
        </form>
        
        <!-- Back to Login Link -->
        <a id="backToLogin" class="text-indigo-600 text-sm mt-6 flex items-center space-x-2 group transition-all duration-300 relative" 
           href="{{ route('login') }}">
            <svg class="h-4 w-4 transform group-hover:-translate-x-1 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            <span class="group-hover:underline">Kembali ke Login</span>
            <span id="loginSpinner" class="hidden absolute inset-0 flex items-center justify-center">
                <svg class="animate-spin h-4 w-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </span>
        </a>
    </main>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
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

    // Handle back to login link click
    document.getElementById('backToLogin')?.addEventListener('click', function(e) {
        e.preventDefault();
        const link = e.currentTarget;
        const spinner = document.getElementById('loginSpinner');
        const overlay = document.getElementById('loadingOverlay');
        
        // Show spinner
        spinner.classList.remove('hidden');
        
        // Show overlay with fade effect
        overlay.style.opacity = '0';
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.style.opacity = '1', 10);
        
        // Navigate after animation
        setTimeout(() => {
            window.location.href = link.href;
        }, 300);
    });

    // Handle send OTP button click
    document.getElementById('sendOtp')?.addEventListener('click', function() {
        const email = document.getElementById('email').value;
        const overlay = document.getElementById('loadingOverlay');
        
        // Simple validation
        if (!email) {
            alert('Email harus diisi');
            return;
        }
        
        // Validate email format
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            alert('Format email tidak valid');
            return;
        }
        
        // Show loading
        overlay.style.opacity = '0';
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.style.opacity = '1', 10);
        
        // Simulate API call to send OTP (replace with actual API call)
        setTimeout(() => {
            // Hide loading
            overlay.style.opacity = '0';
            setTimeout(() => overlay.classList.add('hidden'), 300);
            
            // For demo purposes, assume success
            // Hide email form and show OTP form
            document.getElementById('emailForm').style.display = 'none';
            document.getElementById('otpForm').style.display = 'block';
            
            // Display email address
            document.getElementById('emailDisplay').textContent = email;
            
            // Start countdown for resend OTP
            startCountdown(120);
        }, 1500);
    });
    
    // Handle OTP submission
    document.getElementById('submitOtp')?.addEventListener('click', function() {
        const otp = document.getElementById('otp').value;
        const overlay = document.getElementById('loadingOverlay');
        
        // Simple validation
        if (!otp) {
            alert('OTP harus diisi');
            return;
        }
        
        if (otp.length !== 6) {
            alert('OTP harus 6 digit');
            return;
        }
        
        // Show loading
        overlay.style.opacity = '0';
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.style.opacity = '1', 10);
        
        // Simulate API call to verify OTP (replace with actual API call)
        setTimeout(() => {
            // Hide loading
            overlay.style.opacity = '0';
            setTimeout(() => overlay.classList.add('hidden'), 300);
            
            // For demo purposes, assume OTP is valid
            // In real app, check response from server
            const isValidOtp = true;
            
            if (isValidOtp) {
                // Hide OTP form
                document.getElementById('otpForm').style.display = 'none';
                
                // Show success message and password form
                document.getElementById('successMessage').style.display = 'block';
                document.getElementById('passwordForm').style.display = 'block';
            } else {
                alert('OTP tidak valid. Silakan coba lagi.');
            }
        }, 1500);
    });
    
    // Handle password submission
    document.getElementById('submitPassword')?.addEventListener('click', function() {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;
        const overlay = document.getElementById('loadingOverlay');
        
        // Validation
        if (!newPassword || !confirmPassword) {
            alert('Password dan konfirmasi password harus diisi');
            return;
        }
        
        if (newPassword !== confirmPassword) {
            alert('Password dan konfirmasi password tidak cocok');
            return;
        }
        
        if (newPassword.length < 8) {
            alert('Password minimal 8 karakter');
            return;
        }
        
        // Show loading
        overlay.style.opacity = '0';
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.style.opacity = '1', 10);
        
        // Simulate API call to reset password (replace with actual API call)
        setTimeout(() => {
            // Hide loading
            overlay.style.opacity = '0';
            setTimeout(() => overlay.classList.add('hidden'), 300);
            
            // For demo purposes, assume success
            alert('Password berhasil diubah! Silakan login dengan password baru Anda.');
            window.location.href = "{{ route('login') }}";
        }, 1500);
    });
    
    // Handle resend OTP
    document.getElementById('resendOtp')?.addEventListener('click', function() {
        const resendBtn = document.getElementById('resendOtp');
        const countdown = document.getElementById('countdown');
        
        // Check if resend is not disabled
        if (resendBtn.classList.contains('disabled')) return;
        
        // Show loading
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.opacity = '0';
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.style.opacity = '1', 10);
        
        // Simulate API call to resend OTP (replace with actual API call)
        setTimeout(() => {
            // Hide loading
            overlay.style.opacity = '0';
            setTimeout(() => overlay.classList.add('hidden'), 300);
            
            // For demo purposes, assume success
            alert('OTP baru telah dikirim ke email Anda');
            
            // Start countdown again
            startCountdown(120);
        }, 1500);
    });
    
    // Countdown function for resend OTP
    function startCountdown(seconds) {
        const resendBtn = document.getElementById('resendOtp');
        const countdown = document.getElementById('countdown');
        
        // Disable resend button
        resendBtn.classList.add('disabled');
        
        let remaining = seconds;
        countdown.textContent = `(${remaining})`;
        
        const interval = setInterval(() => {
            remaining--;
            countdown.textContent = `(${remaining})`;
            
            if (remaining <= 0) {
                clearInterval(interval);
                resendBtn.classList.remove('disabled');
                countdown.textContent = '';
            }
        }, 1000);
    }

    // Page load animation
    document.addEventListener('DOMContentLoaded', () => {
        document.body.style.opacity = '1';
    });
</script>
@endsection