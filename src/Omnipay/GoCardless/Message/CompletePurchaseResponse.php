<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\GoCardless\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * GoCardless Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    protected $gatewayReference;

    public function __construct(RequestInterface $request, $data, $gatewayReference)
    {
        parent::__construct($request, $data);
        $this->gatewayReference = $gatewayReference;
    }

    public function isSuccessful()
    {
        return !isset($this->data['error']);
    }

    public function getGatewayReference()
    {
        return $this->gatewayReference;
    }

    public function getMessage()
    {
        if (!$this->isSuccessful()) {
            return reset($this->data['error']);
        }
    }
}
