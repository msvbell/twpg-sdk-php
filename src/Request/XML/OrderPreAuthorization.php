<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request\XML;

use Compassplus\Sdk\Request\DataProvider;
use Compassplus\Sdk\Service;
use UnexpectedValueException;

/**
 * Class OrderPreAuthorization
 * @package Compassplus\DataProvider\XML
 */
class OrderPreAuthorization extends DataProvider
{
    /**
     * @return mixed|string
     */
    public function getRequestData()
    {
        $service = new Service();
        $xml = $service->write("TKKPG", [
            "Request" => [
                "Operation" => "CreateOrder",
                "Language" => $this->operation->merchant->getLanguage(),
                "SessionID" => $this->operation->order->getSessionId(),
                "Order" => [
                    "OrderType" => "PreAuth",
                    "OrderID" => $this->operation->order->getOrderId(),
                    "Merchant" => $this->operation->merchant->getId(),
                    "Amount" => $this->operation->order->getAmount(),
                    "Currency" => $this->operation->order->getCurrency(),
                    "Description" => $this->operation->order->getDescription(),
                    "ApproveURL" => $this->operation->merchant->getApproveUrl(),
                    "CancelURL" => $this->operation->merchant->getCancelUrl(),
                    "DeclineURL" => $this->operation->merchant->getDeclineUrl()
                ]
            ]
        ]);
        if ($xml) {
            return $xml;
        } else {
            throw new UnexpectedValueException("XML is not generated");
        }
    }
}
