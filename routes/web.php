<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryFoodController;

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
// Category Food
Route::get("/Add-Category",[CategoryFoodController::class,"AddCategory"])->name("Category.Add");
Route::get("/List-Category",[CategoryFoodController::class,"ListCategory"])->name("Category.List");
Route::post("/Save-Category",[CategoryFoodController::class,"SaveCategory"])->name("Category.Add.Save");
Route::get("/Hide-Category-Food/{CategoryFoodID}",[CategoryFoodController::class,"HideCategoryFood"])->name("Category.List.Hide");
Route::get("/Show-Category-Food/{CategoryFoodID}",[CategoryFoodController::class,"ShowCategoryFood"])->name("Category.List.Show");
Route::get("/Edit-Category/{CategoryFoodID}",[CategoryFoodController::class,"EditCategory"])->name("Category.Edit");
Route::get("/Delete-Category/{CategoryFoodID}",[CategoryFoodController::class,"DeleteCategory"])->name("Category.Delete");
Route::post("Update-Category/{category_food_id}",[CategoryFoodController::class,"UpdateCategory"])->name("Category.Update");