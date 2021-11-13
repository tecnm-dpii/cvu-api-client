<?php

namespace TecNM_DPII\CVU_API_Client;

abstract class TnmApiServiceBase
{
    private $client;
    public function __construct(TnmApiClient $client)
    {
        $this->client = $client;
    }
    public function getClient()
    {
        return $this->client;
    }	
}
