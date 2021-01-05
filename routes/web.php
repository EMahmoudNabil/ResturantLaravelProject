<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\navbarController;
use App\Http\Controllers\SlidebarController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('navbar', navbarController::class);
Route::resource('slidbar', SlidebarController::class);
Route::resource('offer', OfferController::class);
Route::resource('chef', ChefController::class);
Route::resource('menu', MenuController::class);
Route::resource('about', AboutController::class);
// Route::resource('contact', ContactController::class);

// contact
Route::get('contact',  [ContactController::class, 'index']);
Route::get('contact/{id}',[ContactController::class, 'show']);
Route::get('newcontact', [ContactController::class, 'create']);
Route::post('storecontact', [ContactController::class, 'store']);
Route::get('contact/{id}/delete', [ContactController::class, 'destroy']);

// Reservation
Route::get('reservation',  [ReservationController::class, 'index']);
Route::get('reservation/{id}',[ReservationController::class, 'show']);
Route::get('newreservation', [ReservationController::class, 'create']);
Route::post('storereservation', [ReservationController::class, 'store']);
Route::get('reservation/{id}/delete', [ReservationController::class, 'destroy']);


Route::get('/resturant',[App\Http\Controllers\Front\ResturantController::class, 'index']);
Route::get('/aboutus',[App\Http\Controllers\Front\ResturantController::class, 'about']);
