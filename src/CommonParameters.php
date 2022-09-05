<?php

namespace Ampeco\OmnipayQorPay;

trait CommonParameters
{
    public function getAppId()
    {
        return $this->getParameter('app_id');
    }

    public function setAppId($value)
    {
        return $this->setParameter('app_id', $value);
    }

    public function getClientId()
    {
        return $this->getParameter('client_id');
    }

    public function setClientId($value)
    {
        return $this->setParameter('client_id', $value);
    }

    public function getMid()
    {
        return $this->getParameter('mid');
    }

    public function setMid($value)
    {
        return $this->setParameter('mid', $value);
    }
}
