<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
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
    return view('welcome');
});



Route::post('/input/customer/booking', [ServiceController::class, 'inputCustomer'])->name('inputCustomer');
// Route::post('/redirect-back', [UsageController::class, 'redirectBack']);


Route::get('/customer/service', [ServiceController::class, 'indexBiodata'])->name('indexBiodata')->middleware('auth.customer');
Route::get('/customer/service/booking/{nopol}', [ServiceController::class, 'onBooking'])->name('indexOnBooking')->middleware('auth.customer');
Route::get('/customer/service/onservice', [ServiceController::class, 'onService'])->name('indexOnService')->middleware('auth.customer');
Route::get('/input/customer/booking', [ServiceController::class, 'inputCustomer'])->name('inputBooking');
Route::get('/input/customer/booking', [ServiceController::class, 'inputCustomer'])->name('inputBooking');

Route::get('/data/wo', [ServiceController::class, 'dataWO'])->name('data.wo')->middleware('auth');
Route::get('/pelanggan/{id}', [ServiceController::class, 'getPelanggan'])->name('getPelanggan');

Route::get('/wo/table', [ServiceController::class, 'woTable'])->name('woTable');
Route::get('/dashboard/table', [ServiceController::class, 'dashboardTable'])->name('dashboardTable');
Route::get('/input/wo', [ServiceController::class, 'inputWO'])->name('inputWO');
Route::post('/submit/wo/baru', [ServiceController::class, 'submitWO'])->name('submitWO');
Route::post('/update/woTeknisi/{id}', [ServiceController::class, 'updateWO'])->name('updateWO');
Route::get('/detail/wo/{id}', [ServiceController::class, 'detailWO'])->name('detailWO');
Route::get('/detail/task/{id}', [ServiceController::class, 'detailTASK'])->name('detailTASK');


//AuthController
Route::get('/login/admin', [AuthController::class, 'tampilanLoginAdmin'])->name('login_admin');
Route::get('/logout/admin', [AuthController::class, 'logoutAdmin'])->name('logout_admin');
Route::post('/login/masuk/admin', [AuthController::class, 'LoginAdmin'])->name('proses_login_admin');
Route::get('/login/customer', [AuthController::class, 'masukCustomer'])->name('loginCustomer');
Route::get('/login/foreman', [AuthController::class, 'loginForeman'])->name('loginForeman');
Route::get('/logout/foreman', [AuthController::class, 'logoutForeman'])->name('logoutForeman');
Route::post('/login/masuk/Foreman', [AuthController::class, 'LoginForeman'])->name('proses_login_Foreman');
Route::get('/logout/customer', [AuthController::class, 'logoutCustomer'])->name('logoutCustomer');
Route::post('/login/masuk/customer', [AuthController::class, 'LoginCustomer'])->name('proses_login_customer');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/kasir', [AuthController::class, 'kasir'])->name('kasir');



Route::get('/foreman/{foremanId}/teknisi', [ServiceController::class, 'teknisiForeman'])->name('teknisiForeman');
Route::post('/wo/update-teknisi/{id}', [ServiceController::class, 'updateTeknisiInWo'])->name('updateTeknisiInWo');
