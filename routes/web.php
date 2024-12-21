<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'idea','middleware'=>['auth']],function(){
    Route::post('/',[IdeaController::class,'store'])->name('idea.create');
    Route::DELETE('/destroy/{idea}',[IdeaController::class,'destroy'])->name('idea.destroy');
    Route::get('/show/{idea}',[IdeaController::class,'show'])->name('idea.show')->withoutMiddleware(['auth']);
    Route::get('/edit/{idea}',[IdeaController::class,'edit'])->name('idea.edit');
    Route::put('/update',[IdeaController::class,'update'])->name('idea.update');
    Route::get('/update',[IdeaController::class,'search'])->name('idea.search');
});


Route::get('/',[DashboardController::class,'index'])->name('dashboard');


Route::post('/idea/{idea}/comments',[CommentController::class,'store'])->name('idea.comments.store')->middleware('auth');

