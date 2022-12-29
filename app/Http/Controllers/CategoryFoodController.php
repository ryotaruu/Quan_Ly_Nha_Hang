<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryFoodController extends Controller
{
    public function AddCategory()
    {
        return view("admin.AddCategoryFood");
    }
    public function ListCategory()
    {
        $listCategoryFood = DB::table("tbl_category_food")->get();
        $managerCategoryFood = view("admin.ListCategoryFood")->with("ListCategoryFood",$listCategoryFood);
        return view("admin.adminLayout")->with("admin.ListCategoryFood",$managerCategoryFood);
    }
    public function SaveCategory(Request $request)
    {
        $data = array();
        $data["category_name"] = $request->NameCategory;
        $data["category_desc"] = $request->DescribeCategory;
        $data["category_status"] = $request->CategoryStatus;
        DB::table('tbl_category_food')->insert($data);
        session()->put("message","Add Category Food Successful");
        return Redirect("/Add-Category");
    }
    public function HideCategoryFood($CategoryFoodID)
    {
        DB::table("tbl_category_food")->where("category_id",$CategoryFoodID)->update(["category_status"=>1]);
        session()->put("message","Show category successful");
        return Redirect("/List-Category");
    }
    public function ShowCategoryFood($CategoryFoodID)
    {
        DB::table("tbl_category_food")->where("category_id",$CategoryFoodID)->update(["category_status"=>0]);
        session()->put("message","Hide category successful");
        return Redirect("/List-Category");
    }
    public function EditCategory($CategoryFoodID)
    {
        $EditCategoryFood = DB::table("tbl_category_food")->where("category_id",$CategoryFoodID)->get();
        $managerCategoryFood = view("admin.EditCategoryFood")->with("EditCategoryFood",$EditCategoryFood);
        return view("admin.adminLayout")->with("admin.EditCategoryFood",$managerCategoryFood);
    }
    public function UpdateCategory(Request $request,$category_food_id){
        $data = array();
        $data["category_name"] = $request->NameCategory;
        $data["category_desc"] = $request->DescribeCategory;
        DB::table('tbl_category_food')->where('category_id',$category_food_id)->update($data);
        session()->put('message','Update category successful');
        return Redirect()->route('Category.List');
    }
    public function DeleteCategory($CategoryFoodID){
        DB::table('tbl_category_food')->where('category_id',$CategoryFoodID)->delete();
        session()->put('message','Delete category successful');
        return Redirect()->route('Category.List');
    }
}
