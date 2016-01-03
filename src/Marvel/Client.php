<?php

namespace Marvel;

use GuzzleHttp\Client as GuzzleClient;
use Marvel\Exceptions\InvalidResource;

/**
 * Class Client
 * @package Marvel
 *
 * @property-read string $comics
 */
class Client
{
    const USER_AGENT = 'marvel-php/2.0.0';

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
        $this->httpClient = (is_null($httpClient)) ? new GuzzleClient(
            ['base_uri' => $this->baseURI, 'headers' => ['User-Agent' => $this::USER_AGENT . '/' . PHP_VERSION ]]
        ) : $httpClient;
    }

    public function get($uri, $params = array())
    {
        $timestamp = time();
        $params['ts'] = $timestamp;
        $params['apikey'] = $this->publicKey;
        $params['hash'] = md5($timestamp . $this->privateKey . $this->publicKey);

        $this->response = $this->httpClient->get($uri, ['exceptions' => false, 'query' => $params] );

        $this->statusCode = $this->response->getStatusCode();
        $raw_body = $this->response->getBody();

        return json_decode($raw_body, true);
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

        throw new InvalidResource('Resource not found');
    }

    public function getUri()
    {
        return $this->baseURI . $this->version;
    }
}