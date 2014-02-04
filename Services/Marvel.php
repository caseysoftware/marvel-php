<?php

function Services_Marvel_autoload($className)
{
    $library_name = 'Services_Marvel';

    if (substr($className, 0, strlen($library_name)) != $library_name) {
        return false;
    }
    $file = str_replace('_', '/', $className);
    $file = str_replace('Services/', '', $file);

    return include dirname(__FILE__) . "/$file.php";
}

spl_autoload_register('Services_Marvel_autoload');

class Services_Marvel
{
    const USER_AGENT = 'marvel-php/0.0.1';

    protected $baseUri = 'http://gateway.marvel.com/';
    protected $version = 'v1/public/';

    protected $public_key = null;
    protected $private_key = null;

    public $response_code = null;
    public $response_headers = null;
    public $response_json = null;
    public $response_obj = null;

    public function __construct($public_key, $private_key)
    {
        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    public function __get($name)
    {
        $classname = 'Services_Marvel_'.ucwords($name);

        try {
            $object = new $classname($this);
        } catch (Exception $exc) {
            print_r($exc);
        }

        return $object;
    }

    /**
     * @param $uri              Base uri that the request will go to
     * @param array $params Additional parameters to attach to the uri
     */
    public function get($uri, $params = array())
    {
        $timestamp = time();
        $params['ts'] = $timestamp;
        $params['apikey'] = $this->public_key;
        $params['hash'] = md5($timestamp . $this->private_key . $this->public_key);

        $uri .= (count($params)) ? '?'.http_build_query($params) : '';

        $curl_opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $uri
        );

        return $this->_execute($curl_opts);
    }

    protected function _execute($curl_params = array())
    {
        //open connection
        $connection = curl_init();
        $curl_params[CURLOPT_USERAGENT] = self::USER_AGENT;

        foreach ($curl_params as $option => $value) {
            curl_setopt($connection, $option, $value);
        }

        // All requests are over http, not https
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, false);

        //execute request
        $response = curl_exec($connection);
        $headers = explode("\r\n\r\n", $response);
        $this->response_code = curl_getinfo($connection, CURLINFO_HTTP_CODE);
        $this->response_headers = $headers;
        $this->response_json    = $response;
        $this->response_obj     = json_decode($this->response_json);

        curl_close($connection);
    }

    public function getUri()
    {
        return $this->baseUri . $this->version;
    }
}
