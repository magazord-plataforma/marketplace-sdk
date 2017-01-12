<?php

namespace MagaMarketplace\Domain\Filter;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersStatisticsListFilter
 *
 * @author Maicon Sasse
 */
class OrdersStatisticsFilter extends Domain\AbstractModel
{

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

    public function getBeginDate()
    {
        return $this->beginDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
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
