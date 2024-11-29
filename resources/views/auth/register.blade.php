@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 ">
    <div class="bg-white p-8 rounded-lg shadow-lg w-auto">
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-2xl font-semibold mb-2">Peta Digital Kelurahan Umbulharjo</h1>
            <p class="text-gray-500 mb-6">Daftar Admin</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
            <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" class="w-full p-3 border border-gray-300 rounded-lg">
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

            <div class="flex items-center justify-end mb-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, eyeId, slashId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);
        const eyeSlash = document.getElementById(slashId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeSlash.style.display = "block";
            eyeIcon.style.display = "none";
        } else {
            passwordInput.type = 'password';
            eyeSlash.style.display = "none";
            eyeIcon.style.display = "block";
        }
    }
</script>

@endsection
