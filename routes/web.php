<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HerroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MainServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdvertisementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'services'])->name('services_page');
Route::get('/services/{id}/detail', [ServiceController::class, 'service'])->name('service_detail');
Route::get('/news', [NewsController::class, 'news'])->name('news_page');
Route::get('/news/{id}/detail', [NewsController::class, 'detail'])->name('news_detail');
Route::get('/advertisement', [AdvertisementController::class, 'advertisement'])->name('advertisement_page');
Route::get('/advertisement/{id}/detail', [AdvertisementController::class, 'detail'])->name('advertisement_detail');
Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery_page');

Route::get('/dashboard', [InfoController::class, 'index'])->name('dashboard');

Route::get("/{locale}", function(string $locale){
    if(! in_array($locale, ['en', 'fa', 'ps'])){
        abort(400);
    }
    Session::put('locale', $locale);
    
    return redirect()->back();
});

Route::get('/dashboard/info', [InfoController::class, 'info'])->name('info');
Route::get('/dashboard/info/create', [InfoController::class, 'create'])->name('create-info');
Route::post('/dashboard/info/store', [InfoController::class, 'store'])->name('store-info');
Route::get('/dashboard/info/edit/{id}', [InfoController::class, 'edit'])->name('edit-info');
Route::put('/dashboard/info/update/{id}', [InfoController::class, 'update'])->name('update-info');
Route::delete('/dashboard/info/delete/{id}', [InfoController::class, 'delete'])->name('delete-info');
Route::get('/dashboard/herro', [HerroController::class, 'index'])->name('herro');
Route::get('/dashboard/herro/create', [HerroController::class, 'create'])->name('create-herro');
Route::post('/dashboard/herro/store', [HerroController::class, 'store'])->name('store-herro');
Route::get('/dashboard/herro/edit/{id}', [HerroController::class, 'edit'])->name('edit-herro');
Route::put('/dashboard/herro/update/{id}', [HerroController::class, 'update'])->name('update-herro');
Route::delete('/dashboard/herro/delete/{id}', [HerroController::class, 'delete'])->name('delete-herro');
Route::get('/dashboard/services', [ServiceController::class, 'index'])->name('services');
Route::get('/dashboard/services/create', [ServiceController::class, 'create'])->name('create-services');
Route::post('/dashboard/services/store', [ServiceController::class, 'store'])->name('store-services');
Route::get('/dashboard/services/edit/{id}', [ServiceController::class, 'edit'])->name('edit-services');
Route::put('/dashboard/services/update/{id}', [ServiceController::class, 'update'])->name('update-services');
Route::delete('/dashboard/services/delete/{id}', [ServiceController::class, 'delete'])->name('delete-services');
Route::get('/dashboard/main-service', [MainServiceController::class, 'index'])->name('main-service');
Route::get('/dashboard/main-service/create', [MainServiceController::class, 'create'])->name('create-main-service');
Route::post('/dashboard/main-service/store', [MainServiceController::class, 'store'])->name('store-main-service');
Route::get('/dashboard/main-service/edit/{id}', [MainServiceController::class, 'edit'])->name('edit-main-service');
Route::put('/dashboard/main-service/update/{id}', [MainServiceController::class, 'update'])->name('update-main-service');
Route::delete('/dashboard/main-service/delete/{id}', [MainServiceController::class, 'delete'])->name('delete-main-service');
Route::get('/dashboard/news', [NewsController::class, 'index'])->name('news');
Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('create_news');
Route::post('/dashboard/news/store', [NewsController::class, 'store'])->name('store_news');
Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'edit'])->name('edit_news');
Route::put('/dashboard/news/update/{id}', [NewsController::class, 'update'])->name('update_news');
Route::delete('/dashboard/news/delete/{id}', [NewsController::class, 'delete'])->name('delete_news');
Route::get('/dashboard/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/dashboard/gallery/create', [GalleryController::class, 'create'])->name('create_gallery');
Route::post('/dashboard/gallery/store', [GalleryController::class, 'store'])->name('store_gallery');
Route::delete('/dashboard/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('delete_gallery');
Route::get('/dashboard/advertisement', [AdvertisementController::class, 'index'])->name('advertisement');
Route::get('/dashboard/advertisement/create', [AdvertisementController::class, 'create'])->name('create_advertisement');
Route::post('/dashboard/advertisement/store', [AdvertisementController::class, 'store'])->name('store_advertisement');
Route::get('/dashboard/advertisement/edit/{id}', [AdvertisementController::class, 'edit'])->name('edit_advertisement');
Route::put('/dashboard/advertisement/update/{id}', [AdvertisementController::class, 'update'])->name('update_advertisement');
Route::delete('/dashboard/advertisement/delete/{id}', [AdvertisementController::class, 'delete'])->name('delete_advertisement');
