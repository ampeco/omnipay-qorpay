<?php

namespace Ampeco\OmnipayQorPay;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    public function getName()
    {
        return 'QorPay';
    }
}
