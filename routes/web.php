<?php
use App\Http\Middleware\ValidationUserMethod;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;

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
    return redirect()->route('main');
});
Route::middleware([\App\Http\Middleware\RegistrationMiddleware::class])->group(function () {
    Route::get('/authorization', 'ControllerAuthorization@index');
    Route::post('/authorization-action', 'ControllerAuthorization@authorization');
    Route::get('/registration', 'ControllerRegistration@index');
    Route::post('/registration-action', 'ControllerRegistration@registration');
});
Route::middleware([\App\Http\Middleware\AuthenticateMiddleware::class])->group(function () {
    Route::get('/main', 'ControllerMain@index')->name('main');
    Route::get('/logout', 'ControllerMain@logout');
    Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('error-transaction', [PayPalController::class, 'errorTransaction'])->name('error_page');
    Route::get('/pay', 'ControllerPayment@pay')->name('payment');
    Route::get('/download', 'ControllerMain@download');
});






