<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk;

use Compassplus\Sdk\Config\Config;
use Compassplus\Sdk\Request\DataProvider;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Message\FutureResponse;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Ring\Future\FutureInterface;
use InvalidArgumentException;
use SplFileInfo;

/**
 * Class Connector
 *
 * @package Compassplus
 */
class Connector
{
    /**
     * @var DataProvider
     */
    public $orderData;
    /**
     * @var
     */
    private $certPassword;
    /**
     * @var bool
     */
    private $secureConnectionOnly = true;
    /**
     * @var string
     */
    private $url;

    private $pathToKey;

    private $keyPassword;

    /**
     * @var string
     */
    private $pathToCaCertFile;

    /**
     * @var bool
     */
    private $debug = false;
    /**
     * @var false|string
     */
    private $pathToCertFile;

    /**
     * Connector constructor.
     * @param string|null $host TWPG host
     * @param integer|null $port TWPG port
     * @param string $endpoint
     * @throws Exception
     */
    public function __construct($host = null, $port = null, $endpoint = '')
    {
        $this->setCaCert(__DIR__ . '/cacert.pem');
//        $endpoint = '/exec';
        if (!empty($host)) {
            if ($port !== null) {
                $this->url = 'https://' . $host . ':' . $port . $endpoint;
            } else {
                $this->url = 'https://' . $host . $endpoint;
            }
        }
    }

    /**
     * Set debug mode true
     */
    public function debug()
    {
        $this->debug = true;
    }

    /**
     * @return FutureResponse|ResponseInterface|FutureInterface
     * @throws Exception
     */
    public function sendRequest()
    {
        $url = $this->getUrl();
        error_log(print_r($url, 1));
        $body = $this->orderData;
        return $this->getResponse($url, $body);
    }

    /**
     * @return string TWPG server url
     */
    private function getUrl()
    {

        if (empty($this->url)) {
            if (Config::getPort()) {
                $url = Config::getHostName() . ':' . Config::getPort() . '/exec';
            } else {
                $url = Config::getHostName() . '/exec';
            }
            if (!strpos($url, '://')) {
                $url = 'https://' . $url;
            }
            return $url;
        }

        return $this->url;
    }

    /**
     * @param $url
     * @param $body
     * @return FutureResponse|ResponseInterface|FutureInterface|null
     * @throws Exception
     */
    private function getResponse($url, $body)
    {
        return $this->send($url, $body);
    }

    /**
     * @param $url
     * @param $body
     * @return false|FutureResponse|ResponseInterface|FutureInterface|string|null
     */
    private function send($url, $body)
    {
        $caCertFileName = 'cacert.pem';
        ini_set('curl.cainfo', $this->pathToCaCertFile);
        $client = new Client();
        if ($this->certPassword !== null) {
            $cert = [$this->pathToCertFile, $this->certPassword];
        } else {
            $cert = $this->pathToCertFile;
        }
        $options = [
            'body' => $body,
            'verify' => $this->pathToCaCertFile,
            'cert' => $cert,
            'config' => [
                'curl' => [
                    CURLOPT_SSL_VERIFYHOST => 2,
                    CURLOPT_SSL_VERIFYPEER => true
                ]
            ],
            'allow_redirects' => [
                'max' => 5,
                'strict' => true,
                'referer' => true,
                'protocols' => ['https', 'http'],
            ]
        ];

        if (!$this->secureConnectionOnly) {
            $options['protocols'] = ['https'];
        }

        if (!empty($this->pathToKey)) {
            if (isset($this->keyPassword)) {
                $options['ssl_key'] = [$this->pathToKey, $this->keyPassword];
            } else {
                $options['ssl_key'] = $this->pathToKey;
            }
        }

        if (is_bool($this->debug) && $this->debug) {
            $options['debug'] = true;
        }

        $response = $client->post($url, $options);

        return $response;
    }

    /**
     *
     */
    public function setUnsecuredConnection()
    {
        $this->secureConnectionOnly = false;
    }

    /**
     * Set client pem certificate file
     * @param string $pathToCert
     * @param string $password Password for cert file
     * @throws Exception
     */
    public function setCert($pathToCert, $password = null)
    {
        $this->pathToCertFile = $this->getRealPath($pathToCert);
        if ($password !== null) {
            $this->certPassword = $password;
        }
    }

    /**
     * @param $pathToKey
     * @param null|string $password
     * @throws Exception
     */
    public function setKey($pathToKey, $password = null)
    {
        $this->pathToKey = $this->getRealPath($pathToKey);
        if ($password !== null) {
            $this->keyPassword = $password;
        }
    }

    /**
     * @param $pathToFile
     * @return false|string
     * @throws Exception
     */
    private function getRealPath($pathToFile)
    {
        $info = new SplFileInfo($pathToFile);
        if (!$info->isFile()) {
            throw new InvalidArgumentException(sprintf('Cert file not found in: %s', $pathToFile));
        }
        if (!$info->isReadable()) {
            throw new Exception(sprintf('Cert file %s not readable', $pathToFile));
        }
        return $info->getRealPath(); // ???
    }

    /**
     * @param $caCertFile
     * @throws Exception
     */
    public function setCaCert($caCertFile)
    {
        $this->pathToCaCertFile = $this->getRealPath($caCertFile);
        ini_set('curl.cainfo', $this->pathToCaCertFile);
    }
}
