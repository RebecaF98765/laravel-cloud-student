<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', [StudentController::class, 'index'])->name('index');

Route::get('/index', [StudentController::class, 'index'])->name('index');

Route::get('/create', [StudentController::class,'create'])->name('create');

Route::post('/new', [StudentController::class,'new'])->name('new');

Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');

Route::put('/update/{id}', [StudentController::class,'update'])->name('update');

Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');










