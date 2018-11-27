<?php

namespace MagaMarketplace\Domain\Report;

/**
 * Objeto de Resposta de Performance do Vendedor (Lojista)
 * @author Lucas Felicio Adriano
 */
class SellersPerformanceItem extends OrdersPerformanceItem
{

    /**
     * Tempo médio de reposta
     * @var int
     */
    protected $averageTime = 0;

    function getAverageTime()
    {
        return $this->averageTime;
    }

    function setAverageTime($averageTime)
    {
        $this->averageTime = $this->floatValue($averageTime);
    }
}