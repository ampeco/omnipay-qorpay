<?php

namespace Ampeco\OmnipayQorPay\Message;

class GetTokenResponse extends Response
{
    protected string $cardBrand;

    protected string $requestId;

    public function setCardBrand($brand)
    {
        $this->cardBrand = $brand;
    }

    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    public function getRequestId(): string
    {
        return $this->requestId;
    }

    public function setRequestId(string $requestId): void
    {
        $this->requestId = $requestId;
    }

    public function getTokens(): array
    {
        return $this->data['tokens'] ?? [];
    }
}
