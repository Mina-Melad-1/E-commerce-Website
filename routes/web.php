<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ThemeController;
route::get('/', [HomeController::class, 'home']);

route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders', [HomeController::class, 'myorders'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php'; // to include (auth.php)

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
Route::get('delet_category/{id}', [AdminController::class, 'delet_category'])->middleware(['auth', 'admin']);
Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);
Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);
Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);
Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);
Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);
Route::get('update_product/{slug}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);
Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);
Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);
Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);
Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);
Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);
Route::get('view_order', [AdminController::class, 'view_order'])->middleware(['auth', 'admin']);
Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);
Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

Route::controller(HomeController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::get('shop', [HomeController::class, 'shop']);
Route::get('why', [HomeController::class, 'why']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('search', [HomeController::class, 'search']);


Route::get('/view_users', [AdminController::class, 'view_users'])->name('admin.users')->middleware(['auth', 'admin']);
Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->middleware(['auth', 'admin']);
Route::post('/update_user/{id}', [AdminController::class, 'update_user'])->middleware(['auth', 'admin']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->middleware(['auth', 'admin']);
Route::get('/user_search', [AdminController::class, 'user_search'])->middleware(['auth', 'admin']);
Route::get('/create_user', [AdminController::class, 'create_user'])->middleware(['auth', 'admin']);
Route::post('/store_user', [AdminController::class, 'store_user'])->middleware(['auth', 'admin']);

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('review.store')->middleware(['auth', 'verified']);
Route::get('/view_reviews', [AdminController::class, 'view_reviews'])->name('admin.reviews')->middleware(['auth', 'admin']);
Route::get('/delete_review/{id}', [AdminController::class, 'delete_review'])->name('delete_review')->middleware(['auth', 'admin']);

Route::get('/toggle-theme', [ThemeController::class, 'toggleTheme'])->name('toggle.theme');