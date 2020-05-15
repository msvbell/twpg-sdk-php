<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Response;

/**
 * Class OrderStatus
 *
 * @package Compassplus\Response
 */
class OrderStatus extends Response
{
    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->getInteger('OrderID');
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->getString('OrderStatus');
    }

    /**
     * Get ApprovalCodeSrc
     */
    public function getApprovalCode()
    {
        return $this->getString('ApprovalCodeScr');
    }

    /**
     * @return string
     */
    public function getReceipt()
    {
        return $this->getString('Receipt');
    }
}
