<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roleCheck('admin')){
            return redirect(url('/dashboard'));
        } elseif (Auth::user()->roleCheck('seller')){
//            return view('/');
            return redirect(url('/'));
        } else {
            return redirect(url('/'));
        }
//        return view('home');
    }



}
