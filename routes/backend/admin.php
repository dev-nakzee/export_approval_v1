<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\DocumentController;
use App\Http\Controllers\Backend\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;


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
    Route::get('/media', [MediaController::class,'index'])->name('media.index');
    Route::get('/media/show', [MediaController::class,'show'])->name('media.show');
    Route::post('/media/store', [MediaController::class,'store'])->name('media.store');
    Route::get('/media/delete/{id}', [MediaController::class,'destroy'])->name('media.delete');
    Route::get('/media/gallery',[MediaController::class, 'gallery'])->name('media.gallery');
})->name('backend');

Route::controller(DocumentController::class)->group(function() {
    Route::get('/document', [DocumentController::class,'index'])->name('document.index');
    Route::get('/document/show', [DocumentController::class,'show'])->name('document.show');
    Route::post('/document/store', [DocumentController::class,'store'])->name('document.store');
    Route::get('/document/delete/{id}', [DocumentController::class,'destroy'])->name('document.delete');
});

Route::controller(ServiceController::class)->group(function() {
    Route::get('/services', [ServiceController::class,'index'])->name('services.index');
    Route::get('/services/show', [ServiceController::class,'show'])->name('services.show');
    Route::get('/services/create', [ServiceController::class,'create'])->name('services.create');
    Route::get('/services/edit/{id}', [ServiceController::class,'edit'])->name('services.edit');
    Route::post('/services/store', [ServiceController::class,'store'])->name('services.store');
    Route::post('/services/update/{id}', [ServiceController::class,'update'])->name('services.update');
    Route::get('/services/delete/{id}', [ServiceController::class,'destroy'])->name('services.delete');
});

