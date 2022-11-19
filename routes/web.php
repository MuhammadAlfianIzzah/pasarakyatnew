<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NegaraController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");


Route::prefix('setting')->group(function () {
    Route::get("/negara", [NegaraController::class, "index"])->name("negara-index");
    Route::post("/negara", [NegaraController::class, "store"])->name("negara-store");
    Route::delete("/negara/{negara:slug}", [NegaraController::class, "destroy"])->name("negara-destroy");
    Route::get("/negara/edit/{negara:slug}", [NegaraController::class, "edit"])->name("negara-edit");
});
