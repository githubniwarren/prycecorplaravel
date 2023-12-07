<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CorpController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OtherController;


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

Route::post('/upload', [CompanyController::class,'upload']);
Route::get('/show', [CompanyController::class,'show']);

Route::post('/upload-disclosures', [OtherController::class,'uploadOtherDisclosures']);
Route::get('/show-disclosures', [OtherController::class,'showOtherDisclosures']);

Route::post('/upload-investor', [InvestorController::class,'uploadInvestor']);
Route::get('/show-investor', [InvestorController::class,'showInvestor']);

Route::post('/upload-stockholders', [InvestorController::class,'uploadStockholders']);
Route::get('/show-stockholders', [InvestorController::class,'showStockholders']);


Route::post('/upload-lar', [InvestorController::class,'uploadLar']);
Route::get('/show-lar', [InvestorController::class,'showLar']);

Route::post('/upload-articles', [AboutController::class,'uploadArticles']);
Route::get('/show-articles', [AboutController::class,'showArticles']);


Route::post('/upload-corp', [CorpController::class,'uploadCorp']);
Route::get('/show-corp', [CorpController::class,'showCorp']);

Route::post('/upload-manual', [CorpController::class,'uploadManual']);
Route::get('/show-manual', [CorpController::class,'showManual']);

Route::post('/upload-enterprise', [CorpController::class,'uploadEnterprise']);
Route::get('/show-enterprise', [CorpController::class,'showEnterprise']);

Route::post('/upload-news', [NewsController::class,'uploadNews']);
Route::get('/show-news', [NewsController::class,'showNews']);

Route::post('/send-email', [EmailController::class,'sendEmail']);





