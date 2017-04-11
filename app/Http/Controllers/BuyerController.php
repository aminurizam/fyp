<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $profiles = User::where('id',$id)->get();
//        dd($profiles);
//        $profiles = Buyer::where('user_id', Auth::user()->id)->get();
        return view('buyer.show-profile',compact('profiles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
//        $id = Auth::id();
        $profiles = User::where('id',$id)->get();
        return view('buyer.profile', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $buyer = Buyer::where('user_id', $id)->first();

//        dd($request->all());

        $user->name = $request->name;
        $user->matricNo = $request->matricNo;
        $user->email = $request->email;

        //ada problem bila update att dlm buyer database
//        $buyer = new Buyer();
        $buyer->user_id = Auth::user()->id;
        $buyer->phoneNo = $request->phoneNo;
        $buyer->faculty = $request->faculty;
        $buyer->address = $request->address;

        $user->save();
        $buyer->save();

        return redirect()->action('BuyerController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
