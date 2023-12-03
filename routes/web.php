<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('questions',[QuestionController::class,'index'])->name('questions.index');
Route::get('questions/create',[QuestionController::class, 'create'])->name('questions.create');
Route::post('questions',[QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/edit/{id}',[QuestionController::class,'edit'])->name('questions.edit');
Route::put('questions/{id}',[QuestionController::class, 'update'])->name('questions.update');
Route::delete('questions/{id}',[QuestionController::class,'delete'])->name('questions.delete');
Route::get('questions/{slug}',[QuestionController::class,'show'])->name('questions.show');


