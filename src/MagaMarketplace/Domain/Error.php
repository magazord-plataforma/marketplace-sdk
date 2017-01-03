<?php

namespace MagaMarketplace\Domain;

/**
 * Resposta de erro
 *
 * @author Maicon Sasse
 */
class Error extends AbstractModel
{

    /**
     * Código
     * @var integer
     */
    protected $code;

    /**
     * Mensagem
     * @var string
     */
    protected $message;

    /**
     * Código HTTP
     * @var integer
     */
    protected $httpCode;

    /**
     * Detalhes
     * @var array
     */
    protected $detail;

    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
    }

    public function setDetail(array $detail = null)
    {
        $this->detail = $detail;
    }

    public function addDetail($message)
    {
        $detail = ($this->getDetail()) ? $this->getDetail() : array();
        $detail[] = $message;
        $this->setDetail($detail);
    }

    public function setHttpResponseCode($httpResponseCode)
    {
        $this->setHttpCode($httpResponseCode);
        parent::setHttpResponseCode($httpResponseCode);
    }

    public function getHttpResponseCode()
    {
        return $this->getHttpCode();
    }

    /**
     * @param string $message
     * @param int $httpCode
     * @param mixed $code
     * @return Error
     */
    static public function newInstance($message, $httpCode = 400, $code = null)
    {
        $error = new Error();
        $error->setHttpCode($httpCode);
        $error->setCode($code ? $code : $httpCode);
        $error->setMessage($message);
        return $error;
    }

    public function unserialize($json)
    {
        if (is_string($json)) {
            $this->setMessage($json);
        } else {
            parent::unserialize($json);
        }
    }

    /**
     * Retorna a mensagem a ser exibida para o usuário
     * @return string
     */
    public function getUserMessage()
    {
        $result = 'O serviço do marketplace retornou o seguinte mensagem: ' . PHP_EOL;
        if ($this->getMessage()) {
            $result .= $this->getMessage() . PHP_EOL;
        }
        if ($this->getDetail()) {
            foreach ($this->getDetail() as $detail) {
                $result .= $detail . PHP_EOL;
            }
        }
        if ($this->getHttpCode()) {
            $result .= 'HttpCode: ' . $this->getHttpCode() . PHP_EOL;
        }
        return $result;
    }

    public function asString()
    {
        return $this->getUserMessage();
    }

}
