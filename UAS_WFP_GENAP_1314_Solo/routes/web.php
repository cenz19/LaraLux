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


//HOTEL
Route::resource('hotel', HotelController::class);
Route::post('hotel/edit', [HotelController::class, 'getEditFormHotel'])->name('hotel.getEditFormHotel');

//HOTEL TYPE
Route::get('hoteltype', [HotelController::class, 'hotel_type_controller_function'])->name('hoteltype.index');
Route::post('hotel/type/create', [HotelController::class, 'store_type'])->name('hoteltype.store');

//PRODUCT
Route::resource('product', ProductController::class);
Route::post('product/edit', [ProductController::class, 'getEditFormProduct'])->name('product.getEditFormProduct');

//PRODUCT TYPE
Route::get('producttype', [ProductController::class,  'product_type_controller_function'])->name('producttype.index');
Route::post('product/type/create', [ProductController::class, 'store_type'])->name('producttype.store');

//FACILITY
Route::resource('facility', FacilityController::class);
Route::post('facility/edit', [FacilityController::class, 'getEditFormFacility'])->name('facility.getEditFormFacility');
//TRANSACTION
