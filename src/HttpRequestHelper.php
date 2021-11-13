<?php

namespace TecNM_DPII\CVU_API_Client;

class HttpRequestHelper
{
    const METHOD_UNKNOWN = 0;
    const METHOD_GET	= 'GET';
    const METHOD_POST	= 'POST';
    const METHOD_PUT	= 'PUT';
    const METHOD_DELETE = 'DELETE';

    private $method;
    private $protocol;
    private $baseUrl;
    private $port;
    private $query;
    private $headers;
    private $body;
    private $error;

    private $queryVars;
    private $bodyVars;

    private $userpwd;
    private $timeout;
    private $ca_path;

    public function __construct($baseUrl = null)
    {
        if (empty($baseUrl)) {
            $this->loadCurrentRequest();
        } else {
            $this->baseUrl = $baseUrl;
            $this->queryVars = array();
            $this->bodyVars = array();
            $this->method = self::METHOD_GET;
            $this->headers = array();
            $this->protocol = null;
            $this->ca_path = dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'cacert.pem';
        }
        // $this->error = new ErrorHandler();
    }
    public static function instance($baseUrl = null)
    {
        return new static($baseUrl);
    }
    private function loadCurrentRequest()
    {
        $this->baseUrl	= rtrim('http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", '/');
        $this->headers	= getallheaders();
        $this->query	= $_SERVER['QUERY_STRING'];
        $this->body		= @file_get_contents('php://input');
        $this->port		= $_SERVER['SERVER_PORT'];

        $this->queryVars = array();
        if (!empty($this->query)) {
            parse_str($this->query, $this->queryVars);
        }

        $this->bodyVars = array();
        if (!empty($this->body)) {
            parse_str($this->body, $this->bodyVars);
        }

        switch ($_SERVER['REQUEST_METHOD']) {
            case !strcasecmp($_SERVER['REQUEST_METHOD'], 'GET'):
                $this->method = self::METHOD_GET;
                $this->methodString = 'GET';
                // $contents = file_get_contents('php://input');
                // if (!empty($contents)) {
                // $body = array();
                // parse_str($contents, $body);
                // $this->body = $body;
                // }
                break;
            case !strcasecmp($_SERVER['REQUEST_METHOD'], 'POST'):
                $this->methodString = 'POST';
                $this->method = self::METHOD_POST;
                // $this->body = $_POST;
                break;
            case !strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT'):
                $this->methodString = 'PUT';
                $this->method = self::METHOD_PUT;
                // $this->body = $_PUT;
                break;
            case !strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE'):
                $this->methodString = 'DELETE';
                $this->method = self::METHOD_DELETE;
                // $this->body = $_DELETE;
                break;
            default:
                $this->methodString = $_SERVER['REQUEST_METHOD'];
                $this->method = self::METHOD_UNKNOWN;
                break;
        }
    }
    public function setUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }
    public function setPort($port)
    {
        if (!is_numeric($port)) {
            trigger_error("The port {$port} is not numeric", E_USER_WARNING);
        }
        $this->port = $port;
        return $this;
    }
    public function setAuth($username, $password)
    {
        $this->userpwd = "{$username}:{$password}";
        return $this;
    }
    public function setTimeout($seconds)
    {
        $this->timeout = $seconds;
        return $this;
    }
    public function setCAPath($ca_path)
    {
        $this->ca_path = $ca_path;
        return $this;
    }
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getMethodString()
    {
        return $this->methodString;
    }
    public function setHeader($header, $content = null)
    {
        if (is_array($header)) {
            $this->headers = array_merge($this->headers, $header);
        } else {
            if (isset($content)) {
                $this->headers[$header] = $content;
            }
        }
        return $this;
    }
    public function unsetHeader($header)
    {
        unset($this->headers[$header]);
        return $this;
    }
    public function getHeader($header)
    {
        if (!isset($this->headers[$header])) {
            return false;
        }
        return $this->headers[$header];
    }
    public function getHeaders()
    {
        return $this->headers;
    }
    /**
     *
     */
    public function getQueryString()
    {
        return $this->query;
    }
    /**
     *	@deprecated
     */
    public function getGet($name)
    {
        trigger_error("Using deprectaded Request::getGet() function. Use Request::getQueryVar(\$name: {$name}) instead.", E_USER_DEPRECATED);
        return $this->getQueryVar($name);
    }
    /**
     *
     */
    public function getQueryVar($name)
    {
        if (isset($this->queryVars[$name])) {
            return $this->queryVars[$name];
        }
    }
    /**
     *	@deprecated
     */
    public function setGet($name, $value = null)
    {
        trigger_error("Using deprectaded Request::setGet() function. Use Request::setQueryVar(\$name: {$name}, \$value) instead.", E_USER_DEPRECATED);
        $this->setQueryVar($name, $value);
    }
    /**
     *
     */
    public function setQueryVar($name, $value = null)
    {
        if (is_array($name)) {
            $this->queryVars = array_merge($this->queryVars, $name);
        } else {
            $this->queryVars[$name] = $value;
        }
    }
    /**
     *	@deprecated
     */
    public function setData($name, $value = null)
    {
        trigger_error("Using deprectaded Request::setData() function. Use Request::setBodyVar(\$name: {$name}, \$value) instead.", E_USER_DEPRECATED);
        $this->setBodyVar($name, $value);
    }
    /**
     *
     */
    public function setBodyVar($name, $value = null)
    {
        if (is_array($name)) {
            $this->bodyVars = array_merge($this->bodyVars, $name);
        } else {
            $this->bodyVars[$name] = $value;
        }
    }
    /**
     *	@deprecated
     */
    public function getData($name)
    {
        trigger_error("Using deprectaded Request::getData() function. Use Request::getBodyVar(\$name: {$name}) instead.", E_USER_DEPRECATED);
        return $this->getbodyVar($name);
    }
    /**
     *
     */
    public function getBodyVar($name)
    {
        if (isset($this->bodyVars[$name])) {
            return $this->bodyVars[$name];
        }
    }
    public function setFile()
    {
        return $this;
    }
    public function send()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if (!empty($this->timeout)) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        }
        if (!empty($this->port)) {
            curl_setopt($ch, CURLOPT_PORT, $this->port);
        }
        if (!empty($this->headers)) {
            $headers = array();
            foreach ($this->headers as $header => $content) {
                $header = rtrim($header, ':');
                $headers[] = "{$header}: {$content}";
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if (preg_match('/^https:\/\/(.*)$/i', $this->baseUrl)) {
            if (empty($this->ca_path)) {
                trigger_error("HTTPS request without Authority Certificate is currently unset.", E_USER_WARNING);
            } else if (!file_exists($this->ca_path)) {
                trigger_error("Cannot find Authority Certificate file.", E_USER_ERROR);
                return;
            } else {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOPT_CAINFO, $this->ca_path);
            }
        }
        $url = $this->baseUrl;
        if (!empty($this->queryVars)) {
            $this->query = http_build_query($this->queryVars);
            $url = $this->baseUrl . '?' . $this->query;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($this->bodyVars)) {
            $this->body = http_build_query($this->bodyVars);
            curl_setopt_array($ch, array(
                CURLOPT_POST		=> count($this->bodyVars),
                CURLOPT_POSTFIELDS	=> $this->body
            ));
        }

        switch ($this->method) {
            case self::METHOD_GET:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case self::METHOD_POST:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                break;
            case self::METHOD_PUT:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            default:
                trigger_error("Unknown Request Method", E_USER_WARNING);
                break;
        }
        if (!empty($this->userpwd)) {
            curl_setopt($ch, CURLOPT_USERPWD, $this->userpwd);
        }
        set_time_limit($this->timeout + 1000);
        $response = curl_exec($ch);

        if (curl_errno($ch) !== 0) {
            $curl_error = curl_error($ch);
            throw new \Exception("An error ocurred when sending the Request.\r\n{$curl_error}", curl_errno($ch));
        }

        $httpResponse = HttpResponseHelper::fromCURL($ch, $response);

        curl_close($ch);

        return $httpResponse;
    }
}
