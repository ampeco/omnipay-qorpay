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

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new GetTokenResponse($this, $data, $statusCode);
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
