<?php

Route::group([
    'prefix' => 'webhooks', 
    'as' => 'webhooks:'
    
    ], function() {
    
    Route::post('stripe/onetimepayment', 'PaymentController@oneTimePaymentWebhook')->name('paymentSuccess');
});