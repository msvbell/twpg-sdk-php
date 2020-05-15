<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request\XML;

use Compassplus\Sdk\Operation\Operation;
use Compassplus\Sdk\Request\DataProvider;
use Compassplus\Sdk\Service;
use UnexpectedValueException;

/**
 * Class Reverse
 * @package Compassplus\DataProvider\XML
 */
class Reverse extends DataProvider
{
    /**
     * Reverse constructor.
     *
     * @param Operation $operation
     */
    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return string
     */
    public function getRequestData()
    {
        return $this->getRequestReverse();
    }

    /**
     * @return string
     */
    private function getRequestReverse()
    {
        $service = new Service();

        $xml = $service->write("TKKPG", [
            "Request" => [
                "Operation" => "Reverse",
                "Language" => $this->operation->merchant->getLanguage(),
                "Order" => [
                    "Merchant" => $this->operation->merchant->getId(),
                    "OrderID" => $this->operation->order->getOrderId()
                ],
                "Amount" => $this->operation->order->getAmount(),
                "Description" => $this->operation->order->getDescription(),
                "SessionID" => $this->operation->order->getSessionId()
            ]
        ]);
        if ($xml) {
            return $xml;
        } else {
            throw new UnexpectedValueException("XML is not generated");
        }
    }
}
