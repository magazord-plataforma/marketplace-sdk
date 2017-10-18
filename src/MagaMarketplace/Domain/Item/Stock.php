<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Estoque
 *
 * @author Maicon Sasse
 */
class Stock extends Domain\AbstractModel
{

    /**
     * Quantidade em estoque
     * @var integer
     */
    protected $quantity;

    /**
     * Prazo de expedição (dias)
     * @var integer
     */
    protected $shippingTime;

    /**
     * Data Pré Venda. Formato: YYYY-MM-DD
     * @var string
     */
    protected $preSaleDate;

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getShippingTime()
    {
        return $this->shippingTime;
    }

    public function getPreSaleDate()
    {
        return $this->preSaleDate;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $this->intValue($quantity);
    }

    public function setShippingTime($shippingTime)
    {
        $this->shippingTime = $this->intValue($shippingTime);
    }

    public function setPreSaleDate($preSaleDate)
    {
        $this->preSaleDate = $preSaleDate;
    }

}
