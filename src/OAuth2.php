<?php

namespace TecNM_DPII\CVU_API_Client;

class OAuth2
{
    public function __construct($config)
    {
        $opts = array([
            'clientId'              => null,
            'clientSecret'          => null,
            'authorizationUrl'      => null,
            'tokenCredentialUri'    => null,
            'redirectUri'           => null,
            'issuer'                => null
        ], $config);
        $this->setAuthorizationUri($opts['authorizationUrl']);
        $this->setRedirectUri($opts['redirectUri']);
        $this->setTokenCredentialUri($opts['tokenCredentialUri']);
        $this->setClientId($opts['clientId']);
        $this->setClientSecret($opts['clientSecret']);
        $this->setIssuer($opts['issuer']);
    }
    public function coerceUri($uri)
    {
        if (is_null($uri)) {
            return null;
        }
        return $uri;
    }
    public function setAuthorizationUri($uri)
    {
        $this->authorizationUri = $this->coerceUri($uri);
    }
    public function getAuthorizationUri()
    {
        return $this->authorizationUri;
    }
    public function setTokenCredentialUri($uri)
    {
        $this->tokenCredentialUri = $this->coerceUri($uri);
    }
    public function getTokenCredentialUri()
    {
        return $this->tokenCredentialUri;
    }
    public function setRedirectUri($uri)
    {
        if (is_null($uri)) {
            $this->redirectUri = null;
            return;
        }
        if (!$this->isAbsolute($uri)) {
            throw new \Exception("Redirect URI debe ser absoluta");
        }
        $this->redirectUri = (string) $uri;
    }
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    private function setClientId($clientId)
    {
    }

    private function setClientSecret($clientSecret)
    {
    }

    private function setIssuer($issuer)
    {
    }

    private function isAbsolute($uri)
    {
    }
}
