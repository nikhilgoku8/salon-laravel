<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/the-right-way-to-prep-for-a-facial', [HomeController::class, 'single_blog'])->name('single_blog');