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
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- <div class="mb-4">
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div> --}}

            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" class="w-full p-3 border border-gray-300 rounded-lg ">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4 mt-6 md:mt-10 lg:mt-4">
                <button type="submit" class="w-full bg-[#666CFF] text-white p-3 rounded-lg hover:bg-blue-700">{{ __('Masuk') }}</button>
            </div>

            <div class="text-center">
                <p class="text-sm">Tidak memiliki akun?

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="text-blue-600 hover:underline"
                        >
                            Daftar
                        </a>
                    @endif
                </p>



            </div>
        </form>
    </div>
</div>

@endsection
