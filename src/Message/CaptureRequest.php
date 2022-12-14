<?php

namespace Ampeco\OmnipayQorPay\Message;

class CaptureRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return 'payment/capture';
    }

    public function getData()
    {
        return [
            'transaction_data' => [
                'mid' => $this->getMid(),
                'amount' => $this->getAmount(),
                'orderid' => $this->getOrderid(),
                'currency' => $this->getCurrency(), //It accepts only USD which is default value if 'currency' is missing. Probably not send it at all.
                'transaction_id' => $this->getTransactionReference(),
            ],
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data, $statusCode);
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setOrderid($value)
    {
        return $this->setParameter('orderid', $value);
    }

    public function getOrderid()
    {
        return $this->getParameter('orderid');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
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
