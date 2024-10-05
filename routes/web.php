<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});
