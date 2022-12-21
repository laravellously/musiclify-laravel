<?php

return [
    'environment' => 'sandbox',
    'sandbox'     => [
        'merchant_id'     => '',
        'password'        => '',
        'integerity_salt' => '',
        'return_url'      => '',
        'endpoint'        => "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform",
    ],
    'live'        => [
        'merchant_id'     => "",
        'password'        => "",
        'integerity_salt' => "",
        'return_url'      => "",
        'endpoint'        => "https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform",
    ],
];
