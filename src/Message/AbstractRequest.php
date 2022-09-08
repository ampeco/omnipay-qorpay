<?php

namespace Ampeco\OmnipayQorPay\Message;

use Ampeco\OmnipayQorPay\Gateway;
use Omnipay\Common\Message\AbstractRequest as OmniPayAbstractRequest;

abstract class AbstractRequest extends OmniPayAbstractRequest
{
    abstract public function getEndpoint();

    const URL_PRODUCTION = 'https://api.qorcommerce.io/v3/';

    const URL_TEST = 'https://api-sandbox.qorcommerce.io/v3/';

    protected ?Gateway $gateway;

    public function setGateway(Gateway $gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    public function getGateway()
    {
        return $this->gateway;
    }

    public function getBaseUrl()
    {
        return $this->getTestMode() ? static::URL_TEST : static::URL_PRODUCTION;
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Qor-App-Key' => $this->gateway->getAppId(),
            'Qor-Client-Key' => $this->gateway->getClientId(),
        ];
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        if ($this->getHttpMethod() == 'DELETE') {
            $params = http_build_query($data);
        } else {
            $params = json_encode($data);
        }

        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getBaseUrl() . ltrim($this->getEndpoint(), '/'),
            $this->getHeaders(),
            $params,
        );

        return $this->createResponse(
            $httpResponse->getBody()->getContents(),
            $httpResponse->getStatusCode(),
        );
    }
}
