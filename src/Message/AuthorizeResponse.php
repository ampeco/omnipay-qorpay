<?php

namespace Ampeco\OmnipayQorPay\Message;

class AuthorizeResponse extends Response
{
    public function getPaymentIntentReference(): string
    {
        return $this->data['transaction_id'] ?? 'test';
    }
}
