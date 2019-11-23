<?php

Route::group([
    'prefix' => 'webhooks', 
    'as' => 'webhooks:'
    
    ], function() {
    
    $controller = 'OrderController';

    Route::post('oneTimePaymentWebhook', $controller . '@oneTimePaymentWebhook')->name('paymentSuccess');
});