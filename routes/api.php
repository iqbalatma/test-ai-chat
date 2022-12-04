<?php

use App\Http\Controllers\API\V1\RedeemController;
use App\Http\Controllers\API\V1\UploadPhotoController;
use App\Http\Controllers\API\V1\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(RedeemController::class)
    ->prefix("/redeem")
    ->name("redeem.")
    ->group(function (){
        Route::get("/{campaignCode}", "redeem")->name("index");
    });

Route::controller(UploadPhotoController::class)
    ->prefix("/upload-photo")
    ->name("upload.photo.")
    ->group(function (){
        Route::post("/", "upload")->name("upload");
    });

Route::controller(VoucherController::class)
    ->prefix("/vouchers")
    ->name("vouchers.")
    ->group(function (){
        Route::get("/{customerEmail}", "show")->name("show");
    });