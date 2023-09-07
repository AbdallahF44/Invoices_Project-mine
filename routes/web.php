<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\InvoiceAchiveController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('invoices', \App\Http\Controllers\InvoiceController::class);
    Route::resource('sections', \App\Http\Controllers\SectionController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::get('/section/{id}', [InvoiceController::class, 'getproducts']);
    Route::get('/InvoicesDetails/{id}', [InvoiceDetailController::class, 'edit']);
    Route::get('View_file/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'open_file']);
    Route::post('delete_file', [InvoiceDetailController::class, 'destroy'])->name('delete_file');
    Route::get('download/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'get_file']);
    Route::resource('InvoiceAttachments', \App\Http\Controllers\InvoiceAttachmentController::class);
    Route::get('/edit_invoice/{id}', [InvoiceController::class,'edit']);
    Route::get('/Status_show/{id}', [InvoiceController::class,'show'])->name('Status_show');
    Route::post('/Status_Update/{id}', [InvoiceController::class,'Status_Update'])->name('Status_Update');
    Route::get('Invoice_Paid',[InvoiceController::class,'Invoice_Paid']);
    Route::get('Invoice_UnPaid',[InvoiceController::class,'Invoice_UnPaid']);
    Route::get('Invoice_Partial',[InvoiceController::class,'Invoice_Partial']);
    Route::resource('Archive', InvoiceAchiveController::class);
    Route::get('Print_invoice/{id}',[InvoiceController::class,'Print_invoice']);

    Route::get('/{page}', [AdminController::class, 'index']);
});
