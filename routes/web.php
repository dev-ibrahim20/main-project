<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout');
});
Route::get("/test", function () {
    return "Hello Ibrahem IN Your Project";
});
// Route parameters {requert parameter - not requert parameter}

Route::get("/test1/{id}", function ($id) {
    return "Hello Ibrahem IN Your Project number is:- $id";
});
Route::get("/test2/{id?}", function () {
    return "Hello Ibrahem IN Your Project";
});

// Route Name
Route::get("/test3", function () {
    return "Hello Ibrahem IN Your Project";
})->name("test-name");
