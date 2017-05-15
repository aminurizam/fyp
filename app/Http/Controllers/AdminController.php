<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /* User Section */

    public function userList()
    {
        $users = User::all();
//        dd($users);
        return view('admin.list-users', compact('users'));
    }

    /*End User Section*/

    /*Product Section*/

    public function productList()
    {
        $products = Product::all();
//        dd($products);
        return view('admin.list-products', compact('products'));
    }

    public function confirmProduct()
    {
        $products = Product::where('statusItem','pending')->get();
//        dd($products);
        return view('admin.confirm-product', compact('products'));
    }

    public function confirmProductDetail($id)
    {
        $products = Product::where('id',$id)->get();
//        dd($products);
        return view('admin.confirm-product-detail', compact('products'));
    }

    public function acceptProduct($id)
    {
        $products = Product::where('id', $id)->first();
//        dd($products);
        $products->statusItem = 'accepted';
        $products->save();
        return redirect()->action('AdminController@confirmProduct');
    }

    public function rejectProduct($id)
    {
        $products = Product::where('id', $id)->first();
//        dd($products);
        $products->statusItem = 'rejected';
        $products->save();
        return redirect()->action('AdminController@confirmProduct')->withErrors('Product has been rejected');
    }

    /*End Product Section*/
}
