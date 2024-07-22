<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\BreweryApiController;

use App\Http\Middleware\Api as ApiAuthMiddleware;

/**
 * Standard route for user information
 */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * Free route for login - No mdw
 */
Route::post('/auth/login', [AuthController::class, 'login'])->name('api.login');

/**
 * Auth routes
 */
Route::group([
    'middleware' => ApiAuthMiddleware::class,
    'prefix' => 'auth'
    ], function ($router) {
    /**
     * Not necessary 
     */
    // Route::post('/register', [AuthController::class, 'register']); 
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'userProfile']);
});

Route::prefix( 'brewery' )
    ->middleware( ApiAuthMiddleware::class )
    ->group( function() {
        Route::get( 'beers' , [BreweryApiController::class, 'getAllBeers'] );
    });