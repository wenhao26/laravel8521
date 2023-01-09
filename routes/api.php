<?php

use App\Http\Controllers\api\TestController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apiTest', function () {
    return 123;
});

// 测试
Route::get('info', [TestController::class, 'list'])->setBindingFields(['is_list' => true]);
Route::get('info', [TestController::class, 'info']);
