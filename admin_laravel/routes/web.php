<?php

use Illuminate\Support\Facades\Route;

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
//Route Login
Route::get('login', [App\Http\Controllers\admin\LoginController::class, 'index'])->name('login');
Route::post('checklogin', [App\Http\Controllers\admin\LoginController::class, 'checkLogin'])->name('checklogin');
Route::get('logout', [App\Http\Controllers\admin\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    //Route Dashboard
    Route::get('/', [App\Http\Controllers\admin\DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard');

    //Route Category
    Route::get('/category', [App\Http\Controllers\admin\CategoryController::class, 'index']);
    Route::post('/category/store', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('store');
    Route::get('/category/get_row', [App\Http\Controllers\admin\CategoryController::class, 'getRow'])->name('get_row_category');
    Route::post('/category/destroy', [App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('destroy_category');
    Route::post('/category/update_status', [App\Http\Controllers\admin\CategoryController::class, 'updateStatus'])->name('update_status_category');
    Route::post('/category/edit', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('edit_category');

    //Route Brand
    Route::get('/brand', [App\Http\Controllers\admin\BrandController::class, 'index']);
    Route::post('/brand/store', [App\Http\Controllers\admin\BrandController::class, 'store'])->name('storeBrand');
    Route::get('/brand/getrow', [App\Http\Controllers\admin\BrandController::class, 'getRow'])->name('getrow');
    Route::post('/brand/destroy', [App\Http\Controllers\admin\BrandController::class, 'destroy'])->name('destroyBrand');
    Route::post('/brand/edit_status', [App\Http\Controllers\admin\BrandController::class, 'editStatus'])->name('edit_status_brand');
    Route::post('/brand/edit_data', [App\Http\Controllers\admin\BrandController::class, 'editData'])->name('edit_data');

    //Ruote Customer
    Route::get('/customer', [App\Http\Controllers\admin\CustomerController::class, 'index']);
    Route::get('/customer/get_row', [\App\Http\Controllers\admin\CustomerController::class, 'getRow'])->name('get_row_customer');
    Route::post('/customer/store', [App\Http\Controllers\admin\CustomerController::class, 'store'])->name('store_customer');
    Route::post('/customer/destroy', [App\Http\Controllers\admin\CustomerController::class, 'destroy'])->name('destroy_customer');
    Route::post('/customer/updateStatus', [App\Http\Controllers\admin\CustomerController::class, 'updateStatus'])->name('edit_customer_status');

    //Route User
    Route::get('/user', [App\Http\Controllers\admin\UserController::class, 'index']);

    //Cart Route
    Route::get('/customer/cart_detail/{id}', [App\Http\Controllers\admin\CartController::class, 'index']);
    Route::get('/customer/cart_detail', [App\Http\Controllers\admin\CartController::class, 'getRow'])->name('get_row_cart');
    Route::post('/customer/cart_detail/update_cart', [App\Http\Controllers\admin\CartController::class, 'updateCart'])->name('update_cart');

    //Route Product
    Route::get('/product', [App\Http\Controllers\admin\ProductController::class, 'index'])->name('product');
    Route::post('/product/store', [App\Http\Controllers\admin\ProductController::class, 'store']);
    Route::get('/product/get_row', [App\Http\Controllers\admin\ProductController::class, 'getRow'])->name('get_row_product');
    Route::post('/product/destroy', [App\Http\Controllers\admin\ProductController::class, 'destroy'])->name('delete_product');
    Route::post('/product/edit_status', [App\Http\Controllers\admin\ProductController::class, 'editStatus'])->name('edit_product_status');
    Route::post('/product/edit', [App\Http\Controllers\admin\ProductController::class, 'edit'])->name('edit_product');

    //Route Order
    Route::get('/order', [App\Http\Controllers\admin\OrderController::class, 'index']);
    Route::get('/order/get_row', [App\Http\Controllers\admin\OrderController::class, 'getRow'])->name('get_row_order');
    Route::get('/order/get_order_detail', [App\Http\Controllers\admin\OrderController::class, 'getOrderDeatail'])->name('get_order_detail');
    Route::get('/order&status', [\App\Http\Controllers\admin\OrderController::class, 'filterStatus'])->name('filter_order_status');
    Route::get('/order/getOrderbyDate', [App\Http\Controllers\admin\OrderController::class, 'getOrderbyDate'])->name('getOrderbyDate');
    Route::post('/order/update_status', [App\Http\Controllers\admin\OrderController::class, 'updateStatus'])->name('update_status_order');
    Route::get('/order/generatePDF', [App\Http\Controllers\admin\OrderController::class, 'generatePDF'])->name('generate_orderPDF');
    Route::get('/order/create_invoice/{id}', [App\Http\Controllers\admin\OrderController::class, 'createInvoice']);
    Route::get('/order/exportExcel', [App\Http\Controllers\admin\OrderController::class, 'exportExcel'])->name('exportExcel_order');

    //Route Invoice
    Route::get('/invoice', [App\Http\Controllers\admin\InvoiceController::class, 'index']);
    Route::get('/invoice/get_row', [App\Http\Controllers\admin\InvoiceController::class, 'getRow'])->name('get_row_invoice');
    Route::post('/invoice/destroy', [App\Http\Controllers\admin\InvoiceController::class, 'destroy'])->name('destroy_invoice');
    Route::get('invoice/generate_pdf', [App\Http\Controllers\admin\InvoiceController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/invoice/expor_excel', [App\Http\Controllers\admin\InvoiceController::class, 'exportExcel'])->name('export_invoice_excel');

    //Route Supplier
    Route::get('/supplier', [App\Http\Controllers\admin\SupplierController::class, 'index']);

    //Route Profile
    Route::get('/profile', [App\Http\Controllers\admin\ProfileController::class, 'index']);
    Route::post('/profile/edit', [App\Http\Controllers\admin\ProfileController::class, 'edit'])->name('edit_profile');
});