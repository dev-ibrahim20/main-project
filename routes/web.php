<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::get('/fillable', [CrudController::class, 'getOffers']);


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