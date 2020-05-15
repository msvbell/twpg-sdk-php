<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request\XML;

/**
 * Interface RequestInterface
 *
 * @package Compassplus\DataProvider\XML
 */
interface RequestInterface
{
    /**
     * @return mixed
     */
    public function prepareRequestData();
}
