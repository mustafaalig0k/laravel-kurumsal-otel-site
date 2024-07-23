<?php

use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [FrontController::class, "index"])->name('index');
//Route::get('/', function () {
//    return view('front/index');
//});

Route::get('/hakkimizda', [App\Http\Controllers\Front\AboutController::class, 'about']);
Route::get('/belgelerimiz', [App\Http\Controllers\Front\DocumentsController::class, 'documents']);

Route::prefix("admin")->name('admin.')->middleware("auth")->group(function () {

    Route::get("/", [DashboardController::class, 'index'])->name('index');
    Route::get("/order", [DashboardController::class, 'index'])->name('orders');

});

// Route::get("/admin", [DashboardController::class, "index"]);

/**Auth**/
Route::prefix('kayit-ol')->middleware('throttle:registration')->group(function()
{

Route::get('/', [RegisterController::class, 'showForm'])->name('register');
Route::post('/', [RegisterController::class, 'register']);

});
Route::prefix('giris')->middleware('throttle:100,60')->group(function()
{
    Route::get('/', [LoginController::class, 'showForm'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dogrula/{token}', [RegisterController::class, 'verify'])->name('verify');
