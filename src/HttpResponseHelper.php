<?php

namespace TecNM_DPII\CVU_API_Client;

class HttpResponseHelper
{
    public const STATUS_CONTINYE = 100;
    public const STATUS_SWITCHING_PROTOCOLS = 101;
    public const STATUS_OK = 200;
    public const STATUS_CREATED = 201;
    public const STATUS_ACCEPTED = 202;
    public const STATUS_NON_AUTHORITATIVE_INFORMATION = 203;
    public const STATUS_NO_CONTENT = 204;
    public const STATUS_RESET_CONTENT = 205;
    public const STATUS_PARTIAL_CONTENT = 206;
    public const STATUS_MULTIPLE_CHOICES = 300;
    public const STATUS_MOVED_PERMANENTLY = 301;
    public const STATUS_FOUND = 302;
    public const STATUS_SEE_OTHER = 303;
    public const STATUS_NOT_MODIFIED = 304;
    public const STATUS_USE_PROXY = 305;
    public const STATUS_TEMPORARY_REDIRECT = 307;
    public const STATUS_BAD_REQUEST = 400;
    public const STATUS_UNAUTHORIZED = 401;
    public const STATUS_PAYMENT_REQUIRED = 402;
    public const STATUS_FORBIDDEN = 403;
    public const STATUS_NOT_FOUND = 404;
    public const STATUS_METHOD_NOT_ALLOWED = 405;
    public const STATUS_NOT_ACCEPTABLE = 406;
    public const STATUS_CONFLICT = 409;
    public const STATUS_INTERNAL_SERVER_ERROR = 500;
    public const STATUS_NOT_IMPLEMENTED = 501;
    public const STATUS_SERVICE_UNAVAILABLE = 503;


    private $statusCode;
    private $headers;
    private $content;

    public function __construct()
    {
        $this->statusCode = self::STATUS_OK;

        $this->headers = array();
        $this->content = null;
    }
    public static function fromCURL($curl, $curl_response)
    {
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $header_size    = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header_space   = trim(substr($curl_response, 0, $header_size));
        $content        = substr($curl_response, $header_size);

        $headers = explode("\r\n", $header_space);
        $headers_len = count($headers);
        $header_list = array();
        for ($i = 2; $i < $headers_len; $i++) {
            list($header, $h_content) = explode(":", $headers[$i]);
            $header_list[$header] = trim($h_content);
        }

        $response = new HttpResponseHelper();
        $response->setStatusCode($statusCode);
        $response->setHeaders($header_list);
        $response->setBody($content);

        return $response;
    }
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    public function setHeaders(array $headers)
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }
    public function getHeaders()
    {
        return $this->headers;
    }
    public function setHeader($name, $content = null)
    {
        if (is_null($content)) {
            $colon_pos = strpos($name, ':');
            $content = trim(substr($name, $colon_pos + 1));
            $name = trim(substr($name, 0, $colon_pos));
        }
        // echo "{$name} - {$content}<br/>";
        $this->headers[$name] = $content;
        return $this;
    }
    public function getHeader($header)
    {
        if (empty($this->headers[$header])) {
            return false;
        }
        return $this->headers[$header];
    }
    public function hasHeaders()
    {
        return !empty($this->headers);
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setBody($body)
    {
        $this->setContent($body);
    }
    public function getContent()
    {
        return $this->content ?? '';
    }
    public function getBody()
    {
        return $this->getContent();
    }
    public function send()
    {
        // SENDS THE RESPONSE STATUS CODE
        if (function_exists('php_http_response_code')) {
            http_response_code($this->statusCode);
        } else {
            http_response_code($this->statusCode);
        }
        // SEND THE RESPONSE HEADERS
        if (function_exists('php_header')) {
            foreach ($this->headers as $header => &$content) {
                header("{$header}: {$content}");
            }
        } else {
            foreach ($this->headers as $header => &$content) {
                header("{$header}: {$content}");
            }
        }
        // SENDS THE RESPONSE BODY
        echo($this->content);
    }
}
