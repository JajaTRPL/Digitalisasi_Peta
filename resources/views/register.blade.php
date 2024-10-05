@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="form-container">
    <div class="text-center">
        <img src="{{ asset('images/sleman-logo.png') }}" alt="Logo" class="logo">
        <h1>Kelurahan Umbulharjo</h1>
        <p>Digital Maps</p>
    </div>
    <form>
        <div class="form-group">
            <input type="text" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password">
        </div>
        <div class="form-group terms">
            <input type="checkbox" id="terms">
            <label for="terms">I agree to <a href="#">privacy policy & terms</a></label>
        </div>
        <div class="form-group">
            <button type="submit">Sign Up</button>
        </div>
        <div class="text-center">
            <p>Don't have an account? <a href="#">Register</a></p>
        </div>
    </form>
</div>
@endsection
