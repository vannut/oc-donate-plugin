<?php

/*
Routes specifiek voor deze plugin
 */



Route::post('/do_donate', function () {

    $donate = new Vannut\Donate\Donate();

    return $donate->createDonationRequest(request()->all());

});

Route::post('/donation_webhook', function () {

    $donate = new Vannut\Donate\Donate();

    return $donate->webhook(request()->all());

 });
