<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProductsController;

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });


Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('frontend.site.home');
});

Route::controller(ServiceController::class)->group(function (){
    Route::get('/service/{service_slug}', 'index')->name('frontend.site.service');
});

Route::controller(ProductsController::class)->group(function (){
    Route::get('/service/{service}/product/{product_slug}', 'index')->name('frontend.site.product');
});

//--------------------------------------------------ROUTE FOR ADMIN-----------------------------------------------------

//----------------------------------------END ROUTE FOR ADMIN-------------------------------------------------------------

//-----------------------------------ROUTE FOR SELLER---------------------------------------------------------------------
Route::prefix('seller')->group(function (){

    Route::get('/login', [SellerController::class,'Index'])->name('seller_login_from');
    Route::POST('/login/owner', [SellerController::class,'SellerLogin'])->name('seller.login');
    Route::get('/dashboard', [SellerController::class,'SellerDashboard'])->name('seller.dashboard')->middleware('SellerMiddleware');
    Route::get('/logout', [SellerController::class,'SellerLogout'])->name('seller.logout')->middleware('SellerMiddleware');
    Route::get('/register', [SellerController::class,'SellerRegister'])->name('seller.register');
    Route::POST('/register/create', [SellerController::class,'SellerRegisterCreate'])->name('seller.register.create');
});
//-----------------------------------END ROUTE FOR SELLER-----------------------------------------------------------------


//-------------------ROUTE FOR CLIENT DASHBOARD------------------------------------------------
Route::get('/Client', function () {
    return view('ClientDashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
      return view('AdminDashboard');
    })->name('AdminDashboard');
});

Route::post('NewClient', [UserController::class, 'NewClient']);
require __DIR__.'/auth.php';
