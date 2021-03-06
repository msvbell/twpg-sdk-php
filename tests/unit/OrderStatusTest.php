<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

use Compassplus\Sdk\Operation\Operation;

/**
 * Class OrderStatusTest
 */
class OrderStatusTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    /**
     * @var Operation
     */
    private $operation;

    public function testSomeFeature()
    {
        $xmlExpect = <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<TKKPG>
 <Request>
  <Operation>GetOrderStatus</Operation>
  <Language>ru</Language>
  <Order>
   <Merchant>POS_IKEA_2</Merchant>
   <OrderID>1</OrderID>
  </Order>
  <SessionID>05460005547444</SessionID>
 </Request>
</TKKPG>

XML;
        $orderStat = new \Compassplus\Sdk\Request\XML\OrderStatus($this->operation);
        $requestLine = $orderStat->getRequestData();
        $this->assertXmlStringEqualsXmlString($xmlExpect, $requestLine);
    }

    protected function _before()
    {
        $order = new \Compassplus\Sdk\Order();
        $order->setOrderId(1);
        $order->setSessionId('05460005547444');

        $merchant = new \Compassplus\Sdk\Merchant();
        $merchant->setMerchantId('POS_IKEA_2');
        $merchant->setLanguage("ru");

        $address = new \Compassplus\Sdk\Customer\Address();

        $customer = new \Compassplus\Sdk\Customer($address);

        $this->operation = new Operation($order, $customer, $merchant);
    }

    protected function _after()
    {
    }
}
