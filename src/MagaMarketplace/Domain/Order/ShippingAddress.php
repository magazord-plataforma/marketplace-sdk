<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Endereço de entrega
 *
 * @author Maicon Sasse
 */
class ShippingAddress extends Domain\AbstractModel
{

    const TYPE_COMMERCIAL = 'commercial';
    const TYPE_RESIDENTIAL = 'residential';

    /**
     * Tipo. (commercial, residential)
     * @var string
     */
    protected $addressType;

    /**
     * Responsável
     * @var string
     */
    protected $receiverName;

    /**
     * Fone responsável
     * @var string
     */
    protected $receiverPhone;

    /**
     * Endereço
     * @var string
     */
    protected $street;

    /**
     * Número
     * @var string
     */
    protected $number;

    /**
     * Complemento
     * @var string
     */
    protected $additionalInfo;

    /**
     * Bairro
     * @var string
     */
    protected $neighborhood;

    /**
     * Cidade
     * @var string
     */
    protected $city;

    /**
     * CEP
     * @var integer
     */
    protected $zipcode;

    /**
     * Estado (sigla)
     * @var string
     */
    protected $state;

    /**
     * País (sigla)
     * @var string
     */
    protected $country;

    public function getAddressType()
    {
        return $this->addressType;
    }

    public function getReceiverName()
    {
        return $this->receiverName;
    }

    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
    }

    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;
    }

    public function setReceiverPhone($receiverPhone)
    {
        $this->receiverPhone = $this->stringValue($receiverPhone);
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setNumber($number)
    {
        $this->number = $this->stringValue($number);
    }

    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $this->intValue($zipcode);
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

}
