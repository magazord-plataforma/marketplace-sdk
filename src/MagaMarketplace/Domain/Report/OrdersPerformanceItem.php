<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersPerformanceItem
 *
 * @author Maicon Sasse
 */
class OrdersPerformanceItem extends Domain\AbstractModel
{

    /**
     * Parte
     * @var integer
     */
    protected $part = 0;

    /**
     * Total
     * @var integer
     */
    protected $total = 0;

    /**
     * Percentual
     * @var float
     */
    protected $percentage = 0;

    public function getPart()
    {
        return $this->part;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPart($part)
    {
        $this->part = $this->intValue($part);
    }

    public function setTotal($total)
    {
        $this->total = $this->intValue($total);
    }

    public function setPercentage($percentage)
    {
        $this->percentage = $this->floatValue($percentage);
    }

    public function calcPercentage()
    {
        if ($this->getTotal() > 0) {
            $this->setPercentage(round($this->regraDeTres($this->getTotal(), 100, $this->getPart()), 2));
        }
    }

    private function regraDeTres($valor1, $valorEquiv1, $valor2)
    {
        return ($valor2 * $valorEquiv1) / $valor1;
    }

}
