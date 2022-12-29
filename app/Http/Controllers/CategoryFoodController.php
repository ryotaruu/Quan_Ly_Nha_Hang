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
}
