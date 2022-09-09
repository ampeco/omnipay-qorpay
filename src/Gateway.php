<?php

namespace Ampeco\OmnipayQorPay;

use Ampeco\OmnipayQorPay\Message\AbstractRequest;
use Ampeco\OmnipayQorPay\Message\AuthorizeRequest;
use Ampeco\OmnipayQorPay\Message\CaptureRequest;
use Ampeco\OmnipayQorPay\Message\DeleteCardRequest;
use Ampeco\OmnipayQorPay\Message\GetTokenRequest;
use Ampeco\OmnipayQorPay\Message\PurchaseRequest;
use Illuminate\Support\Facades\Log;
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

    public function deleteCard(array $parameters = [])
    {
        return $this->createRequest(DeleteCardRequest::class, $parameters);
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

    public function purchase(array $parameters)
    {
        Log::debug("==========================Purchase==================");
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function authorize(array $parameters)
    {
        Log::debug("==========================Authorize==================");
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    public function capture(array $parameters)
    {
        Log::debug("==========================capture==================");
        return $this->createRequest(CaptureRequest::class, $parameters);
    }
}
