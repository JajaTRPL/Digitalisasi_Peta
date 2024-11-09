@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 ">
    <div class="bg-white p-8 rounded-lg shadow-lg w-auto">
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-2xl font-semibold mb-2">Peta Digital Kelurahan Umbulharjo</h1>
            <p class="text-gray-500 mb-6">Digital Maps</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- <div class="mb-4">
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div> --}}

            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4 mt-6 md:mt-10 lg:mt-14">
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">{{ __('Log in') }}</button>
            </div>

            <div class="text-center">
                <p class="text-sm">Don't have an account?

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="text-blue-600 hover:underline"
                        >
                            Register
                        </a>
                    @endif
                </p>



            </div>
        </form>
    </div>
</div>
@endsection
