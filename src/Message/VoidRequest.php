<?php

namespace Ampeco\OmnipayQorPay\Message;

class VoidRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return 'payment/void';
    }

    public function getData()
    {
        return [
            'transaction_data' => [
                'mid' => $this->getMid(),
                'transaction_id' => $this->getTransactionReference(),
            ],
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data, $statusCode);
    }

    public function setMid($value)
    {
        return $this->setParameter('mid', $value);
    }

    public function getMid()
    {
        return $this->getParameter('mid');
    }
}
