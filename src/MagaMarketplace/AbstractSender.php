<?php

namespace MagaMarketplace;

/**
 * Description of AbstractSender
 *
 * @author Maicon Sasse
 */
abstract class AbstractSender
{

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * Url base da API
     * @var string
     */
    private $endpoint;

    /**
     * Usuário de acesso
     * @var string
     */
    private $user;

    /**
     * Senha de acesso
     * @var string
     */
    private $password;

    /**
     *
     * @var string
     */
    private $url;

    /**
     *
     * @var string
     */
    private $method;

    /**
     * Requisição (objeto)
     * @var Domain\AbstractModel
     */
    private $request;

    /**
     * Requisição
     * @var string
     */
    private $requestString;

    /**
     * Modelo contendo a resposta decodificada
     * @var Domain\AbstractModel
     */
    private $response;

    /**
     * Resposta
     * @var string
     */
    private $responseString;

    /**
     * Resposta da classe \Httpful\Request
     * @var \Httpful\Response
     */
    private $responseHttp;

    /**
     * Funcão de log de requisições
     * @var \Closure
     */
    private $logger;

    /**
     * HTTP timeout (em segundos)
     * @var int
     */
    private $timeOut = null;

    public function __construct($endpoint, $user, $password)
    {
        $this->setEndpoint($endpoint);
        $this->setUser($user);
        $this->setPassword($password);
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @param string $path
     * @param Domain\AbstractModel $body
     * @param array $params
     * @return Domain\AbstractModel|Domain\Error
     */
    protected function send($path, Domain\AbstractModel $body = null, array $params = null)
    {
        $this->url = $this->getEndpoint() . $path;
        $this->url .= ($params) ? '?' . http_build_query($params) : '';
        switch ($this->method) {
            case self::METHOD_GET:
                $http = \Httpful\Request::get($this->url);
                break;
            case self::METHOD_POST:
                $http = \Httpful\Request::post($this->url);
                break;
            case self::METHOD_PUT:
                $http = \Httpful\Request::put($this->url);
                break;
            case self::METHOD_DELETE:
                $http = \Httpful\Request::delete($this->url);
                break;
        }
        $this->authenticateClient($http);
        $http->auto_parse = false;
        if ($this->getTimeOut() !== null) {
            $http->timeout($this->getTimeOut());
        }
        if ($body) {
            $this->parseBody($http, $body);
        }
        try {
            if ($this->responseHttp = $http->send()) {
                $this->processResponse();
            }
        } catch (\Exception $e) {
            $this->response = $this->createInstanceError($e->getMessage(), 500);
        }
        if ($this->logger) {
            call_user_func($this->logger, $this);
        }
        return $this->response;
    }

    /**
     * @param \MagaMarketplace\Domain\AbstractModel $body
     */
    protected function parseBody(\Httpful\Request $http, Domain\AbstractModel $body)
    {
        $this->request = $body;
        $this->requestString = $body->asString();
        $http->body($this->requestString, 'application/json');
    }

    protected function createInstanceError($message, $httpCode)
    {
        return Domain\Error::newInstance($message, $httpCode);
    }

    protected function authenticateClient(\Httpful\Request $http)
    {
        $http->authenticateWithBasic($this->getUser(), $this->getPassword());
    }

    protected function processResponse()
    {
        $this->responseString = $this->responseHttp->raw_body;
        if (!($this->responseHttp->code >= 200 && $this->responseHttp->code <= 204)) {
            $this->response = $this->createInstanceError(null, null);
        }
        $this->response->setHttpResponseCode($this->responseHttp->code);
        $responseData = null;
        if ($this->responseHttp->content_type == 'application/json' && $this->responseString) {
            if (($decoded = json_decode($this->responseString)) !== null) {
                $responseData = $decoded;
            }
        }
        if (!$responseData && $this->responseString) {
            $responseData = $this->responseString;
        }
        if ($responseData) {
            $this->unserializeData($responseData);
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRequestString()
    {
        return $this->requestString;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getResponseString()
    {
        return $this->responseString;
    }

    protected function setMethod($method)
    {
        $this->method = $method;
    }

    protected function setRequest(Domain\AbstractModel $request = null)
    {
        $this->request = $request;
    }

    protected function setRequestString($requestString)
    {
        $this->requestString = $requestString;
    }

    protected function setResponse(Domain\AbstractModel $response = null)
    {
        $this->response = $response;
    }

    protected function setResponseString($responseString)
    {
        $this->responseString = $responseString;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function setLogger(\Closure $logger = null)
    {
        $this->logger = $logger;
    }

    public function getTimeOut()
    {
        return $this->timeOut;
    }

    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
    }

    /**
     * Limpar as variáveis
     */
    protected function reset()
    {
        $this->url = null;
        $this->method = null;
        $this->request = null;
        $this->requestString = null;
        $this->response = null;
        $this->responseHttp = null;
        $this->responseString = null;
    }

    /**
     * @param $responseData
     */
    protected function unserializeData($responseData)
    {
        $this->response->unserialize($responseData);
    }

    /**
     * @return \Httpful\Response
     */
    public function getResponseHttp()
    {
        return $this->responseHttp;
    }

}
