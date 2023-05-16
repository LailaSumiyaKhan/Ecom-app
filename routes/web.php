<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CuponController;

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

Route::get('/', [EcommerceController::class,'index'])->name('home');
Route::get('/product-category/{id}', [EcommerceController::class,'category'])->name('product-category');
Route::get('/product-detail/{id}', [EcommerceController::class,'detail'])->name('product-detail');
Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class,'show'])->name('show-cart');
Route::get('/remove-cart-product/{id}', [CartController::class,'remove'])->name('remove-cart-product');
Route::post('/update-cart-product/{id}', [CartController::class,'update'])->name('update-cart-product');
Route::post('/apply-cupon', [CartController::class,'applyCupon'])->name('apply-cupon');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubcategoryController::class,'index'])->name('sub-category.add');
    Route::post('/sub-category/create',[SubcategoryController::class,'create'])->name('sub-category.create');
    Route::get('/sub-category/manage',[SubcategoryController::class,'manage'])->name('sub-category.manage');
    Route::get('/sub-category/edit/{id}',[SubcategoryController::class,'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}',[SubcategoryController::class,'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}',[SubcategoryController::class,'delete'])->name('sub-category.delete');


    Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::post('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('/unit/add',[UnitController::class,'index'])->name('unit.add');
    Route::post('/unit/create',[UnitController::class,'create'])->name('unit.create');
    Route::get('/unit/manage',[UnitController::class,'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');

    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

    Route::get('/cupon/add',[CuponController::class,'index'])->name('cupon.add');
    Route::post('/cupon/create',[CuponController::class,'create'])->name('cupon.create');
    Route::get('/cupon/manage',[CuponController::class,'manage'])->name('cupon.manage');
    Route::get('/cupon/edit/{id}',[CuponController::class,'edit'])->name('cupon.edit');
    Route::get('/cupon/delete/{id}',[CuponController::class,'update'])->name('cupon.delete');

});
