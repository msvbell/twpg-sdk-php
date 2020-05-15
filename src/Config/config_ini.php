<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

use Compassplus\Sdk\Config\Config;

return array(
    'format' => Config::XML,
    'testing' => false,
    'PROD' => array(
        'hostname' => 'mpi.superpayment.com',
        'port' => '9009'
    ),
    'TEST' => array(
        'hostname' => '192.168.50.11',
        'port' => '9009'
    )
);
