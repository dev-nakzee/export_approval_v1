<?php
use Illuminate\Support\Facades\Route;
use App\Models\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\DocumentController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ServiceSectionController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductSectionController;

Route::get('/login', [AdminController::class,'Index'])->name('login_from');
Route::POST('/login/owner', [AdminController::class,'Login'])->name('admin.login');
Route::get('/clientList', [AdminController::class,'clientList'])->name('admin.clientList');
Route::get('/dashboard', [AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('AdminMiddleware');
Route::get('/logout', [AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('AdminMiddleware');
Route::get('/register', [AdminController::class,'AdminRegister'])->name('admin.register');
Route::POST('/register/create', [AdminController::class,'AdminRegisterCreate'])->name('admin.register.create');
Route::POST('/user/create', [AdminController::class,'createNewUser'])->name('admin.newUser');
Route::get('/delete/{id}', [AdminController::class,'deleteClient'])->name('admin.deleteClient');

Route::controller(MediaController::class)->group(function(){
    Route::get('/media', 'index')->name('media.index');
    Route::get('/media/show', 'show')->name('media.show');
    Route::post('/media/store', 'store')->name('media.store');
    Route::get('/media/delete/{id}', 'destroy')->name('media.delete');
    Route::get('/media/gallery','gallery')->name('media.gallery');
})->name('backend');

Route::controller(DocumentController::class)->group(function() {
    Route::get('/document', 'index')->name('document.index');
    Route::get('/document/show', 'show')->name('document.show');
    Route::post('/document/store', 'store')->name('document.store');
    Route::get('/document/delete/{id}', 'destroy')->name('document.delete');
    Route::get('/document/gallery','gallery')->name('document.gallery');
});

Route::controller(ServiceController::class)->group(function() {
    Route::get('/services', 'index')->name('services.index');
    Route::get('/services/show', 'show')->name('services.show');
    Route::get('/services/create', 'create')->name('services.create');
    Route::get('/services/edit/{id}', 'edit')->name('services.edit');
    Route::post('/services/store', 'store')->name('services.store');
    Route::post('/services/update/{id}', 'update')->name('services.update');
    Route::get('/services/delete/{id}', 'destroy')->name('services.delete');
});

Route::controller(ServiceSectionController::class)->group(function() {
    Route::get('/services/{service}/sections/','index')->name('services.sections.index');
    Route::get('/services/{service}/sections/show', 'show')->name('services.sections.show');
    Route::get('/services/{service}/sections/create', 'create')->name('services.sections.create');
    Route::get('/services/{service}/sections/edit/{id}', 'edit')->name('services.sections.edit');
    Route::post('/services/{service}/sections/store', 'store')->name('services.sections.store');
    Route::post('/services/{service}/sections/update/{id}','update')->name('services.sections.update');
    Route::get('/services/{service}/sections/delete/{id}', 'destroy')->name('services.sections.delete');
});

Route::controller(ProductCategoryController::class)->group(function() {
    Route::get('/products/categories', 'index')->name('products.categories.index');
    Route::get('/products/categories/show', 'show')->name('products.categories.show');
    Route::get('/products/categories/create', 'create')->name('products.categories.create');
    Route::get('/products/categories/edit/{id}', 'edit')->name('products.categories.edit');
    Route::post('/products/categories/store', 'store')->name('products.categories.store');
    Route::post('/products/categories/update/{id}', 'update')->name('products.categories.update');
    Route::get('/products/categories/delete/{id}', 'destroy')->name('products.categories.delete');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/show', 'show')->name('products.show');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/edit/{id}', 'edit')->name('products.edit');
    Route::post('/products/store', 'store')->name('products.store');
    Route::post('/products/update/{id}', 'update')->name('products.update');
    Route::get('/products/delete/{id}', 'destroy')->name('products.delete');
});

Route::controller(ProductSectionController::class)->group(function(){
    Route::get('/products/{product}/sections/','index')->name('products.sections.index');
    Route::get('/products/{product}/sections/show', 'show')->name('products.sections.show');
    Route::get('/products/{product}/sections/create', 'create')->name('products.sections.create');
    Route::get('/products/{product}/sections/edit/{id}', 'edit')->name('products.sections.edit');
    Route::post('/products/{product}/sections/store', 'store')->name('products.sections.store');
    Route::post('/products/{product}/sections/update/{id}','update')->name('products.sections.update');
    Route::get('/products/{product}/sections/delete/{id}', 'destroy')->name('products.sections.delete');
});
