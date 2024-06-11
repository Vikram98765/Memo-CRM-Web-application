<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
Route::get('/',[ProfileController::class,'login'])->name('login')->middleware('guest');
Route::post('/credentials/validating',[ProfileController::class,'login_check'])->name('login_check');
Route::get("Account/register",[AuthController::class,'reg'])->name('register');
Route::post("Account/create",[AuthController::class,'store'])->name('create_account');
Route::middleware(['auth'])->group(function(){
Route::get('/dashboard', [CustomerController::class,'counting'])->name('dashboard');
Route::get('/customers', [CustomerController::class, 'index'])->name('show_customers');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('create_customers');
Route::post('/customers/create', [CustomerController::class, 'save'])->name('save_customers');
Route::delete("/{id}",[CustomerController::class,'destroy'])->name('customer_destroy');
Route::get("/{id}/edit",[CustomerController::class,'edit'])->name('customer_edit');
Route::put("/{id}",[CustomerController::class,'update'] )->name('customer_update');
// Route::resource('profiles',ProfileController::class)->only('show','update','edit');
Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
 Route::get('/view',[ProfileController::class,'showform'])->name('formshow');
Route::post('profiles/edit',[ProfileController::class,'editform'])->name('save_profiles');
Route::put("update/{id}",[ProfileController::class,'update'])->name('update_profiles');
Route::get("Invoice/view",[InvoiceController::class,'view'])->name('view_invoice');
Route::post('/Invoice/create', [InvoiceController::class, 'store'])->name('save_invoice');
Route::get('Invoice/index',[InvoiceController::class,'index'])->name('index_invoice');
Route::delete('Invoice/delete/{id}',[InvoiceController::class,'destroy'])->name('invoice_destroy');
Route::get("Invoice/Edit/{id}",[InvoiceController::class,'edit'])->name('invoice_edit');
Route::put("Invoice/update/{id}",[InvoiceController::class,'update'])->name('update_invoice');


Route::get("Vendors/create",[VendorController::class,'create'])->name('vendors.create');
Route::post("Vendors/store",[VendorController::class,'store'])->name('vendors_store');
Route::get("Vendors/index",[VendorController::class,'index'])->name('vendors_index');
Route::delete("Vendor/delete/{id}",[VendorController::class,'destroy'])->name('vendors_destroy');

Route::get('Vendor/edit/{id}',[VendorController::class,'edit'])->name('vendor_edit');
Route::put('vendors/update/{id}',[VendorController::class,'update'])->name('vendors_update');
Route::get('User/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/print/pdf/{id}',[InvoiceController::class,'printPDF'])->name('print.pdf');
Route::get('pdf/view/{id}',[InvoiceController::class,'viewpdf'])->name('view.pdf');
});
