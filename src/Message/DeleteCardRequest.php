<?php

namespace Ampeco\OmnipayQorPay\Message;

class DeleteCardRequest extends AbstractRequest
{
    public function getHttpMethod(): string
    {
        return 'DELETE';
    }

    public function getEndPoint(): string
    {
        return 'payment/token/';
    }

    public function getHeaders(): array
    {
        return [
            ...parent::getHeaders(), ...['Content-Type' => 'application/x-www-form-urlencoded'],
        ];
    }

    public function getData()
    {

        return [
            'token' => $this->getToken(),
            'last4' => $this->getLast4(),
        ];
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data, $statusCode);
    }

    public function setLast4($value)
    {
        return $this->setParameter('last4', $value);
    }

    public function getLast4()
    {
        return $this->getParameter('last4');
    }
}
