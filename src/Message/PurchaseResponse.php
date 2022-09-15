<?php

namespace Ampeco\OmnipayQorPay\Message;

class PurchaseResponse extends Response
{
    public function getTransactionReference(): ?string
    {
        return @$this->data['transaction_id'];
    }
}
