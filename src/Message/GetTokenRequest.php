<?php

namespace Ampeco\OmnipayQorPay\Message;

class GetTokenRequest extends AbstractRequest
{
    protected string $profileId;

    public function getHttpMethod(): string
    {
        return 'GET';
    }

    public function getEndPoint(): string
    {
        return 'payment/tokens/' . $this->getProfileId();
    }

    public function getData()
    {
        return [];
    }

    public function getHeaders(): array
    {
        return array_merge(parent::getHeaders(), [
            'Qor-App-Key' => 'T6554252567241061980',
            'Qor-Client-Key' => '01dffeb784c64d098c8c691ea589eb82',
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data);
    }

    public function setProfileId($value)
    {
        return $this->profileId = $value;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }
}
