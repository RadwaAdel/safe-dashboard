<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController,ProfileController};
use \App\Http\Controllers\RevenuesController;
use \App\Http\Controllers\CompanyController;
use \App\Http\Controllers\BankController;
use \App\Http\Controllers\ExpenseController;
use \App\Http\Controllers\RegistrationController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\RevenueReceiptController;
use \App\Http\Controllers\ExpReceiptController;
use \App\Http\Controllers\ExpenseReceiptController;
use \App\Http\Controllers\ReportController;

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
    return view('admin.auth.login');
});
Route::get('admin/login',[AuthController::class,'getLogin'])->name('get-login');
Route::post('admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::group(['middleware' => ['admin_auth']],function(){
    Route::get('admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');

Route::get('all-users',[UserController::class,'index'])->name('all.users')->middleware('can:manage_users');
Route::get('edit-user/{id?}',[UserController::class,'edit'])->name('edit.user')->middleware('can:manage_users');
Route::put('update-users/{id?}',[UserController::class,'update'])->name('update.user')->middleware('can:manage_users');
Route::delete('delete-users/{id?}',[UserController::class,'destroy'])->name('delete.user')->middleware('can:manage_users');
Route::get('new-user', [RegistrationController::class,'create'])->middleware('can:manage_users');
Route::post('store-user', [RegistrationController::class,'store'])->name('store.user')->middleware('can:manage_users');



Route::get('all-rev',[RevenuesController::class,'index'])->name('revenues.index');
Route::get('create-rev',[RevenuesController::class,'create'])->name('revenues.create');
Route::post('store-rev',[RevenuesController::class,'store'])->name('revenues.store');
Route::get('edit-rev/{id?}',[RevenuesController::class,'edit'])->name('revenues.edit');
Route::put('update-rev/{id?}',[RevenuesController::class,'update'])->name('revenues.update');
Route::delete('delete-rev/{id?}',[RevenuesController::class,'destroy'])->name('revenues.destroy');

Route::get('all-companies',[CompanyController::class,'index'])->name('company.index');
Route::get('create-company',[CompanyController::class,'create'])->name('company.create');
Route::post('store-company',[CompanyController::class,'store'])->name('company.store');
Route::get('edit-company/{id?}',[CompanyController::class,'edit'])->name('company.edit');
Route::put('update-company/{id?}',[CompanyController::class,'update'])->name('company.update');
Route::delete('delete-company/{id?}',[CompanyController::class,'destroy'])->name('company.destroy');

Route::get('all-banks',[BankController::class,'index'])->name('bank.index');
Route::get('create-bank',[BankController::class,'create'])->name('bank.create');
Route::post('store-bank',[BankController::class,'store'])->name('bank.store');
Route::get('edit-bank/{id?}',[BankController::class,'edit'])->name('bank.edit');
Route::put('update-bank/{id?}',[BankController::class,'update'])->name('bank.update');
Route::delete('delete-bank/{id?}',[BankController::class,'destroy'])->name('bank.destroy');

Route::get('all-expenses',[ExpenseController::class,'index'])->name('expenses.index');
Route::get('create-exp',[ExpenseController::class,'create'])->name('expense.create');
Route::post('store-exp',[ExpenseController::class,'store'])->name('expense.store');
Route::get('edit-exp/{id?}',[ExpenseController::class,'edit'])->name('expense.edit');
Route::put('update-exp/{id?}',[ExpenseController::class,'update'])->name('expense.update');
Route::delete('delete-exp/{id?}',[ExpenseController::class,'destroy'])->name('expense.destroy');

Route::get('all-receipt', [RevenueReceiptController::class, 'index'])->name('receipt.index');
Route::get('create-receipt', [RevenueReceiptController::class, 'create'])->name('receipt.create');
Route::Post('store-receipt', [RevenueReceiptController::class, 'store'])->name('receipt.store');
Route::get('edit-receipt/{id?}',[RevenueReceiptController::class,'edit'])->name('receipt.edit');
Route::put('update-receipt/{id?}',[RevenueReceiptController::class,'update'])->name('receipt.update');
Route::delete('/receipt/{id}', [RevenueReceiptController::class,'destroy'])->name('receipt.destroy');

Route::get('all-exreceipt', [ExpenseReceiptController::class, 'index'])->name('exreceipt.index');
Route::get('create-exreceipt', [ExpenseReceiptController::class, 'create'])->name('exreceipt.create');
Route::post('store-exreceipt', [ExpenseReceiptController::class, 'store'])->name('exreceipt.store');
Route::get('edit-exreceipt/{id?}',[ExpenseReceiptController::class,'edit'])->name('exreceipt.edit');
Route::put('update-exreceipt/{id?}',[ExpenseReceiptController::class,'update'])->name('exreceipt.update');
Route::delete('/exreceipt/{id}', [ExpenseReceiptController::class,'destroy'])->name('exreceipt.destroy');

Route::get('report-bank',[ReportController::class,'showBankReport'])->name('report-bank');
Route::get('report-cash',[ReportController::class,'showCashReport'])->name('report-cash');
Route::get('all-report-bank',[ReportController::class,'showTotalBank'])->name('all-report-bank');
Route::get('all-report-cash',[ReportController::class,'showTotalCash'])->name('all-report-cash');

});
