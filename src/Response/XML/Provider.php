<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Response\XML;

use SimpleXMLElement;
use Compassplus\Sdk\Response\ResponseInterface;

/**
 * Class Response
 *
 * @package Compassplus\Response\XML
 */
class Provider implements ResponseInterface
{
    /**
     * @var SimpleXMLElement
     */
    private $xml;

    /**
     * Response constructor.
     *
     * @param $responseBody
     */
    public function __construct($responseBody)
    {
        $this->xml = new SimpleXMLElement($responseBody);
    }

    /**
     * @param $fieldName
     * @return null|string
     */
    public function get($fieldName)
    {

        if (!empty($this->xml->xpath("//" . $fieldName)[0])) {
            return (string)$this->xml->xpath("//" . $fieldName)[0];
        }
        return null;
    }

    /**
     * @param $parentNode
     * @param $fieldName
     * @param $attributeValue
     * @return null
     */
    public function getAttributeName($parentNode, $fieldName, $attributeValue)
    {
        $path = $parentNode . "/" . $fieldName . "[@name ='" . $attributeValue . "']" . "/@value";
        return (string)$this->xml->xpath("//" . $path)[0];
    }
}
