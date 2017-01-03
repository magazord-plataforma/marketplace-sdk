<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Opção de envio do anúncio
 *
 * @author Maicon Sasse
 */
class ShippingService extends Domain\AbstractModel
{

    /**
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Nome
     * @var string
     */
    protected $name;

    /**
     * Valor
     * @var float
     */
    protected $price;

    /**
     * Data estimada de entrega
     * @var string
     */
    protected $estimatedDeliveryDate;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

}
