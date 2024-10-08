<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebHookController;
use App\Http\Controllers\WalletController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/generated--webhook', [WebHookController::class, 'webhookHandler']);
Route::get('/get-generated-image/{order_id}',[WebHookController::class,'getGeneratedImageHandle']);
Route::get('/purchase/success/{userId}', [WalletController::class, 'purchaseSuccess'])->name('purchase.success');
Route::get('/purchase/cancel', [WalletController::class, 'purchaseCancel'])->name('purchase.cancel');
