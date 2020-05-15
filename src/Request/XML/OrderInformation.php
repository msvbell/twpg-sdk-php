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
 * Class OrderInformation
 *
 * @package Compassplus\DataProvider\XML
 */
class OrderInformation extends DataProvider
{
    /**
     * OrderInfo constructor.
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
        return $this->getOrderInformation();
    }

    /**
     * @return string
     */
    protected function getOrderInformation()
    {
        $service = new Service();
        $xml = $service->write("TKKPG", [
            "Request" => [
                "Operation" => "GetOrderInformation",
                "Language" => $this->operation->merchant->getLanguage(),
                "Order" => [
                    "Merchant" => $this->operation->merchant->getId(),
                    "OrderID" => $this->operation->order->getOrderId()
                ],
                "SessionID" => $this->operation->order->getSessionId(),
                "ShowParams" => "true",
                "ShowOperations" => "true",
                "ClassicView" => "true"
            ]
        ]);

        if ($xml) {
            return $xml;
        } else {
            throw new UnexpectedValueException("XML is not generated");
        }
    }
}
