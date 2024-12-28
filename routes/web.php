<?php

use App\Http\Controllers\TaskDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('create/', [TaskDataController::class,'taskCreate'])->name('create');

Route::post('store/', [TaskDataController::class,'storeData'])->name('store');

