<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;




Route::get('/',[taskController::class,'tasks'])->name('tasks');
Route::POST('/add-task',[taskController::class,'addTask'])->name('add.Task');
Route::POST('/update-task',[taskController::class,'updateTask'])->name('update.Task');
Route::POST('/delete-task',[taskController::class,'deleteTask'])->name('delete.Task');
Route::GET('/pagination/paginate-data',[taskController::class,'pagination']);
Route::GET('/search-task',[taskController::class,'searchTask'])->name('search.task');








