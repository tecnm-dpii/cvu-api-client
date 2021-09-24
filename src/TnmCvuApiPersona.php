<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmCvuApiPersona extends TnmApiServiceBase
{
	const INFORMACION_BASICA = 'get_personal_info';

	private $client;

	public $datos_personales;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl		= $client::API_BASE_PATH;
		$this->servicePath	= '/personas/';
		$this->serviceName	= 'persona';

		$this->datos_personales = new CVU_API_Datos_Personales(
			$this,
			$this->serviceName,
			'datos_personales',
			array(
				'methods' => array(
					'consultar' => array(
						'path'		=> 'datos_personales/{cvu_tecnm}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::OWNER_ACCESS,
						'parameters'=> array(
							'cvu_tecnm'	=> array(
								'location'	=> 'path',
								'type'		=> 'string',
							),
						),
					),
				),
			)
		);
	}
}
class CVU_API_Datos_Personales extends TnmApiResourceBase
{
	/**
	 * @return CVU_Datos_Personales
	 */
	public function consultar($optParams = array())
	{
		$params = $optParams;
		return $this->call('consultar',array($params),CVU_Datos_Personales::class);
	}
}
class CVU_Datos_Personales extends TnmApiModelBase
{
	public $cvu_tecnm;
	public $nombres;
	public $ape_paterno;
	public $ape_materno;
	public $curp;
	public $rfc;
	public $fecha_nacimiento;
}