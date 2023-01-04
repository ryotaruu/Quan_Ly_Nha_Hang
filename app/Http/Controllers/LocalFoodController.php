<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LocalFoodController extends Controller
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
    public function AddLocalName()
    {
        $this->authLogin();
        return view("admin.LocalFood.AddLocalName");
    }
    public function LocalListings()
    {
        $this->authLogin();
        $LocalListings = DB::table("tbl_local")->get();
        $ManagerLocal = view("admin.LocalFood.LocalListings")->with("LocalListings",$LocalListings);
        return view("admin.adminLayout")->with("admin.LocalFood.LocalListings",$ManagerLocal);
    }
    public function SaveLocalFix(Request $request)
    {
        $this->authLogin();
        $data = array();
        $data["local_name"] = $request->NameLocal;
        $data["local_desc"] = $request->DescribeLocal;
        $data["local_status"] = $request->LocalStatus;
        DB::table('tbl_local')->insert($data);
        session()->put("message","Add Local Name Successful");
        return Redirect("/Add-Local-Name");
    }
    public function HideLocalFood($LocalFoodID)
    {
        $this->authLogin();
        DB::table("tbl_local")->where("local_id",$LocalFoodID)->update(["local_status"=>1]);
        session()->put("message","Show local successful");
        return Redirect("/Local-Listings");
    }
    public function ShowLocalFood($LocalFoodID)
    {
        $this->authLogin();
        DB::table("tbl_local")->where("local_id",$LocalFoodID)->update(["local_status"=>0]);
        session()->put("message","Hide local successful");
        return Redirect("/Local-Listings");
    }
    public function LocalEditing($LocalFoodID)
    {
        $this->authLogin();
        $LocalEditing = DB::table("tbl_local")->where("local_id",$LocalFoodID)->get();
        $ManagerLocal = view("admin.LocalFood.LocalEditing")->with("LocalEditing",$LocalEditing);
        return view("admin.adminLayout")->with("admin.LocalFood.LocalEditing",$ManagerLocal);
    }
    public function SaveLocal(Request $request,$LocalFoodID){
        $this->authLogin();
        $data = array();
        $data["local_name"] = $request->LocalName;
        $data["local_desc"] = $request->LocalDescription;
        DB::table('tbl_local')->where('local_id',$LocalFoodID)->update($data);
        session()->put('message','Update local successful');
        return Redirect()->route('Local.List');
    }
    public function DeleteLocal($LocalFoodID){
        $this->authLogin();
        DB::table('tbl_local')->where('local_id',$LocalFoodID)->delete();
        session()->put('message','Delete local successful');
        return Redirect()->route('Local.List');
    }
}
