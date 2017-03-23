<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function catalog()
    {
        /*
         * Show product in a list
         * Accept search input
        */
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

    public function create()
    {
        return view('catalog.add-product');
    }
    public function store(Request $request)
    {
        /*Add product into catalog*/

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
//        $product->product_id = $id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->transactionType = $request->transactionType;
        $product->category = $request->category;
        $product->detail = $request->detail;
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $request->image;
        $product->save();

        return redirect()->action('ProductController@create')->withMessage('Product has been successfully added');

    }
}
