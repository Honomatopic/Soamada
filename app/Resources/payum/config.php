<?php
//config.php

use Payum\Core\PayumBuilder;
use Payum\Core\Payum;

/** @var Payum $payum */
$payum = (new PayumBuilder())
    ->addDefaultStorages()

    ->addGateway('be2bill_direct', [
        'factory' => 'be2bill_direct',
        'identifier' => 'REPLACE WITH YOURS',
        'password' => 'REPLACE WITH YOURS',
        'sandbox' => true,
    ])

    ->getPayum()
;