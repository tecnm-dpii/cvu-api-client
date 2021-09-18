<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmApiAcademica extends TnmApiServiceBase
{
	public $programas;
	public $lgacs;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl = $client::API_BASE_PATH;
		$this->servicePath = '/academica/';
		$this->serviceName = 'academica';

		$this->programas = new CVU_API_Academica_Programas(
			$this,
			$this->serviceName,
			'programas',
			array(
				'methods' => array(
					'consultarPorId'	=> array(
						'path'		=> 'programas/{id_programa}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_BASIC,
						'parameters'=> array(
							'id_programa'	=> array(
								'location'	=> 'path',
								'type'		=> 'number',
								'required'	=> true,
							)
						)
					),
					'consultar'	=> array(
						'path'		=> 'programas/',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_BASIC,
						'parameters'=> array(
							'id_grado'		=> array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false,
							),
							'grados'		=> array(
								'location'	=> 'query',
								'type'		=> 'array',
								'required'	=> false,
							),
							'grado'			=> array(
								'location'	=> 'query',
								'type'		=> 'string',
								'required'	=> false,
							),
							'posgrado'		=> array(
								'location'	=> 'query',
								'type'		=> 'boolean',
								'required'	=> false,
							),
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
							'key-index'		=> array(
								'location'	=> 'none',
								'type'		=> 'boolean',
								'required'	=> false,
							)
						)
					)
				)
			)
		);
		$this->lgacs = new CVU_API_Academica_LGACs(
			$this,
			$this->serviceName,
			'lgacs',
			array(
				'methods' => array(
					'consultarPorId'	=> array(
						'path'		=> 'lgacs/{id_lgac}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_BASIC,
						'parameters'=> array(
							'id_lgac'	=> array(
								'location'	=> 'path',
								'type'		=> 'string',
								'required'	=> true
							)
						)
					),
					'consultar'	=> array(
						'path'		=> '/lgacs/',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_BASIC,
						'parameters'=> array(
							'registrada_desde' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'registrada_hasta' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'vence_desde' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'vence_hasta' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'vigente_en' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'vigente_renovacion_en' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'id_institucion' => array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false,
							),
							'id_plantel'	=> array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false,
							),
							'id_programa'	=> array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false,
							),
							'key-index'		=> array(
								'location'	=> 'none',
								'type'		=> 'boolean',
								'required'	=> false,
							)
						)
					)
				)
			)
		);
		$this->lgacs2 = new CVU_API_Academica_LGACs_v2(
			$this,
			$this->serviceName,
			'lgacs2',
			array(
				'methods' => array(
					'consultarPorId' => array(
						'path'	=> 'lgacs2/{id_lgac}',
						'httpMethod' => 'GET',
						'grant_lvl' => TnmApiClient::CLIENT_BASIC,
						'parameters' => array(
							'id_lgac' => array(
								'location' => 'path',
								'type'	=> 'string',
								'required' => true
							)
						)
					),
					'consultar' => array(
						'path'	=> '/lgacs2/',
						'httpMethod' => 'GET',
						'grant_lvl' => TnmApiClient::CLIENT_BASIC,
						'parameters' => array(
							'vence_desde' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false
							),
							'vence_hasta' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false
							),
							'vigente_en' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'id_plantel' => array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false
							),
							'id_programa' => array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false
							),
							'id_grado' => array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false
							),
							'grado' => array(
								'location'	=> 'query',
								'type'		=> 'number',
								'required'	=> false
							),
							'posgrado' => array(
								'location'	=> 'query',
								'type'		=> 'boolean',
								'required'	=> false
							),
							'key-index'		=> array(
								'location'	=> 'none',
								'type'		=> 'boolean',
								'required'	=> false,
							)
						)
					),
					'colocar' => array(
						'path'	=> 'lgacs2/{id_lgac}',
						'httpMethod' => 'PUT',
						'grant_lvl' => TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters' => array(
							'id_lgac' => array(
								'location'	=> 'path',
								'type'		=> 'number',
								'required'	=> true
							),
							'id_plantel' => array(
								'location'	=> 'body',
								'type'		=> 'number',
								'required'	=> true
							),
							'id_programa' => array(
								'location'	=> 'body',
								'type'		=> 'number',
								'required'	=> true
							),
							'id_cat_lgac' => array(
								'location'	=> 'body',
								'type'		=> 'number',
								'required'	=> true
							),
							'clave' => array(
								'location'	=> 'body',
								'type'		=> 'string',
								'required'	=> false
							),
							'nombre' => array(
								'location'	=> 'body',
								'type'		=> 'string',
								'required'	=> true
							),
							'inicio_vigencia' => array(
								'location'	=> 'body',
								'type'		=> 'date',
								'required'	=> true
							),
							'fin_vigencia' => array(
								'location'	=> 'body',
								'type'		=> 'date',
								'required'	=> false
							),
							'create_time' => array(
								'location'	=> 'body',
								'type'		=> 'date',
								'required'	=> true
							),
							'update_time' => array(
								'location'	=> 'body',
								'type'		=> 'date',
								'required'	=> true
							),
						)
					)
				)
			)
		);
	}
}
class CVU_API_Academica_Programas extends TnmApiResourceBase
{
	/**
	 *	Consulta programas registrados en TECNM
	 *
	 *	@param int $id_programa Realiza la consulta de un único programa.
	 */
	public function consultarPorId($id_programa)
	{
		$params = array('id_programa' => $id_programa);
		return $this->call('consultarPorId',array($params),'CVU_Programa');
	}
	/**
	 *	Lista los programas registrados en TECNM
	 *
	 *	@param array $optParams Establece filtros para los programas.
	 *		- int $id_grado: Recupera los programas que contienen ese grado.
	 *		- string $grado: Recupera los programas de dicho grado (Licenciatura, Maestría, Doctorado, etc.)
	 *		- array $grados: Recupera los programas de los grados especificados en un arreglo de cadenas.
	 *		- int $id_institucion: Recupera los programas que pertenecen a la institucion especificada.
	 *		- int $id_plantel: Recupera los programas que pertenecen al plantel especificado.
	 *		- boolean $posgrado: (ÚNICAMENTE CUANDO SE DEFINE)
	 *			Si es VERDADERO recupera únicamente programas de posgrado.
	 *			Si es FALSO recupera únicamente programas de Licenciatura.
	 */
	public function consultar($optParams = array())
	{
		if (isset($optParams['grados'])) {
			$optParams['grados'] = implode(' ',$optParams['grados']);
		}
		$params = $optParams;
		$collection = $this->call('consultar',array($params),'CVU_Programas');
		if (isset($optParams['key-index']) && $optParams['key-index']) {
			$collection->setKeyAsIndex();
		}
		return $collection;
	}
	public function listar($optParams = array())
	{
		return $this->consultar($optParams);
	}
}
class CVU_Programas extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_Programa';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_programa';
}
class CVU_Programa extends TnmApiModelBase
{
	public $id_programa;
	public $nombre;
	public $id_grado;
	public $grado;
	public $posgrado;
	
	public function getId()
	{
		return $this->id_programa;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getIdGrado()
	{
		return $this->id_grado;
	}
	public function getGrado()
	{
		return $this->grado;
	}
}
class CVU_API_Academica_LGACs extends TnmApiResourceBase
{
	/**
	 *	Consulta una línea registrada en TECNM
	 *
	 *	@param int $id_lgac Realiza la consulta de una única línea.
	 */
	public function consultarPorId($id_lgac)
	{
		$params = array('id_lgac' => $id_lgac);
		return $this->call('consultarPorId',array($params),'CVU_LGAC');
	}
	/**
	 *	Consulta el listado de líneas registradas en TECNM.
	 *
	 *	@param array $optParams Establece filtros para consultar las líneas.
	 *		- date $registrada_desde: Filtra las líneas a únicamente aquellas
	 *			registradas a partir de la fecha especificada.
	 *		- date $registrada_hasta: Filtra las líneas a únicamente aquellas
	 *			registradas hasta la fecha especificada.
	 *		- date $vence_desde: Filtra las líneas a únicamente aquellas que
	 *			vencen a partir de la fecha especificada.
	 *		- date $vence_hasta: Filtra las líneas a únicamente aquellas que
	 *			vencen hasta la fecha especificada.
	 *		- date $vigente_en: Filtra las líneas a únicamente aquellas que se
	 *			encuentran vigentes en la fecha especificada.
	 *		- int $id_institucion: Filtra las líneas a únicamente aquellas
	 *			registradas en la institucion con id especificado.
	 *		- int $id_plantel: Filtra las líneas a únicamente aquellas
	 *			registradas en el plantel con id especificado.
	 *		- int $id_programa: Filtra las líneas a únicamente aquellas
	 *			registradas en el programa con id especificado.
	 */
	public function consultar($optParams = array())
	{
		$params = $optParams;
		$collection = $this->call('consultar',array($params),'CVU_LGACs');
		if (isset($params['key-index']) && $params['key-index']) {
			$collection->setKeyAsIndex();
		}
		return $collection;
	}
	public function listar($optParams = array())
	{
		return $this->consultar($optParams);
	}
}
class CVU_LGACs extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_LGAC';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_lgac';
}
class CVU_LGAC extends TnmApiCollectionBase
{

	public function getId()
	{
		return $this->id_lgac;
	}
	public function getClave()
	{
		return $this->clave_registro;
	}
	public function getClaveRegistro()
	{
		return $this->clave_registro;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getIdInstitucion()
	{
		return $this->id_institucion;
	}
	public function getInstitucion()
	{
		return $this->institucion;
	}
	public function getFechaRegistro()
	{
		return $this->fecha_registro;
	}
	public function getFechaVencimiento()
	{
		return $this->fin_vigencia;
	}
	public function getInicioVigencia()
	{
		return $this->inicio_vigencia;
	}
	public function getFinVigencia()
	{
		return $this->fin_vigencia;
	}
}

class CVU_API_Academica_LGACs_v2 extends TnmApiResourceBase
{
	public function consultarPorId($id_lgac)
	{
		$params = array('id_lgac' => $id_lgac);
		return $this->call('consultarPorId',array($params),'CVU_LGAC_v2');
	}
	public function consultar($optParams = array())
	{
		$params = $optParams;
		$collection = $this->call('consultar',array($params),'CVU_LGACs_v2');
		if (isset($params['key-index']) && $params['key-index']) {
			$collection->setKeyAsIndex();
		}
		return $collection;
	}
	public function listar($optParams = array())
	{
		return $this->consultar($optParams);
	}
	public function colocar($id_lgac, $campos, $optParams = array())
	{
		$params = array_merge($optParams, $campos, ['id_lgac'=>$id_lgac]);
		$this->call('colocar', array($params), 'stdClass');
		return;
	}
}
class CVU_LGACs_v2 extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_LGAC_v2';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_lgac';
}
class CVU_LGAC_v2 extends TnmApiCollectionBase
{
}