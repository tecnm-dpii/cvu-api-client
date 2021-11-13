<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiHub extends TnmApiServiceBase
{
    private $client;
    private $api_instances = array();

    public $usuarios;

    public function __construct(TnmApiClient $client)
    {
        parent::__construct($client);
        $this->client = $client;
        $this->rootUrl = $client::API_BASE_PATH;
        $this->servicePath = "";
        $this->serviceName = 'cvu-tecnm';

        $this->usuarios = new CVU_API_Usuarios(
            $this,
            $this->serviceName,
            'usuarios',
            array(
                'methods' => array(
                    'buscar' => array(
                        'path'    => '/aplicacion/usuarios/{cvu_tecnm}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_CONFIDENTIAL,
                        'parameters' => array(
                            'cvu_tecnm' => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true
                            )
                        )
                    )
                )
            )
        );
    }
    private function getApiInstance($class)
    {
        if (isset($this->api_instances[$class])) {
            return $this->api_instances[$class];
        }
        return ($this->api_instances[$class] = new $class($this->client));
    }
    public function __get($name)
    {
        switch ($name) {
            case 'perfil':
                return $this->getApiInstance(TnmCvuApiPerfil::class);
            case 'datos_laborales':
                return $this->getApiInstance(TnmCvuApiDatosLaborales::class);
            case 'formacion':
            case 'formacion_academica':
                return $this->getApiInstance(TnmCvuApiFormacionAcademica::class);
            case 'productividad':
                return $this->getApiInstance(TnmCvuApiProductividad::class);
            case 'distinciones':
                return $this->getApiInstance(TnmCvuApiDistinciones::class);
            case 'conacyt':
                return $this->getApiInstance(TnmCvuApiConacyt::class);
            case 'prodep':
                return $this->getApiInstance(TnmCvuApiProdep::class);
        }
    }
}
class CVU_API_Usuarios extends TnmApiResourceBase
{
    /**
     * @return CVU_Usuario
     */
    public function buscar($cvu_tecnm, $optParams = array())
    {
        $params = array('cvu_tecnm' => $cvu_tecnm);
        $params = array_merge($params, $optParams);
        return $this->call('buscar', array($params), CVU_Usuario::class);
    }
}
class CVU_Usuario extends TnmApiModelBase
{
    public $cvu_tecnm;
    public $nombres;
    public $ape_paterno;
    public $ape_materno;

    public function getCvuTecnm()
    {
        return $this->cvu_tecnm;
    }
    public function getNombres()
    {
        return $this->nombres;
    }
    public function getApePaterno()
    {
        return $this->ape_paterno;
    }
    public function getApeMaterno()
    {
        return $this->ape_materno;
    }
}
