<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryFoodController;
use App\Http\Controllers\LocalFoodController;
use App\Http\Controllers\FoodController;

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
// Local Food
Route::get("/Add-Local-Name",[LocalFoodController::class,"AddLocalName"])->name("Local.Add");
Route::get("/Local-Listings",[LocalFoodController::class,"LocalListings"])->name("Local.List");
Route::post("/Save-Local",[LocalFoodController::class,"SaveLocalFix"])->name("Local.Add.Save");
Route::get("/Hide-Local-Food/{LocalFoodID}",[LocalFoodController::class,"HideLocalFood"])->name("Local.List.Hide");
Route::get("/Show-Local-Food/{LocalFoodID}",[LocalFoodController::class,"ShowLocalFood"])->name("Local.List.Show");
Route::get("/Edit-Local/{LocalFoodID}",[LocalFoodController::class,"LocalEditing"])->name("Local.Edit");
Route::get("/Delete-Local/{LocalFoodID}",[LocalFoodController::class,"DeleteLocal"])->name("Local.Delete");
Route::post("Update-Local/{LocalFoodID}",[LocalFoodController::class,"UpdateLocal"])->name("Local.Update");
// Food
Route::get("/More-Dishes",[FoodController::class,"MoreDishes"])->name("Food.Add");
Route::get("/Food-List",[FoodController::class,"allFood"])->name("Food.List");
Route::post("/Save-Dishes",[FoodController::class,"saveFood"])->name("Food.Add.Save");
Route::get("/Hide-Dishes/{foodId}",[FoodController::class,"hideFood"])->name("Food.List.Hide");
Route::get("/Show-Dishes/{foodId}",[FoodController::class,"showFood"])->name("Food.List.Show");
Route::get("/Edit-Dishes/{foodId}",[FoodController::class,"editFood"])->name("Food.Edit");
Route::get("/Delete-Dishes/{foodId}",[FoodController::class,"deleteFood"])->name("Food.Delete");
Route::post("Update-Dishes/{foodId}",[FoodController::class,"updateFood"])->name("Food.Update");