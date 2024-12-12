<?php

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Relation\RelationsController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/", function () {
    return view("layout");
});

Route::get("/landing", function () {
    return view("landing");
});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::group(['prefix' => 'offers'], function () {
        Route::get('/index', [CrudController::class,'index'])->name('offers.index');
        Route::get('/create', [CrudController::class, 'create'])->name('offers.create');
        Route::post('/store', [CrudController::class, 'store'])->name('offers.store');
        Route::get('/edit/{id}', [CrudController::class, 'edit'])->name('offers.edit');
        Route::post('/update/{id}', [CrudController::class, 'update'])->name('offers.update');
        Route::get('/delete/{id}', [CrudController::class, 'destroy'])->name('offers.destroy');
        Route::get('/youtube', [CrudController::class, 'getViews'])->name('getViews')->middleware('verified');
    }); 
});


# Ajax routes
Route::group(['prefix' => 'ajaxoffer'], function () {
    Route::get('/index', [OfferController::class,'index'])->name('ajaxoffers.index');
    Route::get('/create', [OfferController::class,'create'])->name('ajaxoffer.create');
    Route::post('/store', [OfferController::class,'store'])->name('ajaxoffer.store');
    Route::get('/edit/{id}', [OfferController::class,'edit'])->name('ajaxoffer.edit');
    Route::post('/update', [OfferController::class,'update'])->name('ajaxoffer.update');
    Route::post('/delete', [OfferController::class, 'delete'])->name('ajaxoffer.delete');
});






# Authentication and Guards
Route::middleware(['auth', 'CheckAge'])->group(function () {
    Route::get('/adulats', [CustomAuthController::class, 'adulats'])->name('adulats');
});

Route::get('/dashboard', function() {
    return 'Not Allowed';
})->name('dashboard');



Route::get('/site', [CustomAuthController::class,'site'])->Middleware('auth:web')->name('site');
Route::get('/admin', [CustomAuthController::class,'admin'])->Middleware('auth:admin')->name('admin');
Route::get('/admin/login', [CustomAuthController::class,'login'])->name('admin.login');
Route::post('/admin/login/check', [CustomAuthController::class,'check'])->name('save.admin.login');









##################### relation ###################
Route::get('has-one', [RelationsController::class,'hasOneRelation'])->name('has-one');
Route::get('has-one-reverse', [RelationsController::class,'hasOndeRelationRverse'])->name('has-one-reverse');
Route::get('get-user-has-phone', [RelationsController::class,'getUserHasPhone'])->name('get-has-phone');


// $user =\App\User::find(2);