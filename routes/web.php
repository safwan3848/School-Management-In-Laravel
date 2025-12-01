<?php

use App\Http\Controllers\Admin\AdminCareerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('register', [AuthController::class, 'register'])->name('frontend.register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('login', [AuthController::class, 'login'])->name('frontend.login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/contact-store', [ContactController::class, 'store'])->name('contact.store');

// about us 
Route::get('/about-us', function () {
    return view('home.about');
})->name('about.us');

// career frontend
Route::get('/career', [CareerController::class, 'index'])->name('career.page');
Route::post('/career/apply', [CareerController::class, 'apply'])->name('career.apply');
Route::get('/job-details/{id}', [CareerController::class, 'jobDetails']);


Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Banner Management
    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');          // List banners
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');  // Create banner page
        Route::post('/store', [BannerController::class, 'store'])->name('banner.store');    // Save banner
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');   // Edit banner page
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('banner.update'); // Update banner
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
    });

    // Testimonial Management
    Route::prefix('testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');          // List testimonials
        Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');  // Create testimonial page
        Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');    // Save testimonial
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');   // Edit testimonial page
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update'); // Update testimonial
        Route::get('/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    });

    //contact us
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactUsController::class, 'index'])->name('contact.index');
        Route::get('/delete/{id}', [ContactUsController::class, 'delete'])->name('contact.delete');
        Route::post('/update-enquiry-type', [ContactUsController::class, 'updateEnquiryType'])
            ->name('contact.updateEnquiryType');
    });

    // Gallery 
    Route::prefix('gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');
        Route::get('/bulk-upload', [GalleryController::class, 'bulkCreate'])->name('gallery.bulk.create');
        Route::post('/bulk-upload', [GalleryController::class, 'bulkStore'])->name('gallery.bulk.store');
    });

    // Jobs
    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/store', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
        Route::post('/update/{id}', [JobController::class, 'update'])->name('jobs.update');
        Route::get('/delete/{id}', [JobController::class, 'destroy'])->name('jobs.delete');
    });

    // Career
    Route::prefix('careers')->group(function () {
        Route::get('/', [AdminCareerController::class, 'index'])->name('career.index');
        Route::get('/{id}', [AdminCareerController::class, 'show'])->name('career.show');
        Route::post('/status/{id}', [AdminCareerController::class, 'updateStatus'])
            ->name('career.updateStatus');
    });
});
