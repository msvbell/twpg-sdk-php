<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

/**
 * Created by PhpStorm.
 * User: arevkina
 * Date: 02.11.2017
 * Time: 16:51
 */

namespace Compassplus\Sdk;

use Compassplus\Sdk\Operation\OperationType;
use Exception;

/**
 * Class OrderStatus
 *
 * @package Compassplus
 */
class OrderStatus
{
    /**
     * @var Operation\Operation
     */
    private $operation;

    /**
     * OrderStatus constructor.
     * @param Order $order
     * @param Merchant $merchant
     * @param Customer $customer
     */
    public function __construct(Order $order, Merchant $merchant, Customer $customer)
    {
        $this->operation = new Operation\Operation($order, $customer, $merchant);
    }

    /**
     * @return Response\OrderStatus
     * @throws Exception
     */
    public function perform()
    {
        $response = $this->send(OperationType::ORDERSTATUS);
        return new Response\OrderStatus($response);
    }

    /**
     * @param $operationType
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface
     * @throws Exception
     */
    private function send($operationType)
    {
        $data = $this->loadOrderStatus($operationType);
        $connector = new Connector($data);
        return $connector->sendRequest();
    }

    /**
     * @param $operationType
     * @return mixed
     * @throws Exception
     */
    private function loadOrderStatus($operationType)
    {
        $data = new Request\DataProviderStrategy($operationType, $this->operation);
        return $data->getPayload();
    }
}
