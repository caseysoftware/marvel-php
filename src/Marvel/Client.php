<?php

namespace Marvel;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'marvel-php/0.9.0';

    protected $baseUri = 'http://gateway.marvel.com/';
    protected $version = 'v1/public/';

    protected $apikey   = '';
    protected $client   = null;
    protected $request  = null;

    public $response = null;
    public $statusCode = null;
    public $detail   = null;

    public function __construct($publicKey, $privateKey, $httpClient = null) { }

    public function get($uri, $params = array()) { }

    public function __get($name) { }
}