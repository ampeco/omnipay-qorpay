<?php

namespace Ampeco\OmnipayQorPay\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return 'payment/sale/token';
    }

    public function getData()
    {
        return [
            'transaction_data' => [
                'amount' => $this->getAmount(),
                'creditcard' => $this->getToken(),
                'orderid' => $this->getOrderid(),
                'currency' => $this->getCurrency(), //It accepts only USD which is default value if 'currency' is missing. Probably not send it at all.
            ],
        ];
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new PurchaseResponse($this, $data, $statusCode);
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
}
