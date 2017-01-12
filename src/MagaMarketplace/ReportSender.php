<?php

namespace MagaMarketplace;

/**
 * Description of ReportSender
 *
 * @author Maicon Sasse
 */
class ReportSender extends AbstractSender
{

    /**
     * Anúncios mais vendidos
     * @param Domain\Filter\BestSellersListFilter $filter
     * @return Domain\Report\BestSellersListResponse|Domain\Error
     */
    public function getBestSellers(Domain\Filter\BestSellersListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\BestSellersListResponse());
        return $this->send('/reports/bestSellers', null, (array) $filter->serialize());
    }

    /**
     * Estatisticas dos anúncios
     * @return Domain\Report\ItemsStatistics|Domain\Error
     */
    public function getItemsStatistics()
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\ItemsStatistics());
        return $this->send('/reports/items/statistics');
    }

    /**
     * Estatisticas dos pedidos
     * @param Domain\Filter\BestSellersListFilter $filter
     * @return Domain\Report\OrdersStatistics|Domain\Error
     */
    public function getOrdersStatistics(Domain\Filter\OrdersStatisticsFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\OrdersStatistics());
        return $this->send('/reports/orders/statistics', null, (array) $filter->serialize());
    }

}
