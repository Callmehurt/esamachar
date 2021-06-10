<?php

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

//Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Backend\NewsCategoryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Frontend\FrontendController;

//Frontend routes
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/all/news', [FrontendController::class, 'newsCategory'])->name('frontend.newsCategory');
Route::get('/news/{slug}', [FrontendController::class, 'viewNews'])->name('frontend.viewNews');








Route::get('/admin', [LoginController::class, 'index'])->name('login');
Route::post('/login/user', [LoginController::class, 'doLogin'])->name('login.user');
Route::get('/logout/user', [LoginController::class, 'logout'])->name('logout.user');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:superadministrator']], function() {
    Route::get('/register/user', [RegisterController::class, 'index'])->name('register.page');
    Route::post('/register/user', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:superadministrator|administrator']], function() {

    //News categories
    Route::get('/news/categories', [NewsCategoryController::class, 'index'])->name('newsCategory.index');
    Route::get('/news/categories/getNewsCategories', [NewsCategoryController::class, 'getNewsCategories'])->name('newsCategory.getNewsCategories');
    Route::post('/news/categories', [NewsCategoryController::class, 'store'])->name('newsCategory.store');
    Route::get('/news/category/status/{id}', [NewsCategoryController::class, 'status'])->name('newsCategory.status');
    Route::get('/news/category/destroy/{id}', [NewsCategoryController::class, 'destroy'])->name('newsCategory.destroy');
    Route::get('/news/category/edit/{id}', [NewsCategoryController::class, 'edit'])->name('newsCategory.edit');
    Route::post('/news/category/update', [NewsCategoryController::class, 'update'])->name('newsCategory.update');


    //News routes
    Route::get('/news/lists', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/getNews', [NewsController::class, 'getNews'])->name('news.getNews');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/status/{id}', [NewsController::class, 'status'])->name('news.status');
    Route::get('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update', [NewsController::class, 'update'])->name('news.update');
});

//Route::group(['middleware' => ['auth']], function () {
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/register/user', [RegisterController::class, 'index'])->name('register.page');
//    Route::post('/register/user', [RegisterController::class, 'register'])->name('register.user');
//});