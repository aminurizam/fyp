<?php

namespace App\Http\Controllers;

use App\ExchangeCart;
use App\Order;
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

use Barryvdh\DomPDF\PDF;


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
        $category = Input::get('category');

        /*
         * list out category */
        $transactionTypes = Product::selectRaw('transactionType')
            ->groupBy('transactionType')
            ->get();

        $categories = Product::selectRaw('category')
            ->groupBy('category')
            ->get();

        if ($type){
            $products = Product::where('transactionType', $type)->where('statusItem','accepted')->where('quantity','1')->paginate(6);
        } elseif($searchResults){
            $products = Product::where('name', 'like', '%' . $searchResults . '%')->where('statusItem','accepted')->where('quantity','1')->paginate(6);
        } elseif($category){
            $products = Product::where('category', $category)->where('statusItem','accepted')->where('quantity','1')->paginate(6);
        } else{
            $products = Product::where('statusItem','accepted')->where('quantity','1')->paginate(6);
        }

        return view('catalog.product', compact('products','transactionTypes','categories'));
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
//        $product->qty = $request->qty;

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
        if(Auth::id() != $product->seller_id) {
            if ($product->transactionType == 'Buy' || $product->transactionType == !'Free') {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->add($product, $product->id);

                $request->session()->put('cart', $cart);
                return redirect(url('/'));
            } else {
//            $product = Product::findOrFail($id);
                return view('carts.exchange-cart', compact('product'));
//            return view('carts.exchange-cart');
            }
        } else {
            return redirect()->action('ProductController@catalog')->withErrors('Unable to buy own product');
        }

//        dd($request->session()->get('cart'));
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

/* Exchange Cart Function */

    public function storeExchange(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->quantity = 0;
//        dd($product);
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $exchangeCart = new ExchangeCart();
        $exchangeCart->user_id = Auth::user()->id;
        $exchangeCart->seller_id = $request->sid;
        $exchangeCart->product_id = $request->id;
        $exchangeCart->details = $request->details;
        $exchangeCart->name = $request->name;
        if ($request->hasFile('image')){
            $this->validate($request, [
                'image' => 'required|image'
            ]);
            $image = '/images/exchange/product_' . time() . $exchangeCart->id . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/exchange/'), $image);
            $exchangeCart->image = $image;
    }

        $exchangeCart->save();
        $product->save();
        return redirect()->action('ProductController@catalog')->withMessage('Submitted to seller. Please wait for confirmation from seller');
    }

    public function viewExchange()
    {
//        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->where('transactionType','Exchange')->get();
        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->get();
        return view('carts.exchange-list',compact('exchanges'));
    }

    public function viewExchangeDetail($id)
    {
        $exchanges = ExchangeCart::where('id', $id)->get();
        return view('carts.confirm-exchange',compact('exchanges'));

    }

    public function deleteExchange($id)
    {
        $exchanges = ExchangeCart::findOrFail($id)->first();
        $exchanges->delete();
        return back()->withErrors('Transaction has been rejected');
    }

    public function confirmExchange()
    {
//        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->where('product_id','2')->get();
        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->get();
//        return redirect()->action('ProductController@checkoutReceipt')->with('success','Successfully purchased item!');
//        return view('receipt.exchange-receipt', compact('exchanges'));
        return view('receipt.exchange-receipt', compact('exchanges'));
    }

    public function printExchange()
    {
//        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->where('product_id','2')->get();
        $exchanges = ExchangeCart::where('seller_id', Auth::user()->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('receipt.print-exchange-receipt', compact('exchanges'));
        return $pdf->stream('print-exchange-receipt.pdf');
//        return view('receipt.print-exchange-receipt', compact('exchanges'));
    }

/* End of Exchange Cart Function */

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
            return redirect()->action('ProductController@viewCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_OGTYK9f03acuDWttF6GIygRi');
        try{
            $charge = Charge::create(array(
               "amount" => $cart->totalPrice * 100,
                "currency" => "myr",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->name;
            $order->address = $request->address;
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);

        } catch (\Exception $e) {
            return redirect()->action('ProductController@getCheckout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->action('ProductController@checkoutReceipt')->with('success','Successfully purchased item!');
    }

    public function checkoutReceipt()
    {
        return view('receipt.receipt');
    }

    public function editProduct($id)
    {
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
        $product = Product::findOrFail($id)->first();
        $product->delete();
        return back()->withErrors('Post has been deleted');
    }

    public function showExchange($id)
    {
        $product = Product::findOrFail($id);
        return view('carts.exchange-cart',compact('product'));
    }

    /* Order History */

    public function orderHistory()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key){
           $order->cart = unserialize($order->cart);
           return $order;
        });
        return view('orders.order-history', ['orders' => $orders]);
//        return view('orders.order-history');
    }

    /* End Order History */
}
