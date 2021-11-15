<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiProdep extends TnmApiServiceBase
{
    public $registro;
    public $perfil_deseable;
    public $cuerpos_academicos;
    public $niveles_cuerpo_academico;
    public $areas;

    public function __construct(TnmApiClient $client)
    {
        parent::__construct($client);
        $this->rootUrl = $client->getResourceUrl();
        $this->servicePath = '/prodep/';
        $this->serviceName = 'prodep';

        $this->registro = new CVU_API_Prodep_Registro(
            $this,
            $this->serviceName,
            'registro',
            array(
                'methods' => array(
                    'consultar' => array(
                        'path'      => 'registro/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::OWNER_ACCESS,
                        'parameters' => array()
                    ),
                )
            )
        );
        $this->perfil_deseable = new CVU_API_Prodep_PerfilDeseable(
            $this,
            $this->serviceName,
            'perfil_deseable',
            array(
                'methods' => array(
                    'consultar' => array(
                        'path'      => 'perfil_deseable/{id_perfil_deseable}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::OWNER_ACCESS,
                        'parameters' => array(
                            'id_perfil_deseable' => array(
                                'location'  => 'path',
                                'type'      => 'number',
                                'required'  => false,
                            ),
                            // ------------------------------------------------
                            //  FILTROS GLOBALES DE CVU
                            // ------------------------------------------------
                            'cvu_registrado_desde' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'cvu_registrado_hasta' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'cvu_modificado_desde' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'cvu_modificado_hasta' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'unchecked' => array(
                                'location'  => 'query',
                                'type'      => 'boolean',
                                'required'  => false
                            )
                        )
                    ),
                    'listar'    => array(
                        'path'      => 'perfil_deseable/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::OWNER_ACCESS,
                        'parameters' => array(
                            'vigente_en' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'cvu_modificado_hasta'  => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'unchecked' => array(
                                'location'  => 'query',
                                'type'      => 'boolean',
                                'required'  => false,
                            )
                        )
                    )
                )
            )
        );
        $this->cuerpos_academicos = new CVU_API_Prodep_CuerposAcademicos(
            $this,
            $this->serviceName,
            'cuerpos_academicos',
            array(
                'methods' => array(
                    'consultar' => array(
                        'path'      => 'cuerpos_academicos/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'vigente_en' => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'institucion' => array(
                                'location'  => 'query',
                                'type'      => 'string',
                                'required'  => false,
                            ),
                            'id_nivel'  => array(
                                'location'  => 'query',
                                'type'      => 'number',
                                'required'  => false,
                            ),
                            'miembro'   => array(
                                'location'  => 'query',
                                'type'      => 'string',
                                'required'  => false,
                            ),
                            'responsable' => array(
                                'location'  => 'query',
                                'type'      => 'string',
                                'required'  => false,
                            ),
                            'colaborador' => array(
                                'location'  => 'query',
                                'type'      => 'string',
                                'required'  => false,
                            ),
                            'cvu_modificado_hasta'  => array(
                                'location'  => 'query',
                                'type'      => 'date',
                                'required'  => false,
                            ),
                            'unchecked' => array(
                                'location'  => 'query',
                                'type'      => 'boolean',
                                'required'  => false,
                            )
                        )
                    ),
                    'consultarPorId'    => array(
                        'path'      => 'cuerpos_academicos/{id_cuerpo_academico}',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'id_cuerpo_academico'   => array(
                                'location'  => 'path',
                                'type'      => 'string',
                                'required'  => true,
                            ),
                            'cvu_miembros'  => array(
                                'location'  => 'query',
                                'type'      => 'boolean',
                                'required'  => false,
                            )
                        )
                    ),
                    'consultarPorClave' => array(
                        'path'      => 'cuerpos_academicos/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array(
                            'clave_ca'  => array(
                                'location'  => 'query',
                                'type'      => 'string',
                                'required'  => true,
                            ),
                            'cvu_miembros'  => array(
                                'location'  => 'query',
                                'type'      => 'boolean',
                                'required'  => false,
                            )
                        )
                    ),
                )
            )
        );
        $this->niveles_cuerpo_academico = new CVU_API_Prodep_NivelesCuerpoAcademico(
            $this,
            $this->serviceName,
            'niveles_cuerpo_academico',
            array(
                'methods'   => array(
                    'listar'    => array(
                        'path'      => 'niveles_cuerpo_academico/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array()
                    )
                )
            )
        );
        $this->areas = new CVU_API_Prodep_Areas(
            $this,
            $this->serviceName,
            'areas',
            array(
                'methods'   => array(
                    'listar' => array(
                        'path'  => 'areas/',
                        'httpMethod' => 'GET',
                        'grant_lvl' => TnmApiClient::CLIENT_BASIC,
                        'parameters' => array()
                    )
                )
            )
        );
    }
}
class CVU_API_Prodep_Areas extends TnmApiResourceBase
{
    /**
     * @return CVU_AreasProdep
     */
    public function listar()
    {
        $params = array();
        return $this->call('listar', array($params), CVU_AreasProdep::class);
    }
}
class CVU_AreasProdep extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_AreaProdep::class;
    protected $itemsDataType = 'array';
}
class CVU_AreaProdep extends TnmApiModelBase
{
    protected $id_area;
    protected $nombre;
    public function getId()
    {
        return $this->id_area;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
}
class CVU_API_Prodep_Registro extends TnmApiResourceBase
{
    /**
     *  Consulta adscripciones de la persona a TECNM
     *
     *  @param int $id_adscripcion Realiza la consulta de un único programa.
     *  @return CVU_RegistroProdep
     */
    public function consultar()
    {
        $params = array();
        return $this->call('consultar', array($params), CVU_RegistroProdep::class);
    }
}
class CVU_RegistroProdep extends TnmApiModelBase
{
    public $clave;
    public function getClave()
    {
        return $this->clave;
    }
}
class CVU_API_Prodep_PerfilDeseable extends TnmApiResourceBase
{
    /**
     *  Consulta adscripciones de la persona a TECNM
     *
     *  @param int $id_adscripcion Realiza la consulta de un único programa.
     *  @return CVU_PerfilesDeseablesProdep
     */
    public function consultar(array $optParams = array())
    {
        $params = $optParams;
        return $this->call('consultar', array($params), CVU_PerfilesDeseablesProdep::class);
    }
    /**
     *  Lista las adscripciones de la persona a TECNM
     *
     *  @param array $optParams Establece filtros para los programas.
     *      - int $id_institucion: Recupera los programas que pertenecen a la institucion especificada.
     *      - int $id_plantel: Recupera los programas que pertenecen al plantel especificado.
     *      - boolean $vigente: (UNICAMENTE SI ESTA DEFINIDO)
     *          - Si es VERDADERO devuelve en la lista una adscripción que es la última vigente registrada.
     *          - Si es FALSO devuelve una lista las adscripciones que no son vigentes.
     *      - boolean $unchecked:
     *          - Si es VERDADERO devolverá incluso aquellas adscripciones que no hayan sido verificadas
     *          por TECNM, es decir, no han pasado un proceso de validación.
     *
     *  @return CVU_PerfilesDeseablesProdep
     */
    public function listar($optParams = array())
    {
        $params = $optParams;
        return $this->call('listar', array($params), CVU_PerfilesDeseablesProdep::class);
    }
}
class CVU_PerfilesDeseablesProdep extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_PerfilDeseableProdep::class;
    protected $itemsDataType = 'array';
}
class CVU_PerfilDeseableProdep extends TnmApiModelBase
{
    public $id_perfil_deseable;
    public $fecha_inicio;
    public $fecha_fin;
    public $checked;

    public function getId()
    {
        return $this->id_perfil_deseable;
    }
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function isChecked()
    {
        return $this->checked;
    }
}
class CVU_API_Prodep_NivelesCuerpoAcademico extends TnmApiResourceBase
{
    /**
     * @return CVU_NivelesCuerpoAcademicoProdep
     */
    public function listar(array $optParams = array())
    {
        $params = $optParams;
        return $this->call('listar', array($params), CVU_NivelesCuerpoAcademicoProdep::class);
    }
}
class CVU_NivelesCuerpoAcademicoProdep extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_NivelCuerpoAcademicoProdep::class;
    protected $itemsDataType = 'array';
}
class CVU_NivelCuerpoAcademicoProdep extends TnmApiModelBase
{
    public $id_nivel;
    public $nombre;
    public function getId()
    {
        return $this->id_nivel;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
}
class CVU_API_Prodep_CuerposAcademicos extends TnmApiResourceBase
{
    /**
     *  Consulta adscripciones de la persona a TECNM
     *
     *  @param int $id_adscripcion Realiza la consulta de un único programa.
     *  @return CVU_CuerpoAcademicoProdep
     */
    public function consultarPorId($id_cuerpo_academico, array $optParams = array())
    {
        $params = array('id_cuerpo_academico' => $id_cuerpo_academico);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorId', array($params), CVU_CuerpoAcademicoProdep::class);
    }

    /**
     * @return CVU_CuerpoAcademicoProdep
     */
    public function consultarPorClave($clave_ca, array $optParams = array())
    {
        $params = array('clave_ca' => $clave_ca);
        $params = array_merge($params, $optParams);
        return $this->call('consultarPorClave', array($params), CVU_CuerpoAcademicoProdep::class);
    }
    /**
     *  Lista las adscripciones de la persona a TECNM
     *
     *  @param array $optParams Establece filtros para los programas.
     *      - int $id_institucion: Recupera los programas que pertenecen a la institucion especificada.
     *      - int $id_plantel: Recupera los programas que pertenecen al plantel especificado.
     *      - boolean $vigente: (UNICAMENTE SI ESTA DEFINIDO)
     *          - Si es VERDADERO devuelve en la lista una adscripción que es la última vigente registrada.
     *          - Si es FALSO devuelve una lista las adscripciones que no son vigentes.
     *      - boolean $unchecked:
     *          - Si es VERDADERO devolverá incluso aquellas adscripciones que no hayan sido verificadas
     *          por TECNM, es decir, no han pasado un proceso de validación.
     *
     *  @return CVU_CuerposAcademicosProdep
     */
    public function consultar(array $optParams = array())
    {
        // $params = array('id_cuerpo_academico' => $id_cuerpo_academico);
        $params = array_merge($optParams);
        return $this->call('consultar', array($params), CVU_CuerposAcademicosProdep::class);
    }
    public function listar(array $optParams = array())
    {
        return $this->consultar($optParams);
    }
}
class CVU_CuerposAcademicosProdep extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_CuerpoAcademicoProdep::class;
    protected $itemsDataType = 'array';
}
class CVU_CuerpoAcademicoProdep extends TnmApiModelBase
{
    public $id_cuerpo_academico;
    public $clave;
    public $nombre;
    public $institucion;
    public $id_area;
    public $area;
    public $id_nivel;
    public $nivel;
    public $anio_registro;
    public $fecha_registro;
    public $fecha_fin;
    public $checked;

    public function getId()
    {
        return $this->id_cuerpo_academico;
    }
    public function getClave()
    {
        return $this->clave;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getInstitucion()
    {
        return $this->institucion;
    }
    public function getIdArea()
    {
        return $this->id_area;
    }
    public function getArea()
    {
        return $this->area;
    }
    public function getIdNivel()
    {
        return $this->id_nivel;
    }
    public function getNivel()
    {
        return $this->nivel;
    }
    public function getAnioRegistro()
    {
        return $this->anio_registro;
    }
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function isChecked()
    {
        return $this->checked;
    }
}
