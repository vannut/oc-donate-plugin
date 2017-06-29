<?php

/*
Routes specifiek voor deze plugin
 */



Route::post('/do_donate', function () {

    $donate = new Vannut\Donate\Donate();

    return $donate->createDonationRequest(request()->all());

 });
