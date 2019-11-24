<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(8);

        return view('manage.order.index')->withOrders($orders);
    }

    public function approve(Order $order)
    {
        $order->update([
            'orderStatus'   => 'Approved'
        ]);
    }
}
