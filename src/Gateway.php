<?php

namespace Ampeco\OmnipayQorPay;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    public const SECURE_FORMS_URL = 'https://secure.forms.qorcommerce.io';

    public function getName()
    {
        return 'QorPay';
    }

    public function createCard(array $options = []): string
    {
        return self::SECURE_FORMS_URL . '/vault/card/token?intent=create&' . http_build_query($options);
    }
}
