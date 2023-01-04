<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function authLogin()
    {
        $adminId = session()->get('admin_id');
        if ($adminId) {
            return Redirect::to('Dashboard-Admin');
        }
        else{
            return Redirect::to('Admin')->send();
        }
    }
    public function MoreDishes()
    {
        $this->authLogin();
        $categoryFood = DB::table('tbl_category_food')->orderby('category_id','desc')->get();
        $localFood = DB::table('tbl_local')->orderby('local_id','desc')->get();
        return view("admin.food.add_food")->with('categoryFood',$categoryFood)->with('localFood',$localFood);
    }
    public function allFood()
    {
        $this->authLogin();
        $allFood = DB::table("tbl_dishes")->join('tbl_category_food','tbl_category_food.category_id','=','tbl_dishes.category_id')->join('tbl_local','tbl_local.local_id','=','tbl_dishes.local_id')->orderby('dishes_id','desc')->get();
        $managerFood = view("admin.food.allFood")->with("allFood",$allFood);
        return view("admin.adminLayout")->with("admin.food.allFood",$managerFood);
    }
    public function saveFood(Request $request)
    {
        $this->authLogin();
        $data = array();
        $data["dishes_name"] = $request->foodName;
        $data["dishes_desc"] = $request->foodDescribe;
        $data["dishes_content"] = $request->foodContent;
        $data["dishes_price"] = $request->foodPrice;
        $data["dishes_status"] = $request->foodStatus;
        $data["category_id"] = $request->categoryFood;
        $data["local_id"] = $request->localFood;
        $getImage = $request->file('foodImage');
        if ($getImage) {
            $getNameImage = $getImage->getClientOriginalName();
            $newNameImage = current(explode('.', $getNameImage));
            $newImage = $newNameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/upload/food',$newImage);
            $data['dishes_image'] = $newImage;
            DB::table('tbl_dishes')->insert($data);
            session()->put("message","Thêm món ăn thành công");
            return Redirect('/More-Dishes');
        }
        $data['dishes_image'] = 'Không có hình ảnh';
        DB::table('tbl_dishes')->insert($data);
        session()->put("message","Thêm món ăn thành công");
        return Redirect('/More-Dishes');
    }
    public function hideFood($foodId)
    {
        $this->authLogin();
        DB::table("tbl_dishes")->where("dishes_id",$foodId)->update(["dishes_status"=>1]);
        session()->put("message","Hiển thị món ăn thành công");
        return Redirect("/Food-List");
    }
    public function showFood($foodId)
    {
        $this->authLogin();
        DB::table("tbl_dishes")->where("dishes_id",$foodId)->update(["dishes_status"=>0]);
        session()->put("message","Ẩn món ăn thành công");
        return Redirect("/Food-List");
    }
    public function editFood($foodId)
    {
        $this->authLogin();
        $categoryFood = DB::table('tbl_category_food')->orderby('category_id','desc')->get();
        $localFood = DB::table('tbl_local')->orderby('local_id','desc')->get();
        $editFood = DB::table("tbl_dishes")->where("dishes_id",$foodId)->get();
        $managerFood = view("admin.food.editFood")->with("editFood",$editFood)->with('categoryFood',$categoryFood)->with('localFood',$localFood);
        return view("admin.adminLayout")->with("admin.food.editFood",$managerFood);
    }
    public function updateFood(Request $request,$foodId){
        
        $this->authLogin();
        $data = array();
        $data["dishes_name"] = $request->foodName;
        $data["dishes_desc"] = $request->foodDescribe;
        $data["dishes_content"] = $request->foodContent;
        $data["dishes_price"] = $request->foodPrice;
        $data["dishes_status"] = $request->foodStatus;
        $data["category_id"] = $request->categoryFood;
        $data["local_id"] = $request->localFood;
        $getImage = $request->file('foodImage');
        if ($getImage) {
            $getNameImage = $getImage->getClientOriginalName();
            $newNameImage = current(explode('.', $getNameImage));
            $newImage = $newNameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('public/upload/food',$newImage);
            $data['dishes_image'] = $newImage;
            DB::table('tbl_dishes')->where('dishes_id',$foodId)->update($data);
            session()->put('message','Cập nhật món ăn thành công');
            return Redirect()->route('Food.List');
        }
        $data['dishes_image'] = 'Không có hình ảnh';
        DB::table('tbl_dishes')->where('dishes_id',$foodId)->update($data);
        session()->put('message','Cập nhật món ăn thành công');
        return Redirect()->route('Food.List');
    }
    public function deleteFood($foodId){
        $this->authLogin();
        DB::table('tbl_dishes')->where('dishes_id',$foodId)->delete();
        session()->put('message','Xóa món ăn thành công');
        return Redirect()->route('Food.List');
    }
}