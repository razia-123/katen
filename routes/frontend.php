<?php

use App\Http\Controllers\FrontendCategoryController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;








    Route::get('/',[HomePageController::class,'index'])->name('home');
    Route::get('/category/{slug}',[FrontendCategoryController::class,'category'])->name('category');
    Route::get('/post/{slug}',[HomePageController::class,'showPost'])->name('showPost');


