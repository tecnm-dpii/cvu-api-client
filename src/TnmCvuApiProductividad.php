<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiProductividad extends TnmApiServiceBase
{
    public $estancias;

    public $productos;
    public $articulos;
    public $capitulos_libro;
    public $libros;
    public $memorias;
    public $propiedades_autorales;
    public $propiedades_industriales;
    public $prototipos;
    public $tesis_dirigidas;

    public $proyectos_investigacion;

    public function __construct(TnmApiClient $client)
    {
        parent::__construct($client);
        $this->rootUrl = $client::API_BASE_PATH;
        $this->servicePath = '/productividad/';
        $this->serviceName = 'productividad';

        $this->estancias = new CVU_API_Productividad_Estancias(
            $this,
            $this->serviceName,
            'estancias',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'estancias/{id_estancia}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_estancia'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    )
                )
            )
        );
        $this->productos = new CVU_API_Productividad(
            $this,
            $this->serviceName,
            'productos',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'productos/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'productos/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->articulos = new CVU_API_Productividad_Articulos(
            $this,
            $this->serviceName,
            'articulos',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'articulos/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'articulos/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->capitulos_libro = new CVU_API_Productividad_Capitulos_Libro(
            $this,
            $this->serviceName,
            'capitulos_libro',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'capitulos_libro/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'capitulos_libro/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->libros = new CVU_API_Productividad_Libros(
            $this,
            $this->serviceName,
            'libros',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'libros/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'libros/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->memorias = new CVU_API_Productividad_Memorias(
            $this,
            $this->serviceName,
            'memorias',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'memorias/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'memorias/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->propiedades_autorales = new CVU_API_Productividad_Propiedades_Autorales(
            $this,
            $this->serviceName,
            'propiedades_autorales',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'propiedades_autorales/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'propiedades_autorales/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->propiedades_industriales = new CVU_API_Productividad_Propiedades_Industriales(
            $this,
            $this->serviceName,
            'propiedades_industriales',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'propiedades_industriales/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'propiedades_industriales/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->prototipos = new CVU_API_Productividad_Prototipos(
            $this,
            $this->serviceName,
            'prototipos',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'prototipos/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'prototipos/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->tesis_dirigidas = new CVU_API_Productividad_Tesis_Dirigidas(
            $this,
            $this->serviceName,
            'tesis_dirigidas',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'tesis_dirigidas/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'			=> 'tesis_dirigidas/{id_producto_acad}',
                        'httpMethod'	=> 'GET',
                        'grant_lvl'		=> TnmApiClient::OWNER_ACCESS,
                        'parameters'	=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true
                            )
                        )
                    )
                )
            )
        );
        $this->otros = new CVU_API_Productividad_Otros(
            $this,
            $this->serviceName,
            'otros',
            array(
                'methods' => array(
                    'consultar'	=> array(
                        'path'		=> 'otros/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            // ------------------------------------------------
                            //	FILTROS DE PRODUCTOS DE INVESTIGACIÓN
                            // ------------------------------------------------
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'pais_alfa2'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'pais_alfa3'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'proposito'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_conocimiento'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'area_prioritaria'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'disciplina'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'sector'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'publicado_desde'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'publicado_hasta'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            // ------------------------------------------------
                            //	FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false
                            )
                        )
                    ),
                    'consultarPorId'	=> array(
                        'path'		=> 'otros/{id_producto_acad}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_producto_acad'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true,
                            )
                        )
                    )
                )
            )
        );
    }
}
class CVU_API_Productividad_Estancias extends TnmApiResourceBase
{
    /**
     * @return CVU_Estancias
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_Estancias::class);
    }
}
class CVU_Estancias extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Estancia::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_estancia';
}
class CVU_Estancia extends TnmApiModelBase
{
    public $id_estancia;
    public $proyecto;
    public $institucion;
    public $objetivo_general;
    public $fecha_inicio;
    public $fecha_fin;
}
class CVU_Producto extends TnmApiModelBase
{
    public $id_producto_acad;
    public $id_disciplina;
    public $disciplina;
    public $id_sector;
    public $sector;
    public $id_area_conocimiento;
    public $area_conocimiento;
    public $id_area_prioritaria;
    public $area_prioritaria;
    public $id_pais;
    public $pais;
    public $id_proposito;
    public $proposito;
    public $autores;
    public $posicion_autor;
    public $titulo;
    public $descripcion;
    public $fecha_publicacion;
    public $tipo_producto;

    public function getId()
    {
        return $this->id_producto_acad;
    }
    public function getIdDisciplina()
    {
        return $this->id_disciplina;
    }
    public function getDisciplina()
    {
        return $this->disciplina;
    }
    public function setDisciplina($id_disciplina, $disciplina = null)
    {
        $this->id_disciplina = $id_disciplina;
        if (!is_null($disciplina)) {
            $this->disciplina = $disciplina;
        }
        return $this;
    }
    public function getIdAreaConocimiento()
    {
        return $this->id_area_conocimiento;
    }
    public function getAreaConocimiento()
    {
        return $this->area_conocimiento;
    }
    public function setAreaConocimiento($id_area_conocimiento, $area_conocimiento = null)
    {
        $this->id_area_conocimiento = $id_area_conocimiento;
        if (!is_null($area_conocimiento)) {
            $this->area_conocimiento = $area_conocimiento;
        }
        return $this;
    }
    public function getIdAreaPrioritaria()
    {
        return $this->id_area_prioritaria;
    }
    public function getAreaPrioritaria()
    {
        return $this->area_prioritaria;
    }
    public function setAreaPrioritaria($id_area_prioritaria, $area_prioritaria = null)
    {
        $this->id_area_prioritaria = $id_area_prioritaria;
        if (!is_null($area_prioritaria)) {
            $this->area_prioritaria = $area_prioritaria;
        }
        return $this;
    }
    public function getIdPais()
    {
        return $this->id_pais;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function setPais($id_pais, $pais = null)
    {
        $this->id_pais = $id_pais;
        if (!is_null($pais)) {
            $this->pais = $pais;
        }
        return $this;
    }
    public function getIdProposito()
    {
        return $this->id_proposito;
    }
    public function getProposito()
    {
        return $this->proposito;
    }
    public function setProposito($id_proposito, $proposito = null)
    {
        $this->id_proposito = $id_proposito;
        if (!is_null($proposito)) {
            $this->proposito = $proposito;
        }
        return $this;
    }
    public function getAutores()
    {
        return $this->autores;
    }
    public function getAutoresArray()
    {
        $autores = explode(';',trim($this->autores));
        return $autores;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getFechaPublicacion()
    {
        return $this->fecha_publicacion;
    }
    public function getTipoProducto()
    {
        return $this->tipo_producto;
    }
}
class CVU_API_Productividad extends TnmApiResourceBase
{
    /**
     * @return CVU_Productos
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_Productos::class);
    }

    /**
     * @return CVU_Producto
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_Producto::class);
    }
}
class CVU_Productos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Productos::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_API_Productividad_Articulos extends TnmApiResourceBase
{
    /**
     * @return CVU_Articulos
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar', array($params), CVU_Articulos::class);
    }

    /**
     * @return CVU_Articulo
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_Articulo::class);
    }
}
class CVU_Articulos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Articulo::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_Articulo extends CVU_Producto
{
    public $id_tipo_articulo;
    public $tipo_articulo;
    public $nombre_revista;
    public $editorial;
    public $volumen;
    public $indice_de_registro;
    public $issn;
    public $de_la_pagina;
    public $a_la_pagina;
    public $direccion_electronica;
}
class CVU_API_Productividad_Capitulos_Libro extends TnmApiResourceBase
{
    /**
     * @return CVU_CapitulosLibro
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_CapitulosLibro::class);
    }

    /**
     * @return CVU_CapituloLibro
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_CapituloLibro::class);
    }
}
class CVU_CapitulosLibro extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_CapituloLibro::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_CapituloLibro extends CVU_Producto
{
    public $titulo_libro;
    public $editorial;
    public $edicion;
    public $isbn;
    public $de_la_pagina;
    public $a_la_pagina;
}
class CVU_API_Productividad_Libros extends TnmApiResourceBase
{
    /**
     * @return CVU_Libros
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params,$optParams);
        return $this->call('consultar',array($params), CVU_Libros::class);
    }
    /**
     * @return CVU_Libro
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_Libro::class);
    }
}
class CVU_Libros extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Libro::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_Libro extends CVU_Producto
{
    public $id_tipo_participacion;
    public $tipo_participacion;
    public $editorial;
    public $paginas;
    public $edicion;
    public $isbn;
}
class CVU_API_Productividad_Memorias extends TnmApiResourceBase
{
    /**
     * @return CVU_Memorias
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_Memorias::class);
    }

    /**
     * @return CVU_Memoria
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_Memoria::class);
    }
}
class CVU_Memorias extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Memoria::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_Memoria extends CVU_Producto
{
    public $nombre_congreso;
    public $estado;
    public $ciudad;
    public $de_la_pagina;
    public $a_la_pagina;
    public $arbitrado;
    public $isbn;
}
class CVU_API_Productividad_Propiedades_Autorales extends TnmApiResourceBase
{
    /**
     * @return CVU_PropiedadesAutorales
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params,$optParams);
        return $this->call('consultar',array($params), CVU_PropiedadesAutorales::class);
    }

    /**
     * @return CVU_PropiedadAutoral
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_PropiedadAutoral::class);
    }
}
class CVU_PropiedadesAutorales extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_PropiedadAutoral::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_PropiedadAutoral extends CVU_Producto
{
    public $id_tipo_propiedad;
    public $tipo_propiedad;
    public $clave_registro;
}
class CVU_API_Productividad_Propiedades_Industriales extends TnmApiResourceBase
{
    /**
     * @return CVU_PropiedadesIndustriales
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_PropiedadesIndustriales::class);
    }

    /**
     * @return CVU_PropiedadIndustrial
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_PropiedadIndustrial::class);
    }
}
class CVU_PropiedadesIndustriales extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_PropiedadIndustrial::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_PropiedadIndustrial extends CVU_Producto
{
    public $id_tipo_propiedad;
    public $tipo_propiedad;
    public $id_seccion_ompi;
    public $seccion_ompi;
    public $uso;
    public $num_registro;
    public $usuario;
}
class CVU_API_Productividad_Prototipos extends TnmApiResourceBase
{
    /**
     * @return CVU_Prototipos
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_Prototipos::class);
    }

    /**
     * @return CVU_Prototipo
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_Prototipo::class);
    }
}
class CVU_Prototipos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Prototipo::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_Prototipo extends CVU_Producto
{
    public $id_tipo_prototipo;
    public $tipo_prototipo;
    public $objetivo;
    public $caracteristicas;
    public $institucion_creado;
}
class CVU_API_Productividad_Tesis_Dirigidas extends TnmApiResourceBase
{
    /**
     * @return CVU_TesisDirigidas
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_TesisDirigidas::class);
    }

    /**
     * @return CVU_TesisDirigida
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_TesisDirigida::class);
    }
}
class CVU_TesisDirigidas extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_TesisDirigida::class;
    protected $itemsDataType = 'array';
    protected $itemsKeyName = 'id_producto_acad';
}
class CVU_TesisDirigida extends CVU_Producto
{
    public $id_grado;
    public $grado;
    public $concluido;
    public $estado;
}
class CVU_API_Productividad_Otros extends TnmApiResourceBase
{
    /**
     * @return CVU_OtrosProductos
     */
    public function consultar(array $optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        return $this->call('consultar',array($params), CVU_OtrosProductos::class);
    }

    /**
     * @return CVU_OtroProducto
     */
    public function consultarPorId($id_producto_acad, array $optParams = array())
    {
        $params = array('id_producto_acad'=>$id_producto_acad);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId',array($params), CVU_OtroProducto::class);
    }
}
class CVU_OtrosProductos extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_OtroProducto::class;
    protected $itemsDataType = 'array';
    protected $itemsKey = 'id_producto_acad';
}
class CVU_OtroProducto extends CVU_Producto
{

}
