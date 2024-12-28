<?php

use App\Models\TaskData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskDataController;

Route::get('/', function () {
    return view('welcome', ['tasks' => TaskData::all()]);
})->name('home');

Route::get('create/', [TaskDataController::class, 'taskCreate'])->name('create');

Route::post('store/', [TaskDataController::class, 'storeData'])->name('store');


Route::get('edit/', [TaskDataController::class, 'edittask'])->name('edit');