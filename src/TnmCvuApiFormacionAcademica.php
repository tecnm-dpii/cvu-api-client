<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiFormacionAcademica extends TnmApiServiceBase
{
	public $estudios;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl = $client::API_BASE_PATH;
		$this->servicePath = '/formacion_academica/';
		$this->serviceName = 'formacion_academica';

		$this->estudios = new CVU_API_FormacionAcademica_Estudios(
			$this,
			$this->serviceName,
			'estudios',
			array(
				'methods' => array(
					'consultar'	=> array(
						'path'		=> 'estudios/{id_estudio}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'id_estudio' => array(
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
class CVU_API_FormacionAcademica_Estudios extends TnmApiResourceBase
{
	/**
	 * @return CVU_Estudios
	 */
	public function consultar(array $optParams = array())
	{
		$params = array();
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params), CVU_Estudios::class);
	}
}
class CVU_Estudios extends TnmApiCollectionBase
{
	protected $collection_key = 'items';
	protected $itemsType = CVU_Estudio::class;
	protected $itemsDataType = 'array';
	protected $itemsKeyName = 'id_estudio';
}
class CVU_Estudio extends TnmApiModelBase
{
	public $id_estudio;
	public $id_pais;
	public $pais;
	public $id_grado;
	public $grado;
	public $id_sector;
	public $sector;
	public $cedula;
	public $titulo;
	public $institucion_egreso;
	public $institucion_grado;
	public $fecha_grado;
	public $promedio;
	public $matricula;
	public $fecha_inicio_creditos;
	public $fecha_fin_creditos;
	public $es_beca_comision;
}