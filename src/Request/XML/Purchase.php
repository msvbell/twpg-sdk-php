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
 * Class OrderPurchase
 *
 */
class Purchase extends DataProvider
{
    /**
     * @var Operation
     */
    protected $operation;

    /**
     * OrderPurchase constructor.
     *
     * @param Operation $operation
     */
    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return string Get request xml string for purchase
     */
    public function getRequestData()
    {
        $service = new Service();
        $arr = [
            "Request" => [
                "Operation" => "CreateOrder",
                "Language" => $this->operation->merchant->getLanguage(),
                "Order" => [
                    "OrderType" => "Purchase",
                    "Merchant" => $this->operation->merchant->getId(),
                    "Amount" => $this->operation->order->getAmount(),
                    "Currency" => $this->operation->order->getCurrency(),
                    "Description" => $this->operation->order->getDescription(),
                    "ApproveURL" => $this->operation->merchant->getApproveUrl(),
                    "CancelURL" => $this->operation->merchant->getCancelUrl(),
                    "DeclineURL" => $this->operation->merchant->getDeclineUrl()
                ]
            ]
        ];
        if (!empty($this->operation->customer->getPhone())) {
            $arr['Request']['Order']['phone'] = $this->operation->customer->getPhone();
        }

        if (!empty($this->operation->customer->getEmail())) {
            $arr['Request']['Order']['email'] = $this->operation->customer->getEmail();
        }

        $xml = $service->write("TKKPG", $arr);

        if ($xml) {
            return $xml;
        } else {
            throw new UnexpectedValueException("XML is not generated");
        }
    }
}
