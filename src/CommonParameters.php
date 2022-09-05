<?php

namespace Ampeco\OmnipayQorPay;

trait CommonParameters
{
    public function getAppId()
    {
        return $this->getParameter('Qor-App-Key');
    }

    public function setAppId($value)
    {
        return $this->setParameter('Qor-App-Key', $value);
    }

    public function getClientId()
    {
        return $this->getParameter('Qor-Client-Key');
    }

    public function setClientId($value)
    {
        return $this->setParameter('Qor-Client-Key', $value);
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
