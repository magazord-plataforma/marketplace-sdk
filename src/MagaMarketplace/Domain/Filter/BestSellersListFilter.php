<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Mais Vendidos - GET /reports/bestSellers
 *
 * @author Maicon Sasse
 */
class BestSellersListFilter extends ListFilter
{

    const SORT_QUANTITY = 'quantity';
    const SORT_TOTAL_AMOUNT = 'totalAmount';

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
