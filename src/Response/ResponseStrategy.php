<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Response;

use Exception;
use GuzzleHttp\Stream\Stream;
use Compassplus\Sdk\Config\Config;
use Compassplus\Sdk\Response\XML\Provider;

/**
 * Class ResponseStrategy
 *
 * @package Compassplus\Response
 */
class ResponseStrategy implements ResponseInterface
{
    /**
     * @var  ResponseStrategy
     */
    private $response;

    /**
     * ResponseStrategy constructor.
     * @param \GuzzleHttp\Message\Response|null|string $response
     * @throws Exception
     */
    public function __construct($response)
    {
        $this->loadResponse($response);
    }

    /**
     * @param \GuzzleHttp\Message\Response|null|string $response
     * @throws Exception
     */
    private function loadResponse($response)
    {
        if (is_string($response)) {
            $response_temp = new \GuzzleHttp\Message\Response(200);
            $response_temp->setHeader('Content-Type', 'text/xml');
            $response_temp->setBody(Stream::factory($response));
            $response = $response_temp;
        }
        switch ($this->getResponseFormat($response)) {
            case Config::XML:
                $this->response = new Provider($response->getBody());
                break;
            default:
                throw new Exception('Invalid format ' . $this->getResponseFormat($response));
        }
    }

    /**
     * @param \GuzzleHttp\Message\Response|null|string $response
     * @return string
     * @throws Exception
     */
    private function getResponseFormat($response)
    {
        $header = $response->getHeader('Content-Type');
        if (strpos($header, ";")) {
            $header = stristr($header, ';', true);
        }
        switch ($header) {
            case 'application/json':
                return Config::JSON;
                break;
            case 'text/xml':
            case 'application/xml':
                return Config::XML;
                break;
            default:
                throw new Exception('Invalid format ' . $response->getHeader('Content-Type'));
        }
    }

    /**
     * @param string $fieldName
     * @return mixed
     */
    public function get($fieldName)
    {
        return $this->response->get($fieldName);
    }

    /**
     * @param $parentNode
     * @param $fieldName
     * @param $attributeValue
     * @return mixed
     */
    public function getAttributeName($parentNode, $fieldName, $attributeValue)
    {
        return $this->response->getAttributeName($parentNode, $fieldName, $attributeValue);
    }
}
