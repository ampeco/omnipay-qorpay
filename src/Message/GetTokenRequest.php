<?php

namespace Ampeco\OmnipayQorPay\Message;

class GetTokenRequest extends AbstractRequest
{
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getEndPoint(): string
    {
        return parent::getBaseUrl() . '/payment/tokens/{profileId}';
    }

    public function getData()
    {
        return ["testKey" => "testValue"];
    }
}
