<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $category = DB::table('tbl_category_food')->where('category_status','1')->orderby('category_id','desc')->get();
        $local = DB::table('tbl_local')->where('local_status','1')->orderby('local_id','desc')->get();
        $allFood = DB::table("tbl_dishes")->join('tbl_category_food','tbl_category_food.category_id','=','tbl_dishes.category_id')->join('tbl_local','tbl_local.local_id','=','tbl_dishes.local_id')->orderby('dishes_id','desc')->get();
        $allFoodNew = DB::table('tbl_dishes')->where('dishes_status','1')->orderBy('dishes_id','desc')->get();
        return view("pages.home")->with('category',$category)->with('local',$local)->with('food',$allFoodNew);
    }
}
