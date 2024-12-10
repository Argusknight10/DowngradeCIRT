<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\TrashedArticleController;
use App\Http\Controllers\Admin\TrashedReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Artisan command
Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

// Article resource
Route::resource('articles', ArticleController::class)->only(['index', 'show'])->scoped(['article' => 'slug']);

// Report resource
Route::get('reports', [ReportController::class, 'create'])->name('reports.create');
Route::post('reports/store', [ReportController::class, 'store'])->name('reports.store');

// Route Auth
// Login
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');
// Logout
Route::delete('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route Admin
Route::group([
    'prefix' => 'dashboard',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('articles', AdminArticleController::class)->scoped(['article' => 'slug']);
    Route::resource('reports', AdminReportController::class)->except([
        'create', 'store'
    ]);
    Route::resource('users', AdminUserController::class);

    Route::get('trashed-articles', [TrashedArticleController::class, 'index'])->name('trashed.articles.index');
    Route::post('trashed-articles/{article:slug}', [TrashedArticleController::class, 'restore'])
        ->name('trashed.articles.restore');
    Route::delete('trashed-articles/{article:slug}', [TrashedArticleController::class, 'force'])
        ->name('trashed.articles.force');

    Route::get('trashed-reports', [TrashedReportController::class, 'index'])->name('trashed.reports.index');
    Route::post('trashed-reports/{report}', [TrashedReportController::class, 'restore'])
        ->name('trashed.reports.restore');
    Route::delete('trashed-reports/{report}', [TrashedReportController::class, 'force'])
        ->name('trashed.reports.force');
});
