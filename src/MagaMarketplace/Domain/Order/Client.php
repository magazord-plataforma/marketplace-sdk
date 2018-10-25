<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Dados do cliente
 *
 * @author Maicon Sasse
 */
class Client extends Domain\AbstractModel
{

    /**
     * CPF/CNPJ
     * @var string
     */
    protected $documentNumber;

    /**
     * Nome
     * @var string
     */
    protected $name;

    /**
     * Telefones de contato
     * @var Telephone[]
     */
    protected $phones;

    /**
     * Data de nascimento. Formato: YYYY-MM-DD
     * @var string
     */
    protected $birthDate;
    
    /**
     * Inscrição Estadual (IE)
     * @var String
     */
    protected $ie;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'phones' => '\\MagaMarketplace\\Domain\\Order\\Telephone'
    );

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }
    
    public function getIe()
    {
        return $this->ie;
    }

    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPhones(array $phones = null)
    {
        $this->phones = $phones;
    }

    public function addPhone($number, $type = null)
    {
        $phones = ($this->getPhones()) ? $this->getPhones() : array();
        $tel = new Telephone();
        $tel->setNumber($number);
        $tel->setType($type);
        $phones[] = $tel;
        $this->setPhones($phones);
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }
    
    public function setIe($ie)
    {
        $this->ie = $this->stringValue($ie);
    }
}