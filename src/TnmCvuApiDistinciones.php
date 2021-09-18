<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiDistinciones extends TnmApiServiceBase
{
	public $certificaciones;
	public $colegios;
	public $estimulo_desempeno_docente;
	public $premios;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl = $client::API_BASE_PATH;
		$this->servicePath = '/distinciones/';
		$this->serviceName = 'distinciones';

		$this->certificaciones = new CVU_API_Distinciones_Certificaciones(
			$this,
			$this->serviceName,
			'certificaciones',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'certificaciones/{id_certificacion}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_certificacion'	=> array(
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
		$this->colegios = new CVU_API_Distinciones_Colegios(
			$this,
			$this->serviceName,
			'colegios',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'colegios/{id_colegio}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_colegio'	=> array(
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
		$this->estimulo_desempeno_docente = new CVU_API_Distinciones_EDD(
			$this,
			$this->serviceName,
			'estimulo_desempeno_docente',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'estimulo_desempeno_docente/{id_edd}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_edd'	=> array(
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
		$this->premios = new CVU_API_Premios(
			$this,
			$this->serviceName,
			'premios',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'premios/{id_premio}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_premio'	=> array(
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
	}
}
class CVU_API_Distinciones_Certificaciones extends TnmApiResourceBase
{
	public function consultar(array $optParams = array())
	{
		$params = array();
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params), 'CVU_Certificaciones');
	}
}
class CVU_Certificaciones extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_Certificacion';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_certificacion';
}
class CVU_Certificacion extends TnmApiModelBase
{
	public $id_certificacion;
	public $institucion;
	public $descripcion;
	public $fecha;
	public $fecha_limite;
}
class CVU_API_Distinciones_Colegios extends TnmApiResourceBase
{
	public function consultar(array $optParams = array())
	{
		$params = array();
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params), 'CVU_Colegios');
	}
}
class CVU_Colegios extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_Colegio';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_colegio';
}
class CVU_Colegio extends TnmApiModelBase
{
	public $id_colegio;
	public $colegio;
	public $fecha_afiliacion;
	public $nombramiento;
}
class CVU_API_Distinciones_EDD extends TnmApiResourceBase
{
	public function consultar(array $optParams = array())
	{
		$params = array();
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params), 'CVU_EDDs');
	}
}
class CVU_EDDs extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_EDD';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_edd';
}
class CVU_EDD extends TnmApiModelBase
{
	public $id_edd;
	public $anio;
	public $nivel;
}
class CVU_API_Premios extends TnmApiResourceBase
{
	public function consultar(array $optParams = array())
	{
		$params = array();
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params), 'CVU_Premios');
	}
}
class CVU_Premios extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = 'CVU_Premio';
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_premio';
}
class CVU_Premio extends TnmApiModelBase
{
	public $id_premio;
	public $descripcion;
	public $fecha;
	public $motivo;
	public $institucion;
}