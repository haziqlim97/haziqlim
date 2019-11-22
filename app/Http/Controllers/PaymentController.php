<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class PaymentController extends Controller
{

    public function makePayment()
    {
        
        $items = [];

        foreach (Cart::session(auth()->user()->id)->getContent() as $item) {
            $items[] = [
                'name' => $item->name,
                'description' => '-',
                'images' => [env('APP_URL').'/media/thumbnails/'.$item->image],
                'amount' => $item->price . '00',
                'currency' => 'myr',
                'quantity' => $item->quantity,
            ];
        }

        $stripeSession = app('StripeService')->oneTimePayment($items);

        return view('checkout')->withSession($stripeSession);
    }

    public function onSuccess()
    {
        // \Log::info('onSuccess');
        // $response = app('StripeService')->onCheckoutSessionCompleted();
        // return $response;

        $payload = @file_get_contents('php://input');
        $sig_header = request()->header('HTTP_STRIPE_SIGNATURE');
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, config('services.stripe.webhook.secret')
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
        $this->generatePaymentReceipt($session);
            
        }

        http_response_code(200);

        return response()->json($session);
    }
}
