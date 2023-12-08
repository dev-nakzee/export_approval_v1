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
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\Backend\StaticPageSectionController;
use App\Http\Controllers\Backend\FormsController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\GalleryImageController;
use App\Http\Controllers\Backend\GalleryVideoController;
use App\Http\Controllers\Backend\DownloadCategoryController;
use App\Http\Controllers\Backend\DownloadsController;

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

Route::controller(NoticeController::class)->group(function(){
    Route::get('/notices', 'index')->name('notices.index');
    Route::get('/notices/show', 'show')->name('notices.show');
    Route::get('/notices/create', 'create')->name('notices.create');
    Route::get('/notices/edit/{id}', 'edit')->name('notices.edit');
    Route::post('/notices/store', 'store')->name('notices.store');
    Route::post('/notices/update/{id}', 'update')->name('notices.update');
    Route::get('/notices/delete/{id}', 'destroy')->name('notices.delete');
});

Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/blogs/categories', 'index')->name('blogs.categories.index');
    Route::get('/blogs/categories/show', 'show')->name('blogs.categories.show');
    Route::get('/blogs/categories/create', 'create')->name('blogs.categories.create');
    Route::get('/blogs/categories/edit/{id}', 'edit')->name('blogs.categories.edit');
    Route::post('/blogs/categories/store', 'store')->name('blogs.categories.store');
    Route::post('/blogs/categories/update/{id}', 'update')->name('blogs.categories.update');
    Route::get('/blogs/categories/delete/{id}', 'destroy')->name('blogs.categories.delete');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/blogs', 'index')->name('blogs.index');
    Route::get('/blogs/show', 'show')->name('blogs.show');
    Route::get('/blogs/create', 'create')->name('blogs.create');
    Route::get('/blogs/edit/{id}', 'edit')->name('blogs.edit');
    Route::post('/blogs/store', 'store')->name('blogs.store');
    Route::post('/blogs/update/{id}', 'update')->name('blogs.update');
    Route::get('/blogs/delete/{id}', 'destroy')->name('blogs.delete');
});

Route::controller(TestimonialController::class)->group(function(){
    Route::get('/testimonials', 'index')->name('testimonials.index');
    Route::get('/testimonials/show', 'show')->name('testimonials.show');
    Route::get('/testimonials/create', 'create')->name('testimonials.create');
    Route::get('/testimonials/edit/{id}', 'edit')->name('testimonials.edit');
    Route::post('/testimonials/store', 'store')->name('testimonials.store');
    Route::post('/testimonials/update/{id}', 'update')->name('testimonials.update');
    Route::get('/testimonials/delete/{id}', 'destroy')->name('testimonials.delete');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/clients', 'index')->name('clients.index');
    Route::get('/clients/show', 'show')->name('clients.show');
    Route::get('/clients/create', 'create')->name('clients.create');
    Route::get('/clients/edit/{id}', 'edit')->name('clients.edit');
    Route::post('/clients/store', 'store')->name('clients.store');
    Route::post('/clients/update/{id}', 'update')->name('clients.update');
    Route::get('/clients/delete/{id}', 'destroy')->name('clients.delete');
});

Route::controller(StaticPageController::class)->group(function(){
    Route::get('/pages/static', 'index')->name('static.pages.index');
    Route::get('/pages/static/show', 'show')->name('static.pages.show');
    Route::get('/pages/static/create', 'create')->name('static.pages.create');
    Route::get('/pages/static/edit/{id}', 'edit')->name('static.pages.edit');
    Route::post('/pages/static/store', 'store')->name('static.pages.store');
    Route::post('/pages/static/update/{id}', 'update')->name('static.pages.update');
    Route::get('/pages/static/delete/{id}', 'destroy')->name('static.pages.delete');
});

Route::controller(StaticPageSectionController::class)->group(function(){
    Route::get('/pages/static/{page}/sections/','index')->name('static.pages.sections.index');
    Route::get('/pages/static/{page}/sections/show', 'show')->name('static.pages.sections.show');
    Route::get('/pages/static/{page}/sections/create', 'create')->name('static.pages.sections.create');
    Route::get('/pages/static/{page}/sections/edit/{id}', 'edit')->name('static.pages.sections.edit');
    Route::post('/pages/static/{page}/sections/store', 'store')->name('static.pages.sections.store');
    Route::post('/pages/static/{page}/sections/update/{id}','update')->name('static.pages.sections.update');
    Route::get('/pages/static/{page}/sections/delete/{id}', 'destroy')->name('static.pages.sections.delete');
});

Route::controller(FormsController::class)->group(function(){
    Route::get('/forms', 'index')->name('forms.index');
    Route::get('/forms/show', 'show')->name('forms.show');
    Route::get('/forms/create', 'create')->name('forms.create');
    Route::get('/forms/edit/{id}', 'edit')->name('forms.edit');
    Route::post('/forms/store', 'store')->name('forms.store');
    Route::post('/forms/update/{id}', 'update')->name('forms.update');
    Route::get('/forms/delete/{id}', 'destroy')->name('forms.delete');
});

Route::controller(NewsController::class)->group(function(){
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/show', 'show')->name('news.show');
    Route::get('/news/create', 'create')->name('news.create');
    Route::get('/news/edit/{id}', 'edit')->name('news.edit');
    Route::post('/news/store', 'store')->name('news.store');
    Route::post('/news/update/{id}', 'update')->name('news.update');
    Route::get('/news/delete/{id}', 'destroy')->name('news.delete');
});

Route::controller(GalleryImageController::class)->group(function(){
    Route::get('/gallery/images', 'index')->name('gallery.images.index');
    Route::get('/gallery/images/show', 'show')->name('gallery.images.show');
    Route::get('/gallery/images/create', 'create')->name('gallery.images.create');
    Route::get('/gallery/images/edit/{id}', 'edit')->name('gallery.images.edit');
    Route::post('/gallery/images/store', 'store')->name('gallery.images.store');
    Route::post('/gallery/images/update/{id}', 'update')->name('gallery.images.update');
    Route::get('/gallery/images/delete/{id}', 'destroy')->name('gallery.images.delete');
});

Route::controller(GalleryVideoController::class)->group(function(){
    Route::get('/gallery/videos', 'index')->name('gallery.videos.index');
    Route::get('/gallery/videos/show', 'show')->name('gallery.videos.show');
    Route::get('/gallery/videos/create', 'create')->name('gallery.videos.create');
    Route::get('/gallery/videos/edit/{id}', 'edit')->name('gallery.videos.edit');
    Route::post('/gallery/videos/store', 'store')->name('gallery.videos.store');
    Route::post('/gallery/videos/update/{id}', 'update')->name('gallery.videos.update');
    Route::get('/gallery/videos/delete/{id}', 'destroy')->name('gallery.videos.delete');
});

Route::controller(DownloadCategoryController::class)->group(function(){
    Route::get('/downloads/category','index')->name('downloads.category.index');
    Route::get('/downloads/category/show', 'show')->name('downloads.category.show');
    Route::get('/downloads/category/create', 'create')->name('downloads.category.create');
    Route::get('/downloads/category/edit/{id}', 'edit')->name('downloads.category.edit');
    Route::post('/downloads/category/store', 'store')->name('downloads.category.store');
    Route::post('/downloads/category/update/{id}', 'update')->name('downloads.category.update');
    Route::get('/downloads/category/delete/{id}', 'delete')->name('downloads.category.delete');
});

Route::controller(DownloadsController::class)->group(function(){
    Route::get('/downloads', 'index')->name('downloads.index');
    Route::get('/downloads/show', 'show')->name('downloads.show');
    Route::get('/downloads/create', 'create')->name('downloads.create');
    Route::get('/downloads/edit/{id}', 'edit')->name('downloads.edit');
    Route::post('/downloads/store', 'store')->name('downloads.store');
    Route::post('/downloads/update/{id}', 'update')->name('downloads.update');
    Route::post('/downloads/delete/{id}', 'delete')->name('downloads.delete');
});