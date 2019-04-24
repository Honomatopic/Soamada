<?php
//capture.php

use Payum\Core\Request\Capture;
use Payum\Core\Reply\HttpRedirect;

include __DIR__.'/config.php';

/** @var \Payum\Core\Payum $payum */
$token = $payum->getHttpRequestVerifier()->verify($_REQUEST);
$gateway = $payum->getGateway($token->getGatewayName());

/** @var \Payum\Core\GatewayInterface $gateway */
if ($reply = $gateway->execute(new Capture($token), true)) {
    if ($reply instanceof HttpRedirect) {
        header("Location: ".$reply->getUrl());
        die();
    }

    throw new \LogicException('Unsupported reply', null, $reply);
}

/** @var \Payum\Core\Payum $payum */
$payum->getHttpRequestVerifier()->invalidate($token);

header("Location: ".$token->getAfterUrl());