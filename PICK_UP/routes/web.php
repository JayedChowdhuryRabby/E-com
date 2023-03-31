<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\RequestOrderToServiceProviderController;
use App\Http\Controllers\AdminController;

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
Route::get('/clientCreate', [ClientController::class, 'client'])->name('clientCreate');
Route::post('/clientCreate',[ClientController::class, 'clientCreateSubmitted'])->name('clientCreateSubmitted');
//customer registration
Route::get('/customerCreate', [CustomerController::class, 'customer'])->name('customerCreate');
Route::post('/customerCreate',[CustomerController::class, 'customerCreateSubmitted'])->name('customerCreateSubmitted');
//customer login and logout
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//service provider
Route::get('/serviceprovidercreate', [ServiceProviderController::class, 'create'])->name('serviceprovidercreate');
Route::post('/serviceprovidercreate',[ServiceProviderController::class, 'createsubmitted'])->name('createsubmitted');
//order request
Route::get('/createRorder', [RequestOrderToServiceProviderController::class, 'createRorder'])->name('createRorder');
Route::post('/createRorder',[RequestOrderToServiceProviderController::class, 'createRordersubmitted'])->name('createRordersubmitted');
//list of order
Route::get('/serviceprovidercreate/requestOrderList', [RequestOrderToServiceProviderController::class,'requestOrderList'])->name('requestOrderList');

// Add Product
Route::get('/addProduct',[ProductController::class,'addProduct'])->name('addProduct');
Route::post('/addProduct',[ProductController::class,'addProductSubmit'])->name('addProduct');
Route::get('/products/productdelete',[ProductController::class,'productdelete'])->name('products.productdelete');

/**product routes */
Route::get('/products/list',[ProductController::class,'list'])->name('products.list');
Route::get('/addtocart',[ProductController::class,'addtocart'])->name('products.addtocart');
Route::get('/emptycart',[ProductController::class,'emptycart'])->name('products.emptycart');
Route::get('/cart',[ProductController::class,'mycart'])->name('products.mycart');
Route::post('/checkout',[ProductController::class,'checkout'])->middleware('ValidCustomer')->name('checkout');
/**product routes end */
Route::get('/customer/myorders',[CustomerController::class,'myorders'])->middleware('ValidCustomer')->name('customer.myorders');
Route::get('/customer/myorders/details',[CustomerController::class,'orderdetails'])->middleware('ValidCustomer')->name('customer.myorders.details');

Route::get('/customer/dash', [CustomerController::class,'customerDash'])->name('customerDash')->middleware('ValidCustomer');
Route::get('/client/dash', [clientController::class,'clientDash'])->name('clientDash');
Route::get('/serviceProvider/dash', [ServiceProviderController::class,'serviceDash'])->name('serviceDash');
//admin
Route::get('/admin/dash', [AdminController::class,'adminDash'])->name('adminDash');
Route::get('/admin/clientList', [AdminController::class,'clientList'])->name('clientList');
Route::get('/admin/customerList', [AdminController::class,'customerList'])->name('customerList');

Route::get('/cutomerDelete/{name}',[AdminController::class, 'customerDelete'])->name('customerDelete');
Route::get('/clients/clientDelete',[AdminController::class,'clientDelete'])->name('clients.clientDelete');

Route::get('/clientEdit/{id}',[AdminController::class, 'clientEdit'])->name('clientEdit');
Route::post('/clientEdit',[AdminController::class, 'clientEditSubmitted'])->name('clientEdit');

Route::get('/customerEdit/{customer_id}',[AdminController::class, 'customerEdit'])->name('customerEdit');
Route::post('/customerEdit',[AdminController::class, 'customerEditSubmitted'])->name('customerEdit');


