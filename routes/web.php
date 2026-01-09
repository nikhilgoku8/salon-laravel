<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TimeSlotController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;

use App\Http\Middleware\IsAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/the-right-way-to-prep-for-a-facial', [HomeController::class, 'single_blog'])->name('single_blog');

Route::post('/book', [HomeController::class, 'booking_store'])->name('booking.store');
Route::get('/thank-you', [HomeController::class, 'thank_you'])->name('booking.thank-you');
Route::post('/get-time-slots', [HomeController::class, 'getTimeSlots'])->name('get-time-slots');

Route::get('test-mail', [HomeController::class, 'test_mail']);


Route::prefix('swm')->as('admin.')->group(function () {
    
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'] )->name('authenticate');
    Route::get('/logout', [LoginController::class, 'logout'] )->name('logout');

    Route::middleware([IsAdmin::class])->group(function () {

        Route::get('/dashboard', [LoginController::class, 'dashboard'] )->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::post('/categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulk-delete');

        Route::resource('sub-categories', SubCategoryController::class);
        Route::post('sub-categories/bulk-delete', [SubCategoryController::class, 'bulkDelete'])->name('sub-categories.bulk-delete');
        Route::post('get_sub_categories_by_category/{id}', [SubCategoryController::class, 'get_sub_categories_by_category'])->name('get_sub_categories_by_category');
        
        Route::resource('services', ServiceController::class);
        Route::post('services/bulk-delete', [ServiceController::class, 'bulkDelete'])->name('services.bulk-delete');

        Route::get('/bookings', [BookingController::class, 'index'] )->name('bookings.index');
        Route::get('/bookings/upcoming', [BookingController::class, 'upcoming'] )->name('bookings.upcoming');
        Route::get('/bookings/past', [BookingController::class, 'past'] )->name('bookings.past');
        Route::get('/bookings/edit/{id}', [BookingController::class, 'edit'] )->name('bookings.edit');
        Route::post('/bookings/update/{id}', [BookingController::class, 'update'] )->name('bookings.update');

        Route::get('/change-password', [AdminController::class, 'change_password'] )->name('change-password');
        Route::post('/changePasswordFunction', [AdminController::class, 'changePasswordFunction'] )->name('changePasswordFunction');

        // Route::resource('/blogs-categories', BlogCategoryController::class);
        // Route::post('/blogs-categories/bulk-delete', [BlogCategoryController::class, 'bulkDelete'])->name('blogs-categories.bulk-delete');

        // Route::resource('/blog-posts', BlogPostController::class);
        // Route::post('/blog-posts/bulk-delete', [BlogPostController::class, 'bulkDelete'])->name('blog-posts.bulk-delete');

        Route::resource('/time-slots', TimeSlotController::class);
        Route::post('/time-slots/bulk-delete', [TimeSlotController::class, 'bulkDelete'])->name('time-slots.bulk-delete');

        Route::resource('packages', PackageController::class);
        Route::post('/packages/bulk-delete', [PackageController::class, 'bulkDelete'])->name('packages.bulk-delete');

    });

});
