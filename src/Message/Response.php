<?php

namespace Ampeco\OmnipayQorPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    public function isSuccessful()
    {
        return true;
    }
}
