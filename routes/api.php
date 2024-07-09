<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ResenasController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Movies  
Route::get('movies',[MoviesController::class, 'index']);
Route::post('getMovieById',[MoviesController::class, 'getMovieById']);
Route::post('getMoviesByName',[MoviesController::class, 'getMoviesByName']);
//Reviews
Route::get('resenas',[ResenasController::class, 'index']);
Route::post('getFilteredReviews',[ResenasController::class, 'getFilteredReviews']);
//Auth
Route::post('signUp',[AuthController::class,'signUp']);
Route::post('login',[AuthController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function (){
    //Auth
    Route::get('logout',[AuthController::class,'logout']);
    //Movies    

    Route::post('addMovie',[MoviesController::class, 'addMovie']);
    
    //Reviews
    
    Route::post('addReview',[ResenasController::class, 'addReview']);
});