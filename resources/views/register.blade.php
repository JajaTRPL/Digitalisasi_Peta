@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 ">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full w-auto">
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="w-20 mb-2">
            <h1 class="text-2xl font-semibold mb-2">Peta Digital Kelurahan Umbulharjo</h1>
            <p class="text-gray-500 mb-6">Digital Maps</p>
        </div>
        <form>
            
            <div class="mb-4">
                <input type="text" placeholder="Username" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            
            <div class="mb-4">
                <input type="email" placeholder="Email" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            
            <div class="mb-4">
                <input type="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            
            <div class="mb-4 mt-6 md:mt-10 lg:mt-14">
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">Sign Up</button>
            </div>
            
            <div class="text-center">
                <p class="text-sm">Don't have an account? <a href="#" class="text-blue-600 hover:underline">Register</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
