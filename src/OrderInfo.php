<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk;

use Compassplus\Sdk\Response\Response;

/**
 * Class OrderInfo
 * @package Compassplus
 */
class OrderInfo extends Response
{

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->getString('OrderStatus');
    }

    /**
     * @return int
     */
    public function getPurchaseAmount()
    {
        return $this->getInteger('PurchaseAmount');
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->getString('OrderID');
    }

    /**
     * @return string
     */
    public function getResponseDescription()
    {
        return $this->getString('ResponseDescription');
    }

    /**
     * @return string
     */
    public function getResponseCode()
    {
        return $this->getString('ResponseCode');
    }
}
