<?php

namespace Marvel;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'marvel-php/0.9.0';

    protected $baseURI = 'http://gateway.marvel.com/';
    protected $version = 'v1/public/';

    protected $publicKey   = '';
    protected $privateKey   = '';
    protected $client   = null;
    protected $request  = null;

    public $response = null;
    public $statusCode = null;
    public $detail   = null;

    public function __construct($publicKey, $privateKey, $httpClient = null)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->client = (is_null($httpClient)) ? new Http\Client($this->baseURI) : $httpClient;
        $this->client->setUserAgent($this::USER_AGENT . '/' . PHP_VERSION);
    }

    public function get($uri, $params = array()) { }

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        $classname = ucwords(str_replace("_", " ", $name));
        $fullclass = "Marvel\\" . str_replace(' ', '', $classname);

        if (class_exists($fullclass)) {
            return new $fullclass($this);
        }

        throw new Exception('Not supported');
    }

    public function getUri()
    {
        return $this->baseURI . $this->version;
    }
}