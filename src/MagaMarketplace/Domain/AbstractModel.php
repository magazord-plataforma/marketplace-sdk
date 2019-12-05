<?php

namespace MagaMarketplace\Domain;

/**
 * Description of AbstractModel
 *
 * @author Maicon Sasse
 */
class AbstractModel
{

    const FORMAT_TIMESTAMP = 'Y-m-d\TH:i:sP';
    const FORMAT_DATE = 'Y-m-d';

    /**
     * Codigo HTTP da resposta da requisição
     * @var integer
     */
    protected $_httpResponseCode;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * Sobrescrito nos modelos onde é necessário
     * @var array
     */
    protected $_mapper = array();

    public function getHttpResponseCode()
    {
        return $this->_httpResponseCode;
    }

    public function setHttpResponseCode($httpResponseCode)
    {
        $this->_httpResponseCode = $httpResponseCode;
    }

    public function isSuccess()
    {
        return ($this->getHttpResponseCode() == 200 || $this->getHttpResponseCode() == 201 || $this->getHttpResponseCode() == 204);
    }

    public function isNotFound()
    {
        return ($this->getHttpResponseCode() == 404);
    }

    /**
     * Requisição excede a quantidade máxima de chamadas permitidas à API;
     * @return bool
     */
    public function isCallsPerMinuteReject()
    {
        return ($this->getHttpResponseCode() == 429);
    }

    public function isBusinessError()
    {
        return ($this->getHttpResponseCode() == 422);
    }

    /**
     * Retorna o objeto em formato JSON
     */
    public function serialize()
    {
        $result = null;
        foreach ($this as $property => $value) {
            if ($property[0] == '_') { // Propriedades internas nossas
                continue;
            }
            $getter = 'get' . strtoupper($property[0]) . substr($property, 1);
            $value = $this->$getter();
            if ($value === null) { // Propriedades nulas não envia
                continue;
            } else if ($value instanceof AbstractModel) {
                $value = $value->serialize();
            } else if ($value instanceof \JsonSerializable) {
                $value = $value->jsonSerialize();
            } else if (is_array($value)) {
                $internal = array();
                foreach ($value as $subProperty => $subValue) {
                    if ($subValue instanceof AbstractModel) {
                        $internal[$subProperty] = $subValue->serialize();
                    } else {
                        $internal[$subProperty] = $subValue;
                    }
                }
                $value = $internal;
            }
            if ($result === null) {
                $result = new \stdClass();
            }
            $result->$property = $value;
        }
        return $result;
    }

    /**
     * Carrega o objeto a partir do json
     * @param mixed $json
     */
    public function unserialize($json)
    {
        $type = gettype($json);
        foreach ($this as $property => $value) {
            if ($property[0] == '_') { // Propriedades internas nossas
                continue;
            }
            $setter = 'set' . strtoupper($property[0]) . substr($property, 1);
            $valueSetter = null;
            if ($type == 'object' && isset($json->$property)) {
                $valueSetter = $json->$property;
            } else if ($type == 'array' && isset($json[$property])) {
                $valueSetter = $json[$property];
            }
            // Propriedades que são objetos
            if (isset($this->_mapper[$property])) {
                if ($valueSetter !== null) {
                    $isArray = (is_array($valueSetter) && (isset($valueSetter[0]) || $valueSetter === array()));
                    if ($isArray) {
                        $internalArray = array();
                        foreach ($valueSetter as $ind => $valueSub) {
                            $internal = new $this->_mapper[$property];
                            $internal->unserialize($valueSub);
                            $internalArray[$ind] = $internal;
                        }
                        $valueSetter = $internalArray;
                    } else {
                        $internal = new $this->_mapper[$property];
                        $internal->unserialize($valueSetter);
                        $valueSetter = $internal;
                    }
                }
            }
            $this->$setter($valueSetter);
        }
        return $this;
    }

    public function asString()
    {
        return json_encode($this->serialize());
    }

    public function __toString()
    {
        $result = $this->asString();
        return (is_string($result)) ? $result : '';
    }

    protected function boolValue($value)
    {
        if ($value !== null) {
            if ($value === 'false') {
                return false;
            } else {
                return ($value) ? true : false;
            }
        }
        return $value;
    }

    protected function intValue($value)
    {
        if ($value !== null && !is_int($value)) {
            return (int) $value;
        }
        return $value;
    }

    protected function floatValue($value)
    {
        if ($value !== null && !is_float($value)) {
            return (float) $value;
        }
        return $value;
    }

    protected function stringValue($value)
    {
        if ($value === '') {
            return null;
        } else if ($value !== null && !is_string($value)) {
            return (string) $value;
        }
        return $value;
    }

    protected function defaultValue($value, $defaultValue)
    {
        if ($value === null) {
            return $defaultValue;
        }
        return $value;
    }

    /**
     * Converte a string de data em \DateTime
     * @param string Data no formato especificado
     * @return \DateTime
     */
    public function toDateTime($date)
    {
        if ($date) {
            if (strlen($date) == 10) {
                $date .= 'T00:00:00-03:00';
            }
            return \DateTime::createFromFormat(self::FORMAT_TIMESTAMP, $date);
        }
        return null;
    }

    /**
     * Retorna a data/hora no formato de envio para o marketplace
     * @param \DateTime $date
     * @return string
     */
    public function toDateTimeString(\DateTime $date = null)
    {
        if ($date) {
            return $date->format(self::FORMAT_TIMESTAMP);
        }
        return null;
    }

    /**
     * Retorna a data/hora no formato de envio para o marketplace
     * @param \DateTime $date
     * @return string
     */
    public function toDateString(\DateTime $date = null)
    {
        if ($date) {
            return $date->format(self::FORMAT_DATE);
        }
        return null;
    }

}
