<?php

use App\Http\Controllers\Admin\AdminActionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\User\FundsController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\UserActionController;
use App\Http\Middleware\AdminAuthenticator;
use App\Mail\ContactUsMail;
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
Route::post('/contact-us', [ FrontController::class, 'sendMessage' ])->name('sendmessage');

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

    Route::get('/investment-plans', [ PageController::class, 'plans' ])->name('plans');
    Route::post('/investment-plans', [ FundsController::class, 'joinPlan' ])->name('joinPlan');

    Route::get('/update-account', [ PageController::class, 'updateAccount' ])->name('updateAccount');
    Route::post('/update-account', [ UserActionController::class, 'updateAccount' ])->name('postUpdateAccount');
    Route::post('/change-password', [ UserActionController::class, 'changePassword' ])->name('changePassword');

    Route::get('withdrawal-info', [ PageController::class, 'withdrawalInfo' ])->name('withdrawal-info');
    Route::post('/withdrawal-info', [ UserActionController::class, 'editWithdrawalInfo' ])->name('edit-withdrawal');
    
    Route::get('/support', [ PageController::class, 'support' ])->name('support');

    Route::get('/transaction-history', [ PageController::class, 'transactionHistory' ])->name('transaction-history');
    Route::get('/my-plans', [ PageController::class, 'myPlans' ])->name('userPlans');

    Route::get('/withdrawals', [ PageController::class, 'withdrawals' ])->name('withdrawals');
    Route::post('/withdrawals', [ FundsController::class, 'newWithdrawal' ])->name('newWithdrawals');
    
    //ADMIN ROUTES
    Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function () {
        
        Route::get('/dashboard', [ AdminPageController::class, 'dashboard' ])->name('admin.dashboard');
        
        Route::get('/manage-deposits', [ AdminPageController::class, 'deposits'])->name('manageDeposits');
        Route::post('approve-deposit', [ AdminActionController::class, 'approveDeposit' ])->name('approveDeposit');
        Route::post('decline-deposit', [ AdminActionController::class, 'declineDeposit' ])->name('declineDeposit');

        Route::get('/manage-users', [ AdminPageController::class, 'manageUsers' ])->name('manageUsers');
        Route::post('/credit-user', [ AdminActionController::class, 'creditUser' ])->name('creditUser');
        Route::post('/debit-user', [ AdminActionController::class, 'debitUser' ])->name('debitUser');

        Route::get('/investment-plans', [ AdminPageController::class, 'plans' ])->name('admin.plans');
        Route::post('/investment-plans', [ AdminActionController::class, 'createPlan' ])->name('admin.create.plans');

        Route::get('/manage-withdrawals', [ AdminPageController::class, 'manageWithdrawals' ])->name('manageWithdrawals');
        Route::post('/approve-withdrawals', [ AdminActionController::class, 'approveWithdrawal' ])->name('approveWithdrawal');
        Route::post('/decline-withdrawals', [ AdminActionController::class, 'declineWithdrawal' ])->name('declineWithdrawal');
    });
    
});