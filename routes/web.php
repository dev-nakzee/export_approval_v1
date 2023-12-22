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
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\IndustryNotificationController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\BrochureFormController;
use App\Http\Controllers\Frontend\PartnerFormController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PopupController;

Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('frontend.site.home');
    Route::get('/about-us', 'about')->name('frontend.site.about-us');
    Route::get('/downloads', 'downloads')->name('frontend.site.downloads');
    Route::get('/downloads/{service_slug}', 'download_service')->name('frontend.site.download.service');
    Route::get('/downloads/o/{category_slug}', 'download_category')->name('frontend.site.download.category');
    Route::get('/media-cover', 'media_cover')->name('frontend.site.media-cover');
    Route::get('/gallery', 'gallery')->name('frontend.site.gallery');
    Route::get('/contact-us', 'contact')->name('frontend.site.contact-us');
    Route::get('/holiday-list', 'holidays')->name('frontend.site.holiday.list');
});

Route::controller(PopupController::class)->group(function (){
    Route::get('/pop-up/close', 'close')->name('frontend.site.popup.close');
});

Route::controller(ContactController::class)->group(function (){
    Route::post('/contact/save', 'contact')->name('frontend.site.contact-us.save');
});

Route::controller(ServiceController::class)->group(function (){
    Route::get('/service/{service_slug}', 'index')->name('frontend.site.service');
});

Route::controller(ProductsController::class)->group(function (){
    Route::get('/product/{product_slug}', 'index')->name('frontend.site.product');
});

Route::controller(BlogsController::class)->group(function (){
    Route::get('/blogs', 'index')->name('frontend.site.blog');
    Route::get('/blogs/{blog_category}', 'category')->name('frontend.site.blog.category');
    Route::get('/blogs/{blog_category}/{blog_slug}', 'detail')->name('frontend.site.blog.detail');
});
Route::controller(IndustryNotificationController::class)->group(function (){
    Route::get('/industry-notifications', 'index')->name('frontend.site.industry-notification');
    Route::get('/industry-notifications/{service}', 'service')->name('frontend.site.industry-notification.service');
    Route::get('/industry-notifications/{service}/{industry_notification_slug}', 'detail')->name('frontend.site.industry-notification.detail');
});

Route::controller(SearchController::class)->group(function (){
    Route::post('/search/one', 'index')->name('frontend.site.search');
    Route::post('/search', 'search')->name('frontend.site.search.page');
});

Route::controller(BrochureFormController::class)->group(function (){
    Route::get('/brochure/reload-captcha', 'reloadCaptcha')->name('frontend.site.brochure.reload-captcha');
    Route::post('/brochure', 'store')->name('frontend.site.brochure.store');
});

Route::controller(PartnerFormController::class)->group(function(){
    Route::get('/business-associate', 'business_associate')->name('frontend.site.business.associate');
    Route::post('/business-associate', 'ba_save')->name('frontend.site.ba.save');
    Route::get('/resident-executive', 'resident_executive')->name('frontend.site.resident.executive');
    Route::post('/resident-executive', 're_save')->name('frontend.site.re.save');
});

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
