<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersPerformanceFilter
 *
 * @author Maicon Sasse
 */
class OrdersPerformanceFilter extends Domain\Filter\ListFilter
{

    /**
     * Id Lojista
     * @var int
     */
    protected $sellerId;

    /**
     * Data/hora inicial
     * @var string
     */
    protected $beginDate;

    /**
     * Data/hora final
     * @var string
     */
    protected $endDate;

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function getBeginDate()
    {
        return $this->beginDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

}
