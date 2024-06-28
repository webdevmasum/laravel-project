<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrderController;


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
//Route::get('/dashboard',[HomeController::class,'dashboard']);
Route::resources([
    'users' => UserController::class,
    'roles' => RoleController::class,
    'products' => ProductController::class,
    'suppliers' => SupplierController::class,
    'contacts' => ContactController::class,
    'sales' => SaleController::class,
    'purchases' => PurchaseController::class,
    'orders' => OrderController::class,
]);

Route::get("/roles/delete/{id}",[RoleController::class,"delete"]);
Route::get("/products/delete/{id}",[ProductController::class,"delete"]);
Route::get("/suppliers/delete/{id}",[SupplierController::class,"delete"]);
Route::get("/contacts/delete/{id}",[ContactController::class,"delete"]);
Route::get("/supplier/delete/{id}",[SupplierController::class,"delete"]);
Route::get("/purchases/delete/{id}",[PurchaseController::class,"delete"]);
Route::get("/orders/delete/{id}",[OrderController::class,"delete"]);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
