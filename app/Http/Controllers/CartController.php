<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Package;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('customer.cart')
            ->withItems(Cart::session(auth()->user()->id)->getContent())
            ->withTotal(Cart::session(auth()->user()->id)->getTotal());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();

        return view('test')->withPackages($packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Package $package)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        // array format
        Cart::add([
            'id' => $package->id,
            'name' => $package->name,
            'price' => $package->price,
            'quantity' => 1,
            'attributes' => array()
        ]);
        
        // $cart = new ShoppingCart();
        // $cart->add($package);

        return Cart::session($userId)->getContent();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = auth()->user()->id;
        Cart::session($userId);

        Cart::clear();
    }
}
