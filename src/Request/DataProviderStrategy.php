<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request;

use Compassplus\Sdk\Config\Config;
use Compassplus\Sdk\Operation\Operation;
use Exception;

/**
 * Class Data
 *
 * @package Compassplus
 */
class DataProviderStrategy
{
    /**
     * @var \Compassplus\Request\DataOperationStrategy
     */
    private $data;
    /**
     * @var Operation
     */
    private $operation;
    /**
     * @var
     */
    private $operationType;
    private $dataFormat;

    /**
     * Data constructor.
     *
     * @param $operationType
     * @param Operation $operation
     * @throws Exception
     */
    public function __construct($operationType, Operation $operation)
    {
        $this->operationType = $operationType;
        $this->operation = $operation;
        $this->dataFormat = Config::getDataFormat();
        $this->payload();
    }

    /**
     * @throws Exception
     */
    private function payload()
    {
        switch ($this->dataFormat) {
            case Config::XML:
                $this->data = new \Compassplus\Sdk\Request\XML\DataOperationStrategy(
                    $this->operationType,
                    $this->operation
                );
                break;
            default:
                throw new Exception('Invalid format');
        }
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->data->getRequestPayload();
    }
}
