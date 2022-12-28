<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
// FrontEnd
Route::get('/', [HomeController::class, "index"]);
Route::get("/Home", function(){
    return view('pages.home');
})->name("home");
// BackEnd
Route::get("/Admin",[AdminController::class, "index"])->name("Admin");
Route::get("/Dashboard-Admin",[AdminController::class, "dashboardAdmin"])->name("Dashboard");
Route::post("/Dashboard-Admin",[AdminController::class, "dashboard"])->name("Dashboard.Admin");
Route::get("/Sign-Out",[AdminController::class,"SignOut"])->name("Admin.SignOut");