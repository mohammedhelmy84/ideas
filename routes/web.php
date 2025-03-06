<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
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

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
//Route::group(['prefix'=>'idea','middleware'=>['auth']],function(){
    // Route::post('/',[IdeaController::class,'store'])->name('idea.create');
    // Route::DELETE('/destroy/{idea}',[IdeaController::class,'destroy'])->name('idea.destroy');
    // Route::get('/show/{idea}',[IdeaController::class,'show'])->name('idea.show')->withoutMiddleware(['auth']);
    // Route::get('/edit/{idea}',[IdeaController::class,'edit'])->name('idea.edit');
    // Route::put('/update',[IdeaController::class,'update'])->name('idea.update');
    // Route::get('/update',[IdeaController::class,'search'])->name('idea.search');
    // Route::post('/{idea}/comments',[CommentController::class,'store'])->name('idea.comments.store')->middleware('auth');
//});

Route::resource('/idea',IdeaController::class)->except(['index'])->middleware('auth');
Route::resource('/idea',IdeaController::class)->only(['show']);


Route::resource('idea.comments',CommentController::class)->only(['store'])->middleware('auth');

Route::resource('/users',UserController::class)->only(['show','edit','update'])->middleware('auth');
Route::get('/profile',[UserController::class,'profile'])->middleware('auth')->name('profile');

Route::post('/users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike');
Route::get('feed',FeedController::class)->middleware('auth')->name('feed');

// Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth','admin']);
// Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);

Route::get('/terms',function(){
    return view('terms');
})->name('terms');