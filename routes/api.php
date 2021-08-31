<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\FixedIncomeController;
use App\Http\Controllers\FixedExpenseController;
use App\Http\Controllers\CurrentIncomeController;
use App\Http\Controllers\CurrentExpenseController;
use App\Http\Controllers\CategoryController;
//also added
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product',[ProductController::class, 'index']);
Route::get('/admin',[AdminsController::class, 'index']);
Route::get('/fixedincome',[FixedIncomeController::class,'index']);
Route::get('/fixedexpense',[FixedExpenseController::class,'index']);
Route::get('/currentincome',[CurrentIncomeController::class,'index']);
Route::get('/currentexpense',[CurrentExpenseController::class,'index']);



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});

Route::delete('/fixedincome',[FixedIncomeController::class,'destroy']);
Route::delete('/fixedexpense',[FixedExpenseController::class,'destroy']);
Route::delete('/currentincome',[CurrentIncomeController::class,'destroy']);
Route::delete('/currentexpense',[CurrentExpenseController::class,'destroy']);
Route::post('postfixedexpense',[FixedExpenseController::class,'store']);
Route::post('postfixedincome',[FixedIncomeController::class,'store']);
Route::post('postrecurringincome',[CurrentIncomeController::class,'store']);
Route::post('postrecurringexpense',[CurrentExpenseController::class,'store']);
Route::get('categories',[CategoryController::class,'index']);