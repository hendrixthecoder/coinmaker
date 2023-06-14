<?php

use App\Http\Controllers\Admin\AdminActionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\UserActionController;
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

Route::get('/', [ FrontController::class, 'home' ])->name('home');
Route::get('/about-us', [ FrontController::class, 'about'])->name('about');
Route::get('/contact-us', [ FrontController::class, 'contact'])->name('contact');

Route::get('/register', [ AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [ AuthController::class, 'create'])->name('registerUser');

Route::get('/login', [AuthController::class, 'loginPage' ])->name('login');
Route::post('/login', [ AuthController::class, 'login'])->name('loginUser');


Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [ AuthController::class, 'logout'] )->name('logout');
    
    Route::get('/dashboard', [ PageController::class, 'dashboard'])->name('userDashboard');
    Route::get('/deposits', [ PageController::class, 'deposits'])->name('deposits');
    Route::post('/deposits', [ UserActionController::class, 'sendAmount' ])->name('sendAmount');

    Route::get('/make-payment', [ PageController::class, 'makePayment' ])->name('makePayment');
    Route::post('/make-payment', [ UserActionController::class, 'create' ])->name('makeDeposit');

    //ADMIN ROUTES
    Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [ AdminPageController::class, 'dashboard' ])->name('admin.dashboard');
        Route::get('/deposits', [ AdminPageController::class, 'deposits'])->name('manageDeposits');

        Route::post('approve-deposit', [ AdminActionController::class, 'approveDeposit' ])->name('approveDeposit');
        Route::post('decline-deposit', [ AdminActionController::class, 'declineDeposit' ])->name('declineDeposit');
    });
});