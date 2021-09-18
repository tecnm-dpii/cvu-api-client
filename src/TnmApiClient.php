<?php

namespace TecNM_DPII\CVU_API_Client;

class TnmApiClient
{
	const USER_AGENT_SUFFIX = 'tnm-api-php-client';
	// const OAUTH2_REVOKE_URI = 'https://betas.acad-tecnm.mx/cvu/oauth2/revoke';
	// const OAUTH2_TOKEN_URI	= 'https://betas.acad-tecnm.mx/cvu/oauth2/token';
	// const OAUTH2_AUTH_URL	= 'https://betas.acad-tecnm.mx/cvu/oauth2';
	// const API_BASE_PATH		= 'https://betas.acad-tecnm.mx/cvu_api_v2';

	// const OAUTH2_REVOKE_URI = 'https://cvu.acad-tecnm.mx/oauth2/revoke';
	// const OAUTH2_TOKEN_URI	= 'https://cvu.acad-tecnm.mx/oauth2/token';
	// const OAUTH2_AUTH_URL	= 'https://cvu.acad-tecnm.mx/oauth2';
	// const API_BASE_PATH		= 'https://api.cvu.acad-tecnm.mx';

	const OAUTH2_REVOKE_URI = 'https://cvu.dpii.tecnm.mx/index.php/oauth2/revoke';
	const OAUTH2_TOKEN_URI	= 'https://cvu.dpii.tecnm.mx/index.php/oauth2/token';
	const OAUTH2_AUTH_URL	= 'https://cvu.dpii.tecnm.mx/index.php/oauth2';
	const API_BASE_PATH		= 'https://cvu.dpii.tecnm.mx/api/index.php';
	// const API_BASE_PATH		= 'https://api.cvu.dpii.tecnm.mx';

	// const OAUTH2_REVOKE_URI	= 'http://localhost/tecnm/cvu/oauth2/revoke/';
	// const OAUTH2_TOKEN_URI	= 'http://localhost/tecnm/cvu/oauth2/token/';
	// const OAUTH2_AUTH_URL	= 'http://localhost/tecnm/cvu/oauth2/';
	// const API_BASE_PATH		= 'http://localhost/tecnm/cvu_api_v2';

	const CLIENT_BASIC			= 'ClientID';
	const CLIENT_CONFIDENTIAL	= 'Client Confidential';
	const OWNER_ACCESS			= 'Owner Access';

	private $config;

	private $token;
	private $requestedScopes;
	private $api_instances = array();

	private $refresh_token_callbacks = array();

	public function __construct($config = array())
	{
		$this->requestedScopes = array();
		$this->config = array(
			'application_name'	=> '',
			'base_path'	=> self::API_BASE_PATH,
			// https://cvu.api.acad-tecnm.mx/developer
			'client_id' => '',
			'client_secret' => '',
			'redirect_uri'	=> null,
			'state'			=> null,
			// More OAuth2 parameters.
			'access_type'	=> 'online'
		);
		if (is_string($config)) {
			$this->setAuthConfig($config);
		} elseif(is_array($config)) {
			$this->config = array_merge($this->config, $config);
		}
	}
	public function __get($name)
	{
		switch($name) {
			case 'cvu':
				return $this->getApiInstance('TnmCvuApiHub');
			case 'academica':
				return $this->getApiInstance('TnmApiAcademica');
			case 'catalogos':
				return $this->getApiInstance('TnmApiCatalogos');
			case 'aplicacion':
				return $this->getApiInstance('TnmApiAplicacion');
			default:
				trigger_error("No existe servicio para {$name}");
		}
	}
	private function getApiInstance($api_name)
	{
		if (isset($this->api_instances[$api_name])) {
			return $this->api_instances[$api_name];
		} else {
			return ($this->api_instances[$api_name] = new $api_name($this));
		}
	}
	public function setAuthConfig($config)
	{
		if (is_string($config)) {
			if (!file_exists($config)) {
				throw new \Exception("El archivo de configuración de la API de TecNM no existe en la ruta '{$config}'.");
			}
			$json = file_get_contents($config);

			if (!$config = json_decode($json, true)) {
				throw new \Exception("El JSON proporcionado para configuración de la API de TecNM no es válido.");
			}
		}
		$this->config = array_merge($this->config, $config);
		// $this->setClientId($config['client_id']);
		// $this->setClientSecret($config['client_secret']);
		// if (isset($config['redirect_uri'])) {
		// 	$this->setRedirectUri($config['redirect_uri']);
		// }
		return $this;
	}
	public function setAuthConfigFile($config)
	{
		return $this->setAuthConfig($config);
	}
	public function addScope($scope_or_scopes)
	{
		if (is_string($scope_or_scopes) && !in_array($scope_or_scopes, $this->requestedScopes)) {
			$this->requestedScopes[] = $scope_or_scopes;
		} else if (is_array($scope_or_scopes)) {
			foreach ($scope_or_scopes as $scope) {
				$this->addScope($scope);
			}
		}
		return $this;
	}
	public function getScopes()
	{
		return $this->requestedScopes;
	}
	public function prepareScopes()
	{
		if (empty($this->requestedScopes)) {
			return null;
		}
		$scopes = implode(' ', $this->requestedScopes);
		return $scopes;
	}
	public function setConfig($name, $value)
	{
		$this->config[$name] = $value;
	}
	public function getConfig($name, $default = null)
	{
		return isset($this->config[$name]) ? $this->config[$name] : $default;
	}
	public function setClientId($clientId)
	{
		$this->config['client_id'] = $clientId;
		return $this;
	}
	public function getClientId()
	{
		return $this->config['client_id'];
	}
	public function setClientSecret($clientSecret)
	{
		$this->config['client_secret'] = $clientSecret;
	}
	public function getClientSecret()
	{
		return $this->config['client_secret'];
	}
	public function setRedirectUri($redirectUri)
	{
		$this->config['redirect_uri'] = $redirectUri;
		return $this;
	}
	public function getRedirectUri()
	{
		return $this->config['redirect_uri'];
	}
	public function setState($state)
	{
		$this->config['state'] = $state;
		return $this;
	}
	public function getState()
	{
		return $this->config['state'];
	}
	public function setAccessType($access_type)
	{
		return $this;
	}
	public function createAuthUrl()
	{
		$authUrl = self::OAUTH2_AUTH_URL;
		$parameters['client_id'] = $this->getClientId();
		$parameters['response_type'] = 'code';
		if ($redirect_uri = $this->getRedirectUri()) {
			$parameters['redirect_uri'] = $redirect_uri;
		}
		if ($scopes = $this->prepareScopes()) {
			$parameters['scope'] = $scopes;
		}
		if ($state = $this->getState()) {
			$parameters['state'] = $state;
		}
		$authUrl = $authUrl . '?' . http_build_query($parameters);

		return $authUrl;
	}
	public function authenticate($code)
	{
		$this->token = $this->fetchAccessTokenWithAuthCode($code);
		return $this->token;
	}
	public function fetchAccessTokenWithAuthCode($code)
	{
		if (strlen($code) == 0) {
			throw new \Exception("Invalid code");
		}
		$request = new HttpRequestHelper(self::OAUTH2_TOKEN_URI);
		$request->setMethod(HttpRequestHelper::METHOD_POST);
		$request->setBodyVar('client_id',$this->getClientId());
		$request->setBodyVar('client_secret',$this->getClientSecret());
		$request->setBodyVar('redirect_uri',$this->getRedirectUri());
		$request->setBodyVar('grant_type','authorization_code');
		$request->setBodyVar('code',$code);
		$creds = $this->fetchAuthToken($request);
		return $creds;
	}
	public function refreshToken($refreshToken)
	{
		return $this->fetchAccessTokenWithRefreshToken($refreshToken);
	}
	public function fetchAccessTokenWithRefreshToken($refreshToken = null)
	{
		if (is_null($refreshToken)) {
			if (!isset($this->token['refresh_token'])) {
				throw new \Exception("El Refresh Token debe ser argumento o ser parte del AccessToken");
			}
			$refreshToken = $this->token['refreshToken'];
		}
		$request = new HttpRequestHelper(self::OAUTH2_TOKEN_URI);
		$request->setMethod(HttpRequestHelper::METHOD_POST);
		$request->setBodyVar('grant_type','refresh_token');
		$request->setBodyVar('client_id',$this->getClientId());
		$request->setBodyVar('client_secret',$this->getClientSecret());
		$request->setBodyVar('redirect_uri',$this->getRedirectUri());
		$request->setBodyVar('refresh_token',$refreshToken);
		$creds = $this->fetchAuthToken($request);
		$creds['refresh_token'] = $refreshToken;

		return $creds;
	}
	public function getOAuth2Service()
	{
		if (!isset($this->auth)) {
			$this->auth = $this->createOAuth2Service();
		}
		return $this->auth;
	}
	public function createOAuth2Service()
	{
		$auth = new OAuth2(
			[
				'clientId'			=> $this->getClientId(),
				'clientSecret'		=> $this->getClientSecret(),
				'authorizationUrl'	=> self::OAUTH2_AUTH_URL,
				'tokenCredentialUri'=> self::OAUTH2_TOKEN_URI,
				'redirectUri'		=> $this->getRedirectUri(),
				'issuer'			=> $this->config['client_id']
			]
		);
		return $auth;
	}
	public function setAccessToken($token)
	{
		if (is_string($token)) {
			// echo "Token es String {$token}<br/><br/>";
			if ($json = json_decode($token,true)) {
				// echo "Token es JSON {$token}<br/><br/>";
				$token = $json;
			} else {
				// echo "Token es NORMAL {$token}<br/><br/>";
				$token = array('access_token' => $token);
			}
		}
		// echo "EL TOKEN ES: {$token}<br/><br/>";
		// var_dump($token);
		// echo "<br/><br/>";
		if ($token == null) {
			throw new \Exception("JSON de token invalido");
		}
		if (!isset($token['access_token'])) {
			throw new \Exception("Formato inválido de Token");
		}
		$this->token = $token;

		return $this;
	}
	public function getAccessToken()
	{
		return $this->token;
	}
	public function getRefreshToken()
	{
		if (isset($this->token['refresh_token'])) {
			return $this->token['refresh_token'];
		}
	}
	public function isAccessTokenExpired()
	{
		if (!$this->token) {
			return true;
		}
		$created = 0;
		if (isset($this->token['created'])) {
			$created = $this->token['created'];
		}
		$expired = ($created
			+ ($this->token['expires_in'] - 30)) < time();

		return $expired;
	}
	public function setIncludeGrantedScopes()
	{

	}
	public function revokeToken()
	{

	}
	public function authorize(HttpRequestHelper &$request)
	{
		$grant_level = $request->getHeader('X-Oauth2-Grant-Level');
		switch ($grant_level) {
			case self::CLIENT_BASIC:
				$request
					->setBodyVar('client_id',$this->getClientId());
				break;
			case self::CLIENT_CONFIDENTIAL:
				$request->setBodyVar('client_id',$this->getClientId());
				$request->setBodyVar('client_secret',$this->getClientSecret());
				break;
			case self::OWNER_ACCESS:
				$request->setBodyVar('client_id',$this->getClientId());
				if ($token = $this->getAccessToken()) {
					$scopes = $this->prepareScopes();
					if ($this->isAccessTokenExpired() && isset($token['refresh_token'])) {
						// echo "TOKEN EXPIRED<br>";
						$refresh_token = $token['refresh_token'];
						$token = $this->fetchAccessTokenWithRefreshToken($refresh_token);
						$token['refresh_token'] = $refresh_token;
						$this->setAccessToken($token);
						foreach ($this->refresh_token_callbacks as $rf_callback) {
							$lrf_callback = $rf_callback->bindTo($this);
							call_user_func($lrf_callback,[]);
						}

					}
				}
				if ($token['token_type'] == 'Bearer') {
					$request->setHeader('Authorization', "Bearer {$token['access_token']}");
				}
				break;
			default:
				throw new \Exception("Unknown grant level");
				break;
		}
		return $request;
	}
	private function fetchAuthToken(HttpRequestHelper $request)
	{
		$response = $request->send();
		// var_dump($request);
		// echo "<br/><br/>";
		// var_dump($response);
		// echo "<br/><br/>";

		$code = $response->getStatusCode();
		$body = $response->getContent();

		if ($code >= 400) {
			throw new \Exception($body, $code);
		}


		$creds = json_decode($response->getContent(), true);
		if ($creds && isset($creds['access_token'])) {
			$creds['created'] = time();
			// $this->setAccessToken($creds);
		} else {
			throw new \Exception($body, 1000);

		}

		return $creds;
	}
	public function execute (HttpRequestHelper $request, $expectedClass = null)
	{
		$request
			->setHeader(
				'User-Agent',
				$this->config['application_name']
				. " " . self::USER_AGENT_SUFFIX
			);
		$this->authorize($request);
		// var_dump($request);
		// echo "<br/><br/>";
		$response = $request->send();
		// var_dump($response);
		// echo "<br/><br/>";
		// exit;

		$code = $response->getStatusCode();
		$body = $this->raw_response_body = $response->getBody();

		$result = null;
		if ($json = json_decode($body,true)) {
			$result = $json;
		} else {
			$result = $body;
		}
		if (intval($code) >= 400) {
			$errors = null;
			if (isset($result['error'])) {
				$errors = $result['error'];
			}
			throw new \Exception($body, $code);
		}
		if (is_null($expectedClass)) {
			$expectedClass = $request->getHeader('X-Php-Expected-Class');
		}
		if (!empty($expectedClass) && isset($result)) {
			// echo "WITH CLASS: {$expectedClass}<br/>";
			return new $expectedClass($result);
		}
		return $response;
	}
	public function setRefreshTokenCallback($callback, array $params = array())
	{
		if (!is_callable($callback)) {
			throw new \Exception("El parámetro 'callback' es incorrecto.", 1);
			return false;
		}
		$this->refresh_token_callbacks[] = $callback;
	}
}