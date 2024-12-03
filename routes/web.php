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


Route::get("/", function () {
    $obj = [];
    $obj["id"] = "5";
    $obj["name"] = "Ibrahem";
    $obj["age"] = 25;
    return view("layout")->with(["id" => '5', "name" => 'Ibrahem', 'age' => '25']);
});
Route::get("/landing", function () {
    return view("landing");
});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
