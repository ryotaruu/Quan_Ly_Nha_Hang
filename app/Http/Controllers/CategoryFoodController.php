<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryFoodController extends Controller
{
    public function AddCategory()
    {
        return view("admin.AddCategoryFood");
    }
    public function ListCategory()
    {
        return view("admin.ListCategoryFood");
    }
}
