<?php

namespace Ampeco\OmnipayQorPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    protected $statusCode;

    /**
     * @param RequestInterface $request
     * @param $data
     * @param int $statusCode
     */
    public function __construct(RequestInterface $request, $data, int $statusCode)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true);
        $this->statusCode = $statusCode;
    }

    public function isSuccessful(): bool
    {
        return $this->statusCode < 400;
    }

    public function getTokens(): array
    {
        return $this->data['tokens'] ?? [];
    }

}
