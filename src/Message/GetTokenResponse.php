<?php
namespace Ampeco\OmnipayQorPay\Message;


class GetTokenResponse extends Response
{
    protected string $cardBrand;

    public function setCardBrand($brand)
    {
        $this->cardBrand = $brand;
    }

    public function getCardBrand()
    {
        return $this->cardBrand;
    }
}
