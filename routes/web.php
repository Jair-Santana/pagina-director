<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/work', 'App\Http\Controllers\WorkController@displayWork')->name('work');
Route::get('/reels', 'App\Http\Controllers\WorkController@displayReels')->name('reels');
Route::get('/archives', 'App\Http\Controllers\WorkController@displayArchives')->name('archives');
Route::get('/contact', 'App\Http\Controllers\ContactController@displayContact')->name('contact');
Route::get('/admin', 'App\Http\Controllers\AdminController@displayLogin')->name('admin');
Route::post('/admin', 'App\Http\Controllers\AdminController@checkLogin')->name('admin');
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts.store');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts.destroy');
Route::post('redirectToVideoView', 'App\Http\Controllers\VideoController@redirectToVideoView')->name('redirectToVideoView');
Route::get('/redirectToVideoView', 'App\Http\Controllers\VideoController@redirectToVideoView')->name('redirectToVideoView');
Route::post('/sendemail', 'App\Http\Controllers\ContactController@sendEmail')->name('sendemail');