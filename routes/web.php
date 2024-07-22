<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\PagesController as Pages;

use App\Http\Middleware\ProtectedPages as PagesAuth;

Route::get( '/refresh', [Auth::class, 'refresh' ] )->name('refresh');
Route::post( '/login' , [Auth::class, 'postLogin'] )->name('login');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get( '/all-beers', [Pages::class, 'beerList'] )->name('beer-list');

Route::get( '/login' , function() {
    return view('pages.login');
})->name( 'login' );