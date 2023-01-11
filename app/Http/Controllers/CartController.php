<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function SaveCart(Request $request)
    {
        $FoodID = $request->FoodIDHidden;
        $Quantity = $request->Quantity;
        $FoodInfo = DB::table('tbl_dishes')->where('dishes_id',$FoodID)->get();
        foreach ($FoodInfo as $data){
            $ID = $data->dishes_id;
            $Name = $data->dishes_name;
            $Price = $data->dishes_price;
            $Image = $data->dishes_image;
            $Desc = $data->dishes_content;
        }
        Cart::add([
            'id' => $ID,
            'name' => $Name,
            'qty' => $Quantity,
            'price' => $Price,
            'weight' => 0,
            'options' => [
                'image' => $Image,
                'desc' => $Desc,
            ],
        ]);
       // Cart::destroy();
        return Redirect::to('/Show-Cart');
    }
    public function ShowCart()
    {
        $category = DB::table('tbl_category_food')->where('category_status','1')->orderby('category_id','desc')->get();
        $local = DB::table('tbl_local')->where('local_status','1')->orderby('local_id','desc')->get();
        return view('pages.Cart.ShowCart',['category' => $category],['local' => $local]);
    }
    public function DeleteCart($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('Show-Cart');
    }
    public function UpdateCartQuantity(Request $request)
    {
        $RowId = $request->RowIdCart;
        $Quantity = $request->Quantity;
        Cart::update($RowId,$Quantity);
        return Redirect::to('Show-Cart');
    }
}
