<?php

namespace Ampeco\OmnipayQorPay\Message;

use Illuminate\Support\Facades\Log;

class AuthorizeResponse extends Response
{
    public function getTransactionReference(): array
    {
        Log::info("========================transaction_id=" . $this->data['transaction_id']);
        return $this->data['transaction_id'] ?? 'test';
    }
}
