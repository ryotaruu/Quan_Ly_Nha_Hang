<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckOutController extends Controller
{
    public function LoginCheckOutInRestaurant()
    {
        $category = DB::table('tbl_category_food')->where('category_status','1')->orderby('category_id','desc')->get();
        $local = DB::table('tbl_local')->where('local_status','1')->orderby('local_id','desc')->get();
        return view('pages.CheckOut.LoginCheckOutInRestaurant',['category' => $category],['local' => $local]);
    }
    public function LoginCheckOutShipping()
    {
        $category = DB::table('tbl_category_food')->where('category_status','1')->orderby('category_id','desc')->get();
        $local = DB::table('tbl_local')->where('local_status','1')->orderby('local_id','desc')->get();
        return view('pages.CheckOut.LoginCheckOutShipping',['category' => $category],['local' => $local]);
    }
    public function AddCustomer(Request $request)
    {
        $Data = array();
        $Data['customer_name'] = $request->Name;
        $Data['customer_email'] = $request->Email;
        $Data["customer_password"] = $request->Password;
        $Data["customer_phone"] = $request->NumberPhone;
        $CustomerId = DB::table('customer')->insertGetId($Data);
        session()->put('CustomerId',$CustomerId);
        session()->put('CustomerName',$request->Name);
        return Redirect('/Check-Out');
    }
    public function CheckOut(){
        $category = DB::table('tbl_category_food')->where('category_status','1')->orderby('category_id','desc')->get();
        $local = DB::table('tbl_local')->where('local_status','1')->orderby('local_id','desc')->get();
        return view('pages.CheckOut.CheckOut')->with('category',$category)->with('local',$local);
    }
}
