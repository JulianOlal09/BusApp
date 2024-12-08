<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class);
