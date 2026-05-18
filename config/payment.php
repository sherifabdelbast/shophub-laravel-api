<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Fake Payment Gateway
    |--------------------------------------------------------------------------
    |
    | When enabled, PaymentService simulates a successful payment without
    | contacting a real gateway. This is intended for local development and
    | testing only. In production this MUST be false so that payments fail
    | loudly until a real gateway is integrated, rather than silently
    | marking orders as paid.
    |
    */

    'fake_gateway' => (bool) env('PAYMENT_FAKE_GATEWAY', false),

];
