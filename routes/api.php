<?php

use App\Http\Controllers\API\V1\ArticleController;
use App\Http\Controllers\API\V1\MenuController;
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

$routeGroup = function () {
    Route::namespace('API\V1')->group(function () {
        Route::get('menus',[MenuController::class, 'index']);
        Route::get('articles',[ArticleController::class, 'index']);
        Route::get('article/detail',[ArticleController::class, 'details']);
    });
};

Route::group(['prefix' => 'v1'], $routeGroup);
