<?php

Route::group([
    'prefix' => 'webhooks', 
    'as' => 'webhooks:'
    
    ], function() {
    
    Route::post('oneTimePaymentWebhook', 'PaymentController@oneTimePaymentWebhook')->name('paymentSuccess');
});