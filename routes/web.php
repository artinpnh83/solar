<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories/{id}', [MainController::class, 'categories'])->name('categories');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/products/{id}', [MainController::class, 'products_category'])->name('products_category');
Route::get('/product/{id}', [MainController::class, 'product'])->name('product');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/service_detail/{id}', [MainController::class, 'service_detail'])->name('service_detail');
Route::get('/industry', [MainController::class, 'industries'])->name('industry');
Route::get('/industry_detail/{id}', [MainController::class, 'industry_detail'])->name('industry_detail');
Route::get('/blogs', [MainController::class, 'blogs'])->name('blogs');
Route::get('/blog_detail/{id}', [MainController::class, 'blog_detail'])->name('blog_detail');
Route::get('/about-us', [MainController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [MainController::class, 'contact_us'])->name('contact_us');
Route::post('/contact-submit', [MainController::class, 'contact_submit'])->name('contact_submit');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/term', [MainController::class, 'term'])->name('term');

Route::post('/locale', [LocaleController::class, 'change'])->name('locale.change');
Route::get('/locale/{lang}', [LocaleController::class, 'changes'])->name('locales.changes');

Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'register_submit'])->name('user.register.submit');
Route::post('/register-code', [UserController::class, 'register_code'])->name('user.register.code');
Route::get('/verify', [UserController::class, 'verify'])->name('user.verify');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login_submit'])->name('user.login.submit');
Route::get('/forget', [UserController::class, 'forget'])->name('user.forget');
Route::post('/forget', [UserController::class, 'forget_submit'])->name('user.forget.submit');
Route::post('/forget-code', [UserController::class, 'forget_code'])->name('user.forget.code');
Route::get('/verify-code', [UserController::class, 'verify_code'])->name('user.verify-code');
Route::get('/logout', [UserController::class, 'user_logout'])->name('user.logout');

Route::group(['prefix' => 'profile'], function () {
    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::get('/edit-profile', [UserController::class, 'edit_profile'])->name('edit-profile');
        Route::post('/update-profile', [UserController::class, 'update_profile'])->name('update-profile');
        
        Route::get('/edit-password', [UserController::class, 'edit_password'])->name('edit-password');
        Route::post('/update-password', [UserController::class, 'update_password'])->name('update-password');
        
        Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
        Route::get('/add-wishlist/{id}', [UserController::class, 'add_wishlist'])->name('add_wishlist');
        Route::get('/delete-wishlist/{id}', [UserController::class, 'delete_wishlist'])->name('delete_wishlist');
        
        Route::get('/inquiry', [UserController::class, 'inquiry'])->name('inquiry');
        Route::post('/add-inquiry', [UserController::class, 'add_inquiry'])->name('add_inquiry');
    });

});
