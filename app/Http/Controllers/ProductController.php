<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Cart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()s
    {
        $this->middleware('auth');
    }*/

    public function catalog()
    {
        /*
         * Show product in a list
         * Accept search input
        */
        $searchResults = Input::get('search');
        $type = Input::get('type');

        /*
         * list out category */
        $transactionTypes = Product::selectRaw('transactionType')
            ->groupBy('transactionType')
            ->get();

        if ($type){
            $products = Product::where('transactionType', $type)->where('statusItem','accepted')->paginate(6);
        } elseif($searchResults){
            $products = Product::where('name', 'like', '%' . $searchResults . '%')->where('statusItem','accepted')->paginate(6);
        } else{
            $products = Product::where('statusItem','accepted')->paginate(6);
        }

        return view('catalog.product', compact('products','transactionTypes'));
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
        $product->seller_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->transactionType = $request->transactionType;
        $product->category = $request->category;
        $product->changeItem = $request->changeItem;
        $product->detail = $request->detail;

        if ($request->hasFile('image')){
            $this->validate($request, [
                'image' => 'required|image'
            ]);
            $image = '/images/products/product_' . time() . $product->id . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/products/'), $image);
            $product->image = $image;
        }

        $product->save();

        return redirect()->action('ProductController@productType')->withMessage('Product has been successfully added');

    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart'));
        return redirect(url('/'));
    }

    public function viewCart()
    {
        if (!Session::has('cart')){
            return view('carts.show-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('carts.show-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeProduct($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        Session::put('cart','$cart');
//        return redirect(action('ProductController@viewCart'));
        return back();

    }

    public function productType()
    {
        $products = Product::orderBy('created_at','desc')->first();
        return view('seller.add-product-type', compact('products'));
    }

    public function viewProductStatus()
    {
        $status = Product::where('seller_id', Auth::user()->id)->get();
//        dd($users);
        return view('seller.show-product-status',compact('status'));
    }

    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('carts.show-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('carts.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart')) {
            return redirect()->action('ProductController@getCart');
        }
        $oldCart =Session::get('cart');
        $cart = new Cart($oldCart);
//        repair later
        Stripe::setApiKey('sk_test_OGTYK9f03acuDWttF6GIygRi');
        try{
            Charge::create(array(
               "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
        } catch (\Exception $e) {
            return redirect()->action('ProductController@getCheckout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->action('ProductController@catalog')->with('success','Successfully purchased item!');
    }

    public function editProduct($id)
    {
//        $product = Product::findOrFaid($id);
        $product = Product::where('id',$id)->get();
        return view('seller.edit-product', compact('product'));

    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->changeItem = $request->changeItem;
        $product->category = $request->category;
        $product->detail = $request->detail;

        $product->save();

        return redirect()->action('ProductController@viewProductStatus')->withMessage('Update successful!');

    }

    public function deleteProduct($id)
    {
//        dd($id);
        $product = Product::findOrFail($id)->first();
        $product->delete();
        return back()->withErrors('Post has been deleted');
    }

}
