<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request;

use Compassplus\Sdk\Operation\Operation;

/**
 * Class DataProvider
 *
 * @package Compassplus\DataProvider
 */
abstract class DataProvider
{
    /**
     * @var Operation
     */
    protected $operation;

    /**
     * DataProvider constructor.
     *
     * @param Operation $operation
     */
    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return mixed
     */
    abstract public function getRequestData();
}
