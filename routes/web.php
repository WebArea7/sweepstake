<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/thank', [CustomerController::class, 'thank'])->name('thank');

Route::get('/step-one', [CustomerController::class, 'createStepOne'])->name('steps.step.one');
Route::post('/step-one', [CustomerController::class, 'postCreateStepOne']);
Route::get('/step-two', [CustomerController::class, 'createStepTwo'])->name('steps.step.two');
Route::post('/step-two', [CustomerController::class, 'postCreateStepTwo']);
Route::get('/step-three', [CustomerController::class, 'createStepThree'])->name('steps.step.three');
Route::post('/step-three', [CustomerController::class, 'postCreateStepThree']);

Route::get('/admin-login', [LoginController::class, 'index'])->name('login');
Route::post('/admin-login', [LoginController::class, 'store']);
Route::post('/admin-logout', [LogoutController::class, 'store'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::post('/users/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/password/{user}', [UserController::class, 'editPassword'])->name('admin.users.edit_password');

    Route::get('/customers', [CustomerController::class, 'adminAllCustomers'])->name('admin.customers');
    Route::get('/customers/{customer}', [CustomerController::class, 'adminShowCustomer'])->name('admin.customers.show');
    Route::post('/customers/choose', [CustomerController::class, 'adminChooseWinner'])->name('admin.customers.choose');
    Route::post('/customers/reset-winner', [CustomerController::class, 'adminResetWinner'])->name('admin.customers.reset_winner');
    Route::post('/customers/reset-customers', [CustomerController::class, 'adminResetCustomers'])->name('admin.customers.reset_customers');
});
