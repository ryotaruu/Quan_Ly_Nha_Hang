<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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
    public function index()
    {
        return view("admin.adminLogin");
    }
    public function dashboardAdmin()
    {
        $this->authLogin();
        return view("admin.adminDashboard");
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table("tbl_admin")->where("admin_email", $admin_email)->where("admin_password", $admin_password)->first();
        if ($result) {
            session()->put('admin_name', $result->admin_name);
            session()->put('admin_id', $result->admin_id);
            return Redirect("/Dashboard-Admin");
        } else {
            session()->put('message', "Email or password not found, please try agin!");
            return Redirect("/Admin");
        }
    }
    public function SignOut()
    {
        $this->authLogin();
        session()->put('admin_name', null);
        session()->put('admin_id', null);
        return Redirect("/Admin");
    }
}
