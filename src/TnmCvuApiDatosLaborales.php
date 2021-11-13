<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiDatosLaborales extends TnmApiServiceBase
{
    public $adscripciones;
    public $plazas;

    public function __construct(TnmApiClient $client)
    {
        parent::__construct($client);
        $this->rootUrl = $client::API_BASE_PATH;
        $this->servicePath = '/datos_laborales/';
        $this->serviceName = 'datos_laborales';

        $this->adscripciones = new CVU_API_DatosLaborales_Adscripciones(
            $this,
            $this->serviceName,
            'adscripciones',
            array(
                'methods' => array(
                    'consultarPorId'	=> array(
                        'path'		=> 'adscripciones/{id_adscripcion}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_adscripcion'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true,
                            )
                        )
                    ),
                    'consultar'	=> array(
                        'path'		=> 'adscripciones/',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_institucion'=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'id_plantel'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'vigente'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'unchecked'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            )
                        )
                    ),
                    'listar'	=> array(
                        'path'		=> 'adscripciones/',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_institucion'=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'id_plantel'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'number',
                                'required'	=> false,
                            ),
                            'vigente'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'unchecked'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            )
                        )
                    )
                )
            )
        );
        $this->plazas = new CVU_API_DatosLaborales_Plazas(
            $this,
            $this->serviceName,
            'plazas',
            array(
                'methods'=> array(
                    'consultarPorId'	=> array(
                        'path'		=> 'plazas/{id_persona_plaza}',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'id_persona_plaza'	=> array(
                                'location'	=> 'path',
                                'type'		=> 'number',
                                'required'	=> true,
                            )
                        )
                    ),
                    'listar'	=> array(
                        'path'		=> 'plazas/',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'adscripcion'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'asignado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'asignado_hasta'=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'ptc'			=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'vigente'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'clave_movimiento'=> array(
                                'location'	=> 'query',
                                'type'		=> ['number','array'],
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta'=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            )
                        )
                    ),
                    'consultar'	=> array(
                        'path'		=> 'plazas/',
                        'httpMethod'=> 'GET',
                        'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
                        'parameters'=> array(
                            'adscripcion'	=> array(
                                'location'	=> 'query',
                                'type'		=> 'string',
                                'required'	=> false,
                            ),
                            'asignado_desde' => array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'asignado_hasta'=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'ptc'			=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'vigente'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            ),
                            'clave_movimiento'=> array(
                                'location'	=> 'query',
                                'type'		=> ['number','array'],
                                'required'	=> false,
                            ),
                            'cvu_modificado_hasta'=> array(
                                'location'	=> 'query',
                                'type'		=> 'date',
                                'required'	=> false,
                            ),
                            'unchecked'		=> array(
                                'location'	=> 'query',
                                'type'		=> 'boolean',
                                'required'	=> false,
                            )
                        )
                    )
                )
            )
        );
    }
}
class CVU_API_DatosLaborales_Adscripciones extends TnmApiResourceBase
{
    /**
     *	Consulta adscripciones de la persona a TECNM
     *
     *	@param int $id_adscripcion Realiza la consulta de una adscripción.
     *  @return CVU_Adscripcion
     */
    public function consultarPorId($id_adscripcion)
    {
        $params = array('id_adscripcion' => $id_adscripcion);
        return $this->call('consultar',array($params), CVU_Adscripcion::class);
    }
    /**
     *	Lista las adscripciones de la persona a TECNM
     *
     *	@param array $optParams Establece filtros para los programas.
     *		- int $id_institucion: Recupera los programas que pertenecen a la institucion especificada.
     *		- int $id_plantel: Recupera los programas que pertenecen al plantel especificado.
     *		- boolean $vigente: (UNICAMENTE SI ESTA DEFINIDO)
     *			- Si es VERDADERO devuelve en la lista una adscripción que es la última vigente registrada.
     *			- Si es FALSO devuelve una lista las adscripciones que no son vigentes.
     *		- boolean $unchecked:
     *			- Si es VERDADERO devolverá incluso aquellas adscripciones que no hayan sido verificadas
     *			por TECNM, es decir, no han pasado un proceso de validación.
     *
     *  @return CVU_Adscripciones
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        return $this->call('listar',array($params), CVU_Adscripciones::class);
    }

    /**
     * @return CVU_Adscripciones
     */
    public function listar($optParams = array())
    {
        $params = $optParams;
        return $this->call('listar',array($params), CVU_Adscripciones::class);
    }
}
class CVU_Adscripciones extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Adscripcion::class;
    protected $itemsDataType = 'array';
}
class CVU_Adscripcion extends TnmApiModelBase
{
    public $id_adscripcion;
    public $id_plantel;
    public $plantel;
    public $fecha_adscripcion;
    public $vigente;
    
    public function getId()
    {
        return $this->id_adscripcion;
    }
    public function getIdPlantel()
    {
        return $this->id_plantel;
    }
    public function getPlantel()
    {
        return $this->plantel;
    }
    public function getFechaAdscripcion()
    {
        return $this->fecha_adscripcion;
    }
    public function esVigente()
    {
        return $this->vigente;
    }
}
class CVU_API_DatosLaborales_Plazas extends TnmApiResourceBase
{
    /**
     *	Consulta adscripciones de la persona a TECNM
     *
     *	@param int $id_persona_plaza Realiza la consulta de un único programa.
     *	@return CVU_Plaza
     */
    public function consultarPorId($id_persona_plaza)
    {
        $params = array('id_persona_plaza' => $id_persona_plaza);
        return $this->call('consultar',array($params), CVU_Plaza::class);
    }
    /**
     *	Lista las adscripciones de la persona a TECNM
     *
     *	@param array $optParams Establece filtros para los programas.
     *		- int $id_institucion: Recupera los programas que pertenecen a la institucion especificada.
     *		- int $id_plantel: Recupera los programas que pertenecen al plantel especificado.
     *		- boolean $vigente: (UNICAMENTE SI ESTA DEFINIDO)
     *			- Si es VERDADERO devuelve en la lista una adscripción que es la última vigente registrada.
     *			- Si es FALSO devuelve una lista las adscripciones que no son vigentes.
     *		- boolean $unchecked:
     *			- Si es VERDADERO devolverá incluso aquellas adscripciones que no hayan sido verificadas
     *			por TECNM, es decir, no han pasado un proceso de validación.
     *
     *	@return CVU_Plazas
     */
    public function consultar($optParams = array())
    {
        $params = $optParams;
        return $this->call('listar',array($params), CVU_Plazas::class);
    }

    /**
     * @return CVU_Plazas
     */
    public function listar($optParams = array())
    {
        $params = $optParams;
        return $this->call('listar',array($params), CVU_Plazas::class);
    }
}
class CVU_Plazas extends TnmApiCollectionBase
{
    protected $collection_key = 'items';
    protected $itemsType = CVU_Plaza::class;
    protected $itemsDataType = 'array';
}
class CVU_Plaza extends TnmApiCollectionBase
{
    public $id_persona_plaza;
    public $clave_categoria;
    public $categoria;
    public $horas;
    public $clave_presupuestal;
    public $fecha_asignacion;
    public $checked;

    public function getId()
    {
        return $this->id_persona_plaza;
    }
    public function getClaveCategoria()
    {
        return $this->clave_categoria;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getNoHoras()
    {
        return $this->no_horas;
    }
    public function getClavePresupuestal()
    {
        return $this->clave_presupuestal;
    }
    public function getFechaAsignacion()
    {
        return $this->fecha_asignacion;
    }
    public function esPTC()
    {
        if ($this->horas >= 40) {
            return true;
        }
        return false;
    }
    public function isChecked()
    {
        return $this->checked;
    }
}
