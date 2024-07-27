<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\sclassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Student Class Routes
Route::get('/class',[sclassController::class,'Index']);
Route::post('/class/store',[sclassController::class,'store']);
Route::get('/class/edit/{id}',[sclassController::class,'Edit']);
Route::post('/class/update/{id}',[sclassController::class,'update']);
Route::post('/class/delete/{id}',[sclassController::class,'destroy']);



//Subject Class Routes
Route::get('/subject',[SubjectController::class,'Index']);
Route::post('/subject/store',[SubjectController::class,'store']);
Route::get('/subject/edit/{id}',[SubjectController::class,'Edit']);
Route::post('/subject/update/{id}',[SubjectController::class,'update']);
Route::post('/subject/delete/{id}',[SubjectController::class,'destroy']);


//Section Class Routes
Route::get('/section',[SectionController::class,'Index']);
Route::post('/section/store',[SectionController::class,'store']);
Route::get('/section/edit/{id}',[SectionController::class,'Edit']);
Route::post('/section/update/{id}',[SectionController::class,'update']);
Route::post('/section/delete/{id}',[SectionController::class,'destroy']);