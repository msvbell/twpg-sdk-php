<?php


namespace Compassplus\Sdk;


use GuzzleHttp\Client;

class DebugConnector extends Connector
{
    public $url = 'http://localhost:9111';

    public function __construct($host = null, $port = null)
    {
//        parent::__construct($host, $port);
    }

    public function sendRequest()
    {
        $url = $this->url;
        $client = new Client();
        $options = [
            'debug' => true,
            'body' => $this->orderData,
            'allow_redirects' => [
                'max' => 5,
                'strict' => true,
                'referer' => true,
                'protocols' => ['https', 'http'],
            ]
        ];
        return $client->post($url, $options);
    }
}
