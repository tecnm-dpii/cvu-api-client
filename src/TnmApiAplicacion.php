<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmApiAplicacion extends TnmApiServiceBase
{
	public $mensajes;
	public $usuarios;

	public function __construct(TnmApiClient $client)
	{
		parent::__construct($client);
		$this->rootUrl = $client::API_BASE_PATH;
		$this->servicePath = '/aplicacion/';
		$this->serviceName = 'aplicacion';

		$this->usuarios = new CVU_API_Aplicacion_Usuarios(
			$this,
			$this->serviceName,
			'usuarios',
			array(
				'methods'=> array(
					'buscar' => array(
						'path'		=>  'usuarios/{cvu_tecnm}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters'=> array(
							'cvu_tecnm'	=> array(
								'location'	=> 'path',
								'type'		=> 'string',
								'required'	=> true
							)
						)
					)
				)
			)
		);
		$this->mensajes = new CVU_API_Aplicacion_Mensajes(
			$this,
			$this->serviceName,
			'mensajes',
			array(
				'methods' => array(
					'enviar' => array(
						'path'		=> 'mensajes/',
						'httpMethod'=> 'POST',
						'grant_lvl'	=> TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters'=> array(
							'cvu_tecnm'	=> array(
								'location'	=>'body',
								'type'		=>'string',
								'required'	=> true
							),
							'with_email'=> array(
								'location'	=> 'query',
								'type'		=> 'boolean',
								'required'	=> false
							)
						),
					),
					'consultar'	=> array(
						'path'		=> 'mensajes/{id_mensaje}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters'=> array(
							'id_mensaje'=> array(
								'location'	=> 'path',
								'type'		=> 'string',
								'required'	=> true,
							),
						),
					),
					'listar'	=> array(
						'path'		=> 'mensajes/{cvu_tecnm}',
						'httpMethod'=> 'GET',
						'grant_lvl'	=> TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters'=> array(
							'cvu_tecnm'	=> array(
								'location'	=> 'path',
								'type'		=> 'string',
								'required'	=> false
							),
						),
					),
				)
			)
		);
		$this->correos = new CVU_API_Aplicacion_Correos (
			$this,
			$this->serviceName,
			'correos',
			array(
				'methods' => array(
					'enviar' => array(
						'path'	=> 'correos',
						'httpMethod' => 'POST',
						'grant_lvl' => TnmApiClient::CLIENT_CONFIDENTIAL,
						'parameters' => array(
							'cvu_tecnm' => array(
								'location'	=> 'body',
								'type'		=> 'string',
								'required'	=> true
							),
							'subject' => array(
								'location'	=> 'body',
								'type'		=> 'string',
								'required'	=> true
							),
							'content' => array(
								'location'	=> 'body',
								'type'		=> 'string',
								'required'	=> true
							)
						)
					)
				)
			)
		);
	}
}
class CVU_API_Aplicacion_Usuarios extends TnmApiResourceBase
{
	public function buscar($cvu_tecnm, $optParams = array())
	{
		$params = array('cvu_tecnm' => $cvu_tecnm);
		$params = array_merge($params, $optParams);
		return $this->call('buscar',array($params),'CVU_Usuario');
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
class CVU_API_Aplicacion_Mensajes extends TnmApiResourceBase
{
	public function listar($cvu_tecnm, $id, $optParams = array())
	{
		$params = array('cvu_tecnm' => $cvu_tecnm);
		$params = array_merge($params, $optParams);
		return $this->call('listar',array($params));
	}
	/**
	 *	Crea un nuevo mensaje para usuario de CVU.
	 *
	 *	@param string $cvu_tecnm La clave de CVU del usuario. El valor especial
	 *	"yo" puede utilizarse para referirse al usuario autenticado.
	 *	@param Mensaje $mensaje El contenido del mensaje que se desea enviar al
	 *	usuario de CVU.
	 */
	public function enviar($cvu_tecnm, CVU_Mensaje_Aplicacion $mensaje, $optParams = array())
	{
		$params = array('cvu_tecnm' => $cvu_tecnm, 'postBody' => $mensaje);
		$params = array_merge($params, $optParams);
		return $this->call('enviar',array($params),'CVU_Mensaje_Aplicacion');
	}
	/**
	 *	Crea un nuevo mensaje para usuario de CVU.
	 *
	 *	@param string $id El ID generado por la base de datos para acceder al
	 *	mensaje.
	 */
	public function consultar($id, $optParams = array())
	{
		$params = array('id_mensaje' => $id);
		$params = array_merge($params, $optParams);
		return $this->call('consultar',array($params),'CVU_Mensaje_Aplicacion');
	}
}
class CVU_Mensaje_Aplicacion extends TnmApiModelBase
{
	protected $internal_capi_mappings = array(
			'id'	=> 'message_id',
			'asunto'=> 'subject',
			'cuerpo'=> 'body',
		);
	public $id;
	public $asunto;
	public $cuerpo;
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setAsunto($asunto)
	{
		$this->asunto = $asunto;
		return $this;
	}
	public function getAsunto()
	{
		return $this->asunto;
	}
	public function setCuerpo($cuerpo)
	{
		$this->cuerpo = $cuerpo;
		return $this;
	}
	public function getCuerpo()
	{
		return $this->cuerpo;
	}
}

class CVU_API_Aplicacion_Correos extends TnmApiResourceBase
{
	public function enviar($cvu_tecnm, $asunto, $contenido, $optParams = array())
	{
		$params = array(
			'cvu_tecnm' => $cvu_tecnm,
			'body' => $contenido,
			'subject' => $asunto
		);
		$params = array_merge($params, $optParams);
		return $this->call('enviar',array($params),null);
	}
}