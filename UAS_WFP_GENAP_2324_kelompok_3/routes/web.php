<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//AUTH
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){
//HOTEL
    Route::resource('hotel', HotelController::class);
    Route::post('hotel/edit', [HotelController::class, 'getEditFormHotel'])->name('hotel.getEditFormHotel');
    Route::get('hotel/uploadLogo/{hotel_id}', [HotelController::class, 'uploadLogo']);
    Route::post('hotel/simpanLogo', [HotelController::class, 'simpanLogo']);

//HOTEL TYPE
    Route::get('hoteltype', [HotelController::class, 'hotel_type_controller_function'])->name('hoteltype.index');
    Route::post('hotel/type/create', [HotelController::class, 'store_type'])->name('hoteltype.store');

//PRODUCT
    Route::resource('product', ProductController::class);
    Route::post('product/edit', [ProductController::class, 'getEditFormProduct'])->name('product.getEditFormProduct');
    Route::get('product/uploadLogo/{product_id}', [ProductController::class, 'uploadLogo']);
    Route::post('product/simpanLogo', [ProductController::class, 'simpanLogo']);

//PRODUCT TYPE
    Route::get('producttype', [ProductController::class,  'product_type_controller_function'])->name('producttype.index');
    Route::post('product/type/create', [ProductController::class, 'store_type'])->name('producttype.store');

//FACILITY
    Route::resource('facility', FacilityController::class);
    Route::post('facility/edit', [FacilityController::class, 'getEditFormFacility'])->name('facility.getEditFormFacility');
    Route::get('facility/uploadLogo/{facility_id}', [FacilityController::class, 'uploadLogo']);
    Route::post('facility/simpanLogo', [FacilityController::class, 'simpanLogo']);

//TRANSACTION
    Route::post('transaction/checkout', [TransactionController::class, 'checkout'])->name('transaction.checkout');

//USER
    Route::resource('user', UserController::class);

//REPORT
    Route::get('hotel/report', [HotelController::class, 'reportTop']);
    Route::get('user/report', [UserController::class, 'topUser']);
    Route::get('products/report', [ProductController::class, 'showProductsByTransactions']);


//CUSTOM QUERY
//1. get all product that owned by the selected hotel by using its hotel id
    Route::get('hotel/transaction/{hotel_id}', [ProductController::class, 'getProductByHotelId']);
//2. get all transaction with those products name the user bought
    Route::get('/transaction/history', [TransactionController::class, 'history'])->name('transaction.history');
});
