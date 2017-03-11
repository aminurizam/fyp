<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function catalog()
    {

        $searchResults = Input::get('search');

        $products = Product::where('name', 'like', '%'.$searchResults.'%')->paginate(5);

        return view('catalog.product', compact('products'));
    }

    public function productDetail($id)
    {
        /* show one product detail in a page */

        $product = Product::findOrFail($id);
        return view('catalog.product-details',compact('product'));

    }
}
