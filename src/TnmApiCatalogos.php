<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmApiCatalogos extends TnmApiServiceBase
{
    const CONSULTAR_CATALOGOS = 'get_catalogs';

    private $client;

    public $tipos_investigacion;
    public $areas_conocimiento;
    public $instituciones;

    public function __construct(TnmApiClient $client)
    {
        parent::__construct($client);
        $this->rootUrl        = $client->getResourceUrl();
        $this->servicePath    = '/catalogos/';
        $this->serviceName    = 'catalogos';

        $this->tipos_investigacion = new CVU_API_Catalogo_Tipos_Investigacion(
            $this,
            $this->serviceName,
            'tipos_investigacion',
            array(
                'methods' => array(
                    'consultar'        => array(
                        'path'        => '/tipos_investigacion/',
                        'httpMethod' => 'GET',
                        'grant_lvl'    => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'key-index'    => array(
                                'location'    => 'none',
                                'type'        => 'boolean',
                                'required'    => false,
                            )
                        ),
                    ),
                    'consultarPorId'    => array(
                        'path'        => '/tipos_investigacion/{id}',
                        'httpMethod' => 'GET',
                        'grant_lvl'    => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id'    => array(
                                'location'    => 'path',
                                'type'        => 'string'
                            )
                        )
                    ),
                ),
            )
        );
        $this->areas_conocimiento = new CVU_API_Catalogo_Areas_Conocimiento(
            $this,
            $this->serviceName,
            'areas_conocimiento',
            array(
                'methods' => array(
                    'consultar'        => array(
                        'path'        => '/areas_conocimiento/',
                        'httpMethod' => 'GET',
                        'grant_lvl'    => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'key-index'    => array(
                                'location'    => 'none',
                                'type'        => 'boolean',
                                'required'    => false,
                            ),
                        ),
                    ),
                    'consultarPorId' => array(
                        'path'        => '/areas_conocimiento/{id}',
                        'httpMethod' => 'GET',
                        'grant_lvl'    => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id'    => array(
                                'location'    => 'path',
                                'type'        => 'string'
                            ),
                        ),
                    ),
                ),
            )
        );
        $this->instituciones = new CVU_API_Catalogo_Instituciones(
            $this,
            $this->serviceName,
            'instituciones',
            array(
                'methods' => array(
                    'consultar'    => array(
                        'path'    => '/instituciones/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'order-by'    => array(
                                'location'    => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'sin-id'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'key-index'    => array(
                                'location'    => 'none',
                                'type'        => 'boolean',
                                'required'    => false,
                            )
                        )
                    ),
                    'consultarPorId'    => array(
                        'path'    => '/instituciones/{id}/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true,
                            )
                        )
                    )
                )
            )
        );
        $this->unidades_organicas = new CVU_API_Catalogo_Unidades_Organicas(
            $this,
            $this->serviceName,
            'unidades_organicas',
            array(
                'methods' => array(
                    'consultar'    => array(
                        'path'    => '/unidades_organicas/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id-institucion' => array(
                                'location'    => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'order-by'    => array(
                                'location'    => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'sin-id'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'key-index'    => array(
                                'location'    => 'none',
                                'type'        => 'boolean',
                                'required'    => false,
                            )
                        )
                    ),
                    'consultarPorId'    => array(
                        'path'    => '/unidades_organicas/{id}/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true,
                            )
                        )
                    )
                )
            )
        );
        $this->puestos = new CVU_API_Catalogo_Puestos(
            $this,
            $this->serviceName,
            'puestos',
            array(
                'methods' => array(
                    'consultar'    => array(
                        'path'    => '/puestos/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id-unidad-organica' => array(
                                'location'    => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'order-by'    => array(
                                'location'    => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'sin-id'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false
                            ),
                            'key-index'    => array(
                                'location'    => 'none',
                                'type'        => 'boolean',
                                'required'    => false,
                            )
                        )
                    ),
                    'consultarPorId'    => array(
                        'path'    => '/puestos/{id}/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true,
                            )
                        )
                    )
                )
            )
        );
        $this->clasificador = new CVU_API_Catalogo_Clasificador(
            $this,
            $this->serviceName,
            'clasificador',
            array(
                'methods' => array(
                    'consultarCapitulos' => array(
                        'path'    => '/clasificador/capitulos',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'nest-up-to' => array(
                                'location' => 'query',
                                'type' => 'string',
                                'required' => false,
                            ),
                            'capitulos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'conceptos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-genericas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-especificas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'key-index' => array(
                                'location' => 'none',
                                'type' => 'boolean',
                                'required' => false,
                            ),
                        )
                    ),
                    'consultarCapitulo' => array(
                        'path'    => '/clasificador/capitulos/{num}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'num'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true
                            ),
                        )
                    ),
                    'consultarConceptos' => array(
                        'path'    => '/clasificador/conceptos',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'capitulos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'conceptos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-genericas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-especificas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'key-index' => array(
                                'location' => 'none',
                                'type' => 'boolean',
                                'required' => false,
                            ),
                        )
                    ),
                    'consultarConcepto' => array(
                        'path'    => '/clasificador/conceptos/{num}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'num'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true
                            ),
                        )
                    ),
                    'consultarPartidasGenericas' => array(
                        'path'    => '/clasificador/partidas-genericas',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'capitulos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'conceptos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-genericas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-especificas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'key-index' => array(
                                'location' => 'none',
                                'type' => 'boolean',
                                'required' => false,
                            ),
                        )
                    ),
                    'consultarPartidaGenerica' => array(
                        'path'    => '/clasificador/partidas-genericas/{num}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'num'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true
                            ),
                        )
                    ),
                    'consultarPartidasEspecificas' => array(
                        'path'    => '/clasificador/partidas-especificas',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'capitulos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'conceptos'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-genericas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'partidas-especificas'    => array(
                                'location' => 'query',
                                'type'        => 'string',
                                'required'    => false,
                            ),
                            'key-index' => array(
                                'location' => 'none',
                                'type' => 'boolean',
                                'required' => false,
                            ),
                        )
                    ),
                    'consultarPartidaEspecifica' => array(
                        'path'    => '/clasificador/partidas-especificas/{num}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'num'    => array(
                                'location'    => 'path',
                                'type'        => 'string',
                                'required'    => true
                            ),
                        )
                    ),
                )
            )
        );
    }
}
class CVU_API_Catalogo_Tipos_Investigacion extends TnmApiResourceBase
{
    /**
     *  Consulta un listado general de los tipos de investigación.
     *  @param array $optParams Establece flitros para el listado obtenido por
     *  el catálogo de tipos de investigación.
     */
    public function consultar($id = null, $optParams = array())
    {
        // $params = array('id' => $id);
        $params = $optParams;
        return $this->call('consultar', array($params), CVU_Tipos_Investigacion::class);
    }

    /**
     * @return CVU_Tipo_Investigacion
     */
    public function consultarPorId($id = null, $optParams = array())
    {
        $params = array('id' => $id);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId', array($params), CVU_Tipo_Investigacion::class);
    }
}
class CVU_Tipos_Investigacion extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Tipo_Investigacion::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_tipo_investigacion';
}
class CVU_Tipo_Investigacion extends TnmApiModelBase
{
    public $id_tipo_investigacion;
    public $nombre;
}
class CVU_API_Catalogo_Areas_Conocimiento extends TnmApiResourceBase
{
    /**
     * @return CVU_Areas_Conocimiento
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        $collection = $this->call('consultar', array($params), CVU_Areas_Conocimiento::class);
        if (isset($params['key-index']) && $params['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }

    /**
     * @return CVU_Area_Conocimiento
     */
    public function consultarPorId($id, $optParams = array())
    {
        $params = array('id' => $id);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId', array($params), CVU_Area_Conocimiento::class);
    }
}
class CVU_Areas_Conocimiento extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Tipo_Investigacion::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_area_conocimiento';
}
class CVU_Area_Conocimiento extends TnmApiModelBase
{
    public $id_area_conocimiento;
    public $nombre;
}
class CVU_API_Catalogo_Instituciones extends TnmApiResourceBase
{
    /**
     * @return CVU_Instituciones
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        $collection = $this->call('consultar', array($params), CVU_Instituciones::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }
    public function listar($optParams = array())
    {
        return $this->consultar($optParams);
    }

    /**
     * @return CVU_Institucion
     */
    public function consultarPorId($id, $optParams = array())
    {
        $params = array('id' => $id);
        $params = array_merge($params, $optParams);
        // var_dump($params);
        // exit;
        return $this->call('consultarPorId', array($params), CVU_Institucion::class);
    }
}
class CVU_Instituciones extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Institucion::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_institucion';
}
class CVU_Institucion extends TnmApiModelBase
{
    public $id_institucion;
    public $nombre;
    public $abreviatura;
}
class CVU_API_Catalogo_Unidades_Organicas extends TnmApiResourceBase
{
    /**
     * @return CVU_Unidades_Organicas
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        $collection = $this->call('consultar', array($params), CVU_Unidades_Organicas::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }
    public function listar($optParams = array())
    {
        return $this->consultar($optParams);
    }
    /**
     * @return CVU_Unidad_Organica
     */
    public function consultarPorId($id, $optParams = array())
    {
        $params = array('id' => $id);
        $params = array_merge($params, $optParams);
        // var_dump($params);
        // exit;
        return $this->call('consultarPorId', array($params), CVU_Unidad_Organica::class);
    }
}
class CVU_Unidades_Organicas extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Unidad_Organica::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_unidad_organica';
}
class CVU_Unidad_Organica extends TnmApiModelBase
{
    public $id_unidad_organica;
    public $nombre;
}
class CVU_API_Catalogo_Puestos extends TnmApiResourceBase
{
    /**
     * @return CVU_Puestos
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        $collection = $this->call('consultar', array($params), CVU_Puestos::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }
    public function listar($optParams = array())
    {
        return $this->consultar($optParams);
    }
    /**
     * @return CVU_Puesto
     */
    public function consultarPorId($id, $optParams = array())
    {
        $params = array('id' => $id);
        $params = array_merge($params, $optParams);
        // var_dump($params);
        // exit;
        return $this->call('consultarPorId', array($params), CVU_Puesto::class);
    }
}
class CVU_Puestos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Puesto::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_puesto';
}
class CVU_Puesto extends TnmApiModelBase
{
    public $id_puesto;
    public $nombre;
}
class CVU_API_Catalogo_Clasificador extends TnmApiResourceBase
{
    /**
     * @return CVU_Clasificador_Capitulos
     */
    public function consultarCapitulos($optParams = array())
    {
        $params = $optParams;
        if (isset($params['capitulos'])) {
            if (is_array($params['capitulos'])) {
                $params['capitulos'] = implode(' ', $params['capitulos']);
            } elseif (is_string($params['capitulos'])) {
                $params['capitulos'] = $params['capitulos'];
            }
        }
        if (isset($params['conceptos'])) {
            if (is_array($params['conceptos'])) {
                $params['conceptos'] = implode(' ', $params['conceptos']);
            } elseif (is_string($params['conceptos'])) {
                $params['conceptos'] = $params['conceptos'];
            }
        }
        if (isset($params['partidas-genericas'])) {
            if (is_array($params['partidas-genericas'])) {
                $params['partidas-genericas'] = implode(' ', $params['partidas-genericas']);
            } elseif (is_string($params['partidas-genericas'])) {
                $params['partidas-genericas'] = $params['partidas-genericas'];
            }
        }
        if (isset($params['partidas-especificas'])) {
            if (is_array($params['partidas-especificas'])) {
                $params['partidas-especificas'] = implode(' ', $params['partidas-especificas']);
            } elseif (is_string($params['partidas-especificas'])) {
                $params['partidas-especificas'] = $params['partidas-especificas'];
            }
        }
        $collection = $this->call('consultarCapitulos', array($params), CVU_Clasificador_Capitulos::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }

    /**
     * @return CVU_Clasificador_Capitulo
     */
    public function consultarCapitulo($num = null, $optParams = array())
    {
        $params = array('num' => $num);
        $params = array_merge($params, $optParams);
        return $this->call('consultarCapitulo', array($params), CVU_Clasificador_Capitulo::class);
    }

    /**
     * @return CVU_Clasificador_Conceptos
     */
    public function consultarConceptos($optParams = array())
    {
        $params = $optParams;
        if (isset($params['capitulos'])) {
            if (is_array($params['capitulos'])) {
                $params['capitulos'] = implode(' ', $params['capitulos']);
            } elseif (is_string($params['capitulos'])) {
                $params['capitulos'] = $params['capitulos'];
            }
        }
        if (isset($params['conceptos'])) {
            if (is_array($params['conceptos'])) {
                $params['conceptos'] = implode(' ', $params['conceptos']);
            } elseif (is_string($params['conceptos'])) {
                $params['conceptos'] = $params['conceptos'];
            }
        }
        if (isset($params['partidas-genericas'])) {
            if (is_array($params['partidas-genericas'])) {
                $params['partidas-genericas'] = implode(' ', $params['partidas-genericas']);
            } elseif (is_string($params['partidas-genericas'])) {
                $params['partidas-genericas'] = $params['partidas-genericas'];
            }
        }
        if (isset($params['partidas-especificas'])) {
            if (is_array($params['partidas-especificas'])) {
                $params['partidas-especificas'] = implode(' ', $params['partidas-especificas']);
            } elseif (is_string($params['partidas-especificas'])) {
                $params['partidas-especificas'] = $params['partidas-especificas'];
            }
        }
        $collection = $this->call('consultarConceptos', array($params), CVU_Clasificador_Conceptos::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }

    /**
     * @return CVU_Clasificador_Concepto
     */
    public function consultarConcepto($num = null, $optParams = array())
    {
        $params = array('num' => $num);
        $params = array_merge($params, $optParams);
        return $this->call('consultarConcepto', array($params), CVU_Clasificador_Concepto::class);
    }

    /**
     * @return CVU_Clasificador_Partidas_Genericas
     */
    public function consultarPartidasGenericas($optParams = array())
    {
        $params = $optParams;
        if (isset($params['capitulos'])) {
            if (is_array($params['capitulos'])) {
                $params['capitulos'] = implode(' ', $params['capitulos']);
            } elseif (is_string($params['capitulos'])) {
                $params['capitulos'] = $params['capitulos'];
            }
        }
        if (isset($params['conceptos'])) {
            if (is_array($params['conceptos'])) {
                $params['conceptos'] = implode(' ', $params['conceptos']);
            } elseif (is_string($params['conceptos'])) {
                $params['conceptos'] = $params['conceptos'];
            }
        }
        if (isset($params['partidas-genericas'])) {
            if (is_array($params['partidas-genericas'])) {
                $params['partidas-genericas'] = implode(' ', $params['partidas-genericas']);
            } elseif (is_string($params['partidas-genericas'])) {
                $params['partidas-genericas'] = $params['partidas-genericas'];
            }
        }
        if (isset($params['partidas-especificas'])) {
            if (is_array($params['partidas-especificas'])) {
                $params['partidas-especificas'] = implode(' ', $params['partidas-especificas']);
            } elseif (is_string($params['partidas-especificas'])) {
                $params['partidas-especificas'] = $params['partidas-especificas'];
            }
        }
        $collection = $this->call('consultarPartidasGenericas', array($params), CVU_Clasificador_Partidas_Genericas::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }

    /**
     * @return CVU_Clasificador_Partida_Generica
     */
    public function consultarPartidaGenerica($num = null, $optParams = array())
    {
        $params = array('num' => $num);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPartidaGenerica', array($params), CVU_Clasificador_Partida_Generica::class);
    }

    /**
     * @return CVU_Clasificador_Partidas_Especificas
     */
    public function consultarPartidasEspecificas($optParams = array())
    {
        $params = $optParams;
        if (isset($params['capitulos'])) {
            if (is_array($params['capitulos'])) {
                $params['capitulos'] = implode(' ', $params['capitulos']);
            } elseif (is_string($params['capitulos'])) {
                $params['capitulos'] = $params['capitulos'];
            }
        }
        if (isset($params['conceptos'])) {
            if (is_array($params['conceptos'])) {
                $params['conceptos'] = implode(' ', $params['conceptos']);
            } elseif (is_string($params['conceptos'])) {
                $params['conceptos'] = $params['conceptos'];
            }
        }
        if (isset($params['partidas-genericas'])) {
            if (is_array($params['partidas-genericas'])) {
                $params['partidas-genericas'] = implode(' ', $params['partidas-genericas']);
            } elseif (is_string($params['partidas-genericas'])) {
                $params['partidas-genericas'] = $params['partidas-genericas'];
            }
        }
        if (isset($params['partidas-especificas'])) {
            if (is_array($params['partidas-especificas'])) {
                $params['partidas-especificas'] = implode(' ', $params['partidas-especificas']);
            } elseif (is_string($params['partidas-especificas'])) {
                $params['partidas-especificas'] = $params['partidas-especificas'];
            }
        }
        $collection = $this->call('consultarPartidasEspecificas', array($params), CVU_Clasificador_Partidas_Especificas::class);
        if (isset($optParams['key-index']) && $optParams['key-index']) {
            $collection->setKeyAsIndex();
        }
        return $collection;
    }
    /**
     * @return CVU_Clasificador_Partida_Especifica
     */
    public function consultarPartidaEspecifica($num = null, $optParams = array())
    {
        $params = array('num' => $num);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPartidaEspecifica', array($params), CVU_Clasificador_Partida_Especifica::class);
    }
}
class CvuClasificadorModelBase extends TnmApiModelBase
{
}
class CVU_Clasificador_Capitulos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Clasificador_Capitulo::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'num_capitulo';
}
class CVU_Clasificador_Capitulo extends CvuClasificadorModelBase
{
    protected $conceptosType = 'CVU_Clasificador_Concepto';
}
class CVU_Clasificador_Conceptos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Clasificador_Conceptos::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'num_concepto';
}
class CVU_Clasificador_Concepto extends CvuClasificadorModelBase
{
    protected $partidas_genericasType = 'CVU_Clasificador_Partida_Generica';
}
class CVU_Clasificador_Partidas_Genericas extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Clasificador_Partida_Generica::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'num_partida_generica';
}
class CVU_Clasificador_Partida_Generica extends CvuClasificadorModelBase
{
    protected $partidas_especificasType = CVU_Clasificador_Partida_Especifica::class;
}
class CVU_Clasificador_Partidas_Especificas extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Clasificador_Partida_Especifica::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'num_partida_especifica';
}
class CVU_Clasificador_Partida_Especifica extends CvuClasificadorModelBase
{
}
