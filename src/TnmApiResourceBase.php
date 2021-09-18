<?php

namespace TecNM_DPII\CVU_API_Client;

abstract class TnmApiResourceBase
{
	private $client;
	private $rootUrl;
	private $serviceName;
	private $servicePath;
	private $resourceName;
	private $methods;
	private $service;

	public function __construct(TnmApiServiceBase $service, $serviceName, $resourceName, $resource)
	{
		$this->rootUrl = $service->rootUrl;
		$this->client = $service->getClient();
		$this->servicePath = $service->servicePath;
		$this->serviceName = $service->serviceName;
		$this->resourceName = $resourceName;
		$this->service = $service;
		$this->methods = is_array($resource) && isset($resource['methods']) ?
			$resource['methods'] :
			array($resourceName => $resource);
	}
	public function getService()
	{
		return $this->service;
	}
	public function call($methodName, $arguments, $expectedClass = null)
	{
		$method = $this->methods[$methodName];
		$parameters = $arguments[0];
		$postBody = null;
		if (isset($parameters['postBody'])) {
			if ($parameters['postBody'] instanceof TnmApiModelBase) {
				$parameters['postBody'] = $parameters['postBody']->toSimpleObject();
			} elseif (is_object($parameters['postBody'])) {
				// var_dump($parameters['postBody']);
				$parameters['postBody'] = $this->convertToArrayAndStripNulls($parameters['postBody']);
			}
			$postBody = (array) $parameters['postBody'];
			unset($parameters['postBody']);
		}
		// var_dump($postBody);

		$paramsSpec = $method['parameters'];

		foreach ($paramsSpec as $paramName => $paramSpec)
		{
			if (isset($paramSpec['required']) && $paramSpec['required'] && !isset($parameters[$paramName])) {
				throw new \Exception("No se ha incluido el parámetro requerido '{$paramName}' en {$this->serviceName}->{$this->resourceName}");
			}
			if (isset($paramSpec['location']) && $paramSpec['location'] === 'path' && !isset($parameters[$paramName])) {
				$method['path'] = str_replace('{'.$paramName.'}','',$method['path']);
			}
		}
		$pathParameters = array();
		$queryParameters = array();
		$bodyParameters = array();
		foreach ($parameters as $paramName => $paramVal)
		{
			if ($paramName == 'postBody') {
				continue;
			}
			if (in_array($paramName,array('raw_data'))) {
				continue;
			}
			if (!isset($paramsSpec[$paramName])) {
				throw new \Exception("No se conoce el parámetro {$paramName} en {$this->serviceName}->{$this->resourceName}.");
			}
			$paramSpec = $paramsSpec[$paramName];
			if ($paramSpec['type'] === 'boolean') {
				$parameters[$paramName] = ($paramVal ? 'true' : 'false');
			}
			if ($paramSpec['location'] === 'path') {
				$pathParameters[$paramName] = $parameters[$paramName];
			} elseif ($paramSpec['location'] === 'query') {
				$queryParameters[$paramName] = $parameters[$paramName];
			} elseif ($paramSpec['location'] === 'body') {
				$bodyParameters[$paramName] = $parameters[$paramName];
			}
		}

		if (isset($parameters['raw_data']) && $parameters['raw_data']) {
			$expectedClass = null;
		}
		// var_dump($pathParameters);

		$requestUri = $this->createRequestUri(
			$method['path'],
			$pathParameters,
			$queryParameters
		);

		$request = new HttpRequestHelper($requestUri);
		$request->setMethod($method['httpMethod'])
			// ->setHeader('Content-Type','application/json')
			->setHeader('X-Oauth2-Grant-Level',$method['grant_lvl'] ? $method['grant_lvl'] : TnmApiClient::OWNER_ACCESS)
			->setBodyVar($postBody);
		if (!is_null($expectedClass)) {
			$request->setHeader('X-Php-Expected-Class',$expectedClass);
		}
		
		if (!empty($bodyParameters)) {
			$request->setBodyVar($bodyParameters);
		}

		return $this->client->execute($request, $expectedClass);
	}

	private function createRequestUri($restPath, $pathParameters, $queryParameters)
	{
		$requestUrl = rtrim($this->servicePath,'/') . '/' . ltrim($restPath,'/');
		if ($this->rootUrl) {
			$requestUrl = rtrim($this->rootUrl,'/') . '/' . ltrim($requestUrl, '/');
		}

		if (!empty($pathParameters)) {
			$requestUrl = $this->replaceVarsUri($requestUrl, $pathParameters);
		}
		if (!empty($queryParameters)) {
			$queryString = http_build_query($queryParameters);
			$requestUrl = $requestUrl . '?' . $queryString;
		}

		return $requestUrl;
	}
	private function replaceVarsUri($string, $vars)
	{
		$start = strpos($string,'{');
		if ($start === false) {
			return $string;
		}
		$end = strpos($string,'}');
		if ($end === false) {
			return $string;
		}
		$param = substr($string, $start+1, $end - $start - 1);
		$string = substr_replace($string, isset($vars[$param]) ? $vars[$param] : '', $start, strlen($param)+2);
		return $this->replaceVarsUri($string, $vars);
	}
	protected function convertToArrayAndStripNulls($o)
	{
		// var_dump($o);
		$o = (array) $o;
		foreach ($o as $k => $v) {
			var_dump($k); echo " - "; var_dump($v);
			if ($v === null) {
				unset($o[$k]);
			} elseif (is_object($v) || is_array($v)) {
				echo ('$v is object or array');
				// var_dump($v);
				$o[$v] = $this->convertToArrayAndStripNulls($o[$k]);
			}
		}
		return $o;
	}
}