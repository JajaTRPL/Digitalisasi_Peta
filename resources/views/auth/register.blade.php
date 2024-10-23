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
            <div class="mb-4">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <input id="password" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Confirmation Password" class="w-full p-3 border border-gray-300 rounded-lg">
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
@endsection
