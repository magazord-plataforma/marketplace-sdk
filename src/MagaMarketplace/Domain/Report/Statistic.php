<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrderStatusStatistic
 *
 * @author Maicon Sasse
 */
class Statistic extends Domain\AbstractModel
{

    /**
     * Quantidade
     * @var integer
     */
    protected $quantity = 0;

    /**
     * Valor total
     * @var float
     */
    protected $totalAmount = 0;

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $this->intValue($quantity);
    }

    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $this->floatValue($totalAmount);
    }

}
