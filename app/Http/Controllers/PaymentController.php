<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class PaymentController extends Controller
{
    //
    public function makePayment()
    {
        // $user = Auth()->user();
        // $user->createAsStripeCustomer();


        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_aPFO1NKLxbxZjPWen4jHXNhy00FwhxnsCR');

        // $session = \Stripe\Checkout\Session::create([
        // 'payment_method_types' => ['card'],
        // 'line_items' => [[
        //     'name' => 'T-shirt',
        //     'description' => 'Comfortable cotton t-shirt',
        //     'images' => ['https://example.com/t-shirt.png'],
        //     'amount' => 500,
        //     'currency' => 'myr',
        //     'quantity' => 1,
        // ]],
        // 'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
        // 'cancel_url' => 'https://example.com/cancel',
        // ]);

        $items = [];

        foreach (Cart::session(auth()->user()->id)->getContent() as $item) {
            $items[] = [
                'name' => $item->name,
                'description' => '-',
                'images' => ['https://example.com/t-shirt.png'],
                'amount' => $item->price . '00',
                'currency' => 'myr',
                'quantity' => $item->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$items],
            'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://example.com/cancel',
            ]);

        return view('checkout')->withSession($session);
    }
}
