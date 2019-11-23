<?php

namespace App\Services;

use App\Services\BaseService;
use Cart;

class CartService extends BaseService 
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Cart::session(auth()->user()->id);
    }

    public function getItems()
    {
        return Cart::getContent();
    }

    public function getContent()
    {
        return [
            'content'   => Cart::getContent(),
            'total'     => Cart::getTotal(),
            'subTotal'  => Cart::getSubTotal(),
        ];
    }

    public function add($item)
    {
        Cart::add([$item]);
    }

    public function clear()
    {
        Cart::clear();

        return true;
    }
}