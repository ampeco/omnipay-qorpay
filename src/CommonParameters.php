<?php

namespace Ampeco\OmnipayQorPay;

trait CommonParameters
{
    public function getAppKey()
    {
        return $this->getParameter('Qor-App-Key');
    }

    public function setAppKey($value)
    {
        return $this->setParameter('Qor-App-Key', $value);
    }

    public function getClientKey()
    {
        return $this->getParameter('Qor-Client-Key');
    }

    public function setClientKey($value)
    {
        return $this->setParameter('Qor-Client-Key', $value);
    }

    public function getMidId()
    {
        return $this->getParameter('mid');
    }

    public function setMidId($value)
    {
        return $this->setParameter('mid', $value);
    }
}
