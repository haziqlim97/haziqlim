<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class PaymentController extends Controller
{

    public function makePayment()
    {
        \Stripe\Stripe::setApiKey('sk_test_aPFO1NKLxbxZjPWen4jHXNhy00FwhxnsCR');

        $items = [];

        foreach (Cart::session(auth()->user()->id)->getContent() as $item) {
            $items[] = [
                'name' => $item->name,
                'description' => '-',
                'images' => ['https://catering.test/media/thumbnails/'.$item->image],
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

    public function onSuccess(Type $var = null)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_aPFO1NKLxbxZjPWen4jHXNhy00FwhxnsCR');

        // You can find your endpoint's secret in your webhook settings
        $endpoint_secret = 'whsec_LQcEogy4sybZNnZiW3K5HKU8W302lZdd';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
        } catch(\UnexpectedValueException $e) {
        // Invalid payload
        http_response_code(400);
        exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        http_response_code(400);
        exit();
        }

        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
        $session = $event->data->object;

        // Fulfill the purchase...
        handle_checkout_session($session);
            
        }

        http_response_code(200);

        return response()->json($session);
    }
}
