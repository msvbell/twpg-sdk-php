<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request;

use Compassplus\Sdk\Operation\Operation;

/**
 * Class Data
 *
 * @package Compassplus\DataProvider
 */
abstract class DataOperationStrategy
{
    abstract public function getRequestPayload();

    /**
     * @param $operationType
     * @param Operation $operation
     * @return mixed
     */
    abstract protected function loadOperationProvider($operationType, Operation $operation);
}
