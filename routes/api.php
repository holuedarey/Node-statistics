<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NodeController;

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
Route::get('/test', function(){
    dd(\Illuminate\Support\Facades\DB::connection()->getPdo());
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'nodes'
], function ($router) {
    Route::post('/create', [NodeController::class, 'createNode']);
    Route::get('/view', [NodeController::class, 'viewAllNode']);
    Route::get('/view/{id}', [NodeController::class, 'viewNode']);
    Route::patch('/update/{id}', [NodeController::class, 'updateNode']);
    Route::delete('/delete/{id}', [NodeController::class, 'deleteNode']);

});
Route::any('{path}', function() {
    return response()->json([
        'message' => 'Route not found'
    ], 404);
})->where('path', '.*');

