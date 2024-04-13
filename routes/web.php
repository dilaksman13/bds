<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
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


Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/blog', [BlogController::class, 'index'])->name('index'); //blog index page
Route::get('/blog/{pid}', [BlogController::class, 'index'])->name('index'); //blog index page
Route::post('/blogform', [BlogController::class, 'create'])->name('create'); //blog create blogs
Route::get('/blogdelete/{id}', [BlogController::class, 'delete'])->name('delete'); //register create page
Route::get('/blogedit/{id}', [BlogController::class, 'edit'])->name('edit');
Route::post('/editblogform', [BlogController::class, 'update'])->name('update');
Route::post('/blogsearch', [BlogController::class, 'search'])->name('search');


Route::get('/news', [NewsController::class, 'index'])->name('index');
Route::post('/newsform', [NewsController::class, 'create'])->name('create');
Route::get('/newsdelete/{id}', [NewsController::class, 'delete'])->name('delete'); //register create page
Route::get('/newsedit/{id}', [NewsController::class, 'edit'])->name('edit');
Route::post('/editnewsform', [NewsController::class, 'update'])->name('update');
Route::get('/newssearch', [NewsController::class, 'search'])->name('search');


Route::get('/register', [RegisterController::class, 'index'])->name('index'); //register index page
Route::post('/registerform', [RegisterController::class, 'create'])->name('create'); //register create page
Route::get('/registerdelete/{id}', [RegisterController::class, 'delete'])->name('delete'); //register create page
Route::get('/registeredit/{id}', [RegisterController::class, 'edit'])->name('edit');
Route::post('/editregisterform', [RegisterController::class, 'update'])->name('update');
Route::post('/registersearch', [RegisterController::class, 'search'])->name('search');

