<?php

use App\Http\Controllers\JemaatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TermsAndConditionController;
use App\Http\Controllers\MarriageApplicationController;

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
    return redirect('/login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/otp/verify', [LoginController::class, 'showVerifyOtpForm'])->name('otp.verify');
Route::post('/otp/verify', [LoginController::class, 'verifyOtp'])->name('otp.verify');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('ketua_stasi')->group(function () {
        Route::get('data-jemaat', [UserController::class, 'getAllJemaat'])->name('getAllJemaat');
        Route::post('simpan-data-jemaat', [UserController::class, 'storeDataJemaat'])->name('storeDataJemaat');
        Route::get('data-jemaat/{id}', [UserController::class, 'getDataJemaat'])->name('getDataJemaat');
        Route::put('update-jemaat/{id}', [UserController::class, 'updateDataJemaat'])->name('updateDataJemaat');
        Route::delete('/hapus-jemaat/{id}', [UserController::class, 'destroy'])->name('hapusJemaat');
        Route::resource('terms_and_conditions', TermsAndConditionController::class)->except(['create', 'show']);
        Route::get('/data-marriage-applications', [MarriageApplicationController::class, 'getMarriageApplicationsData'])->name('getMarriageApplicationsData');
        Route::post('/marriage-applications/{id}/approve', [MarriageApplicationController::class, 'approveMarriageApplications'])->name('approveMarriageApplications');
    });

    Route::prefix('jemaat')->group(function () {
        Route::get('persyaratan-pernikahan', [JemaatController::class, 'getTermsAndCondition'])->name('getTermsAndCondition');
        Route::get('pengajuan-pernikahan', [JemaatController::class, 'showMarriageApplicationsForm'])->name('showMarriageApplicationsForm');
        Route::post('store-pengajuan-pernikahan', [JemaatController::class, 'storeMarriageApplicationsForm'])->name('storeMarriageApplicationsForm');
        Route::get('status-pengajuan-pernikahan', [JemaatController::class, 'getMarriageApplicationStatus'])->name('getMarriageApplicationStatus');
    });


});
