<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
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
    return view('welcome');
});

//$hotel_type_controller = HotelType::all();

Route::resource('hotel', HotelController::class);
Route::post('hotel/edit', [HotelController::class, 'getEditFormHotel'])->name('hotel.getEditFormHotel');





Route::get('hoteltype', [HotelController::class, 'hotel_type_controller_function'])->name('hoteltype.index');
Route::post('hotel/type/create', [HotelController::class, 'store_type'])->name('hoteltype.store');



Route::resource('product', ProductController::class);

Route::get('producttype', [ProductController::class,  'product_type_controller_function'])->name('producttype.index');
Route::post('product/type/create', [ProductController::class, 'store_type'])->name('producttype.store');

Route::resource('facility', FacilityController::class);

