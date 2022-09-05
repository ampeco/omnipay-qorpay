<?php

namespace Ampeco\OmnipayQorPay;

use Ampeco\OmnipayQorPay\Message\AbstractRequest;
use Ampeco\OmnipayQorPay\Message\GetTokenRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    public const SECURE_FORMS_URL = 'https://secure.forms.qorcommerce.io';

    public function getName()
    {
        return 'QorPay';
    }

    public function createCard(array $options = []): string
    {
        return self::SECURE_FORMS_URL . '/vault/card/token?intent=create&' . http_build_query($options);
    }

    public function getTokenList(array $options = [])
    {
        return $this->createRequest(GetTokenRequest::class, $options);
    }

    protected function createRequest($class, array $parameters)
    {
        /** @var AbstractRequest */
        $req = parent::createRequest($class, $parameters);
        return $req->setGateway($this);
    }
}
