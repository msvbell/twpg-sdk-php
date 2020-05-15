<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

/**
 * Created by PhpStorm.
 * User: arevkina
 * Date: 06.12.2017
 * Time: 14:34
 */

namespace Compassplus\Sdk\Request\XML;

use Compassplus\Sdk\Request\DataProvider;
use Compassplus\Sdk\Service;
use UnexpectedValueException;

/**
 * Class Completion
 * @package Compassplus\DataProvider\XML
 */
class Completion extends DataProvider
{
    /**
     * @return mixed|string
     */
    public function getRequestData()
    {
        $service = new Service();
        $value = [
            "Request" => [
                "Operation" => "Completion",
                "Language" => $this->operation->merchant->getLanguage(),
                "Order" => [
                    "Merchant" => $this->operation->merchant->getId(),
                    "OrderID" => $this->operation->order->getOrderId()
                ],
                "SessionID" => $this->operation->order->getSessionId()
            ]
        ];

        if (!empty($this->operation->order->getAmount())) {
            $value["Request"]["Amount"] = $this->operation->order->getAmount();
            $value["Request"]["Currency"] = $this->operation->order->getCurrency();
        }

        $value["Request"]["Description"] = $this->operation->order->getDescription();

        $xml = $service->write("TKKPG", $value);

        if ($xml) {
            return $xml;
        } else {
            throw new UnexpectedValueException("XML is not generated");
        }
    }
}
