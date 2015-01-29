<?php

namespace Marvel;

use Guzzle\Http;
use Marvel\Exceptions\InvalidResource;

/**
 * Class Client
 * @package Marvel
 *
 * @property-read string $comics
 */
class Client
{
    const USER_AGENT = 'marvel-php/1.1.0';

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

    public function get($uri, $params = array())
    {
        $timestamp = time();
        $params['ts'] = $timestamp;
        $params['apikey'] = $this->publicKey;
        $params['hash'] = md5($timestamp . $this->privateKey . $this->publicKey);

        $request = $this->client->get($uri, array(), array('exceptions' => false));
        foreach($params as $key => $value) {
            $request->getQuery()->set($key, $value);
        }

        $this->response =  $request->send();
        $this->statusCode = $this->response->getStatusCode();

        return $this->response->json();
    }

    /**
     * @param $name
     * @return mixed
     * @throws Exceptions\InvalidResource
     */
    public function __get($name)
    {
        $classname = ucwords(str_replace("_", " ", $name));
        $fullclass = "Marvel\\" . str_replace(' ', '', $classname);

        if (class_exists($fullclass)) {
            return new $fullclass($this);
        }

        throw new \Marvel\Exceptions\InvalidResource('Resource not found');
    }

    public function getUri()
    {
        return $this->baseURI . $this->version;
    }
}