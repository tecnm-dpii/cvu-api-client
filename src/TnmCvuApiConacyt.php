<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiConacyt extends TnmApiServiceBase
{
	public $registro;
	public $perfil_deseable;
	public $cuerpos_academicos;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl = $client::API_BASE_PATH;
		$this->servicePath = '/conacyt/';
		$this->serviceName = 'conacyt';

		$this->registro = new CVU_API_Conacyt_Registro(
			$this,
			$this->serviceName,
			'registro',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'registro/',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array()
					),
				)
			)
		);
		$this->sni = new CVU_API_Conacyt_Sni(
			$this,
			$this->serviceName,
			'sni',
			array(
				'methods' =>array(
					'consultar' => array(
						'path'		=> 'sni/{id_registro_sni}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_registro_sni'=> array(
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
					),
					'listar'	=> array(
						'path'		=> 'sni/',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'vigente_en' => array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'cvu_modificado_hasta'	=> array(
								'location'	=> 'query',
								'type'		=> 'date',
								'required'	=> false,
							),
							'unchecked'	=> array(
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
class CVU_API_Conacyt_Registro extends TnmApiResourceBase
{
	/**
	 *	Consulta adscripciones de la persona a TECNM
	 *
	 *	@param int $id_adscripcion Realiza la consulta de un único programa.
	 *
	 *  @return CVU_RegistroConacyt
	 */
	public function consultar()
	{
		$params = array();
		return $this->call('consultar',array($params), CVU_RegistroConacyt::class);
	}
}
class CVU_RegistroConacyt extends TnmApiModelBase
{
	protected $internal_capi_mappings = array(
			'id_area' => 'id_area_conacyt'
		);

	public $id_persona_conacyt;
	public $numero_cvu;
	public $id_area;
	public $area;

	public function getId()
	{
		return $this->id_persona_conacyt;
	}
	public function getNumeroCvu()
	{
		return $this->numero_cvu;
	}
	public function getIdArea()
	{
		return $this->id_area;
	}
	public function getArea()
	{
		return $this->area;
	}
}
class CVU_API_Conacyt_Sni extends TnmApiResourceBase
{
	/**
	 *	Consulta adscripciones de la persona a TECNM
	 *
	 *	@param int $id_adscripcion Realiza la consulta de un único programa.
	 *
	 *  @return CVU_SnisConacyt
	 */
	public function consultar(array $optParams = array())
	{
		$params = $optParams;
		return $this->call('consultar',array($params), CVU_SnisConacyt::class);
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
	 *	@return CVU_SnisConacyt
	 */
	public function listar($optParams = array())
	{
		$params = $optParams;
		return $this->call('listar',array($params), CVU_SnisConacyt::class);
	}
}
class CVU_SnisConacyt extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = CVU_SniConacyt::class;
	protected $itemsDataType = 'array';
}
class CVU_SniConacyt extends TnmApiModelBase
{
	protected $internal_capi_mappings = array(
			'id_nivel' => 'id_nivel_sni'
		);

	public $id_registro_sni;
	public $id_nivel;
	public $nivel;
	public $fecha_inicio;
	public $fecha_fin;
	public $checked;

	public function getId()
	{
		return $this->id_registro_sni;
	}
	public function getIdNivel()
	{
		return $this->id_nivel;
	}
	public function getNivel()
	{
		return $this->nivel;
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