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

    /**
     * Performance dos pedidos
     * @param Domain\Report\OrdersPerformanceFilter $filter
     * @return Domain\Report\OrdersPerformanceListResponse|Domain\Error
     */
    public function getOrdersPerformance(Domain\Report\OrdersPerformanceFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\OrdersPerformanceListResponse());
        return $this->send('/reports/orders/performance', null, (array) $filter->serialize());
    }

    /**
     * Consulta de Fechamento Financeiro
     * @param Domain\Filter\TransferListFilter $filter
     * @return Domain\Report\TransferListResponse|Domain\Error
     */
    public function getTransfers(Domain\Filter\TransferListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\TransferListResponse());
        return $this->send('/reports/transfers', null, (array) $filter->serialize());
    }

    /**
     * Consulta das Movimentações do Fechamento Financeiro
     * @param int $id
     * @param Domain\Filter\TransferTransactionListFilter $filter
     * @return Domain\Report\TransactionListResponse|Domain\Error
     */
    public function getTransferTransactions($id, Domain\Filter\TransferTransactionListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Report\TransactionListResponse());
        return $this->send('/reports/transfers/' . $id . '/transaction', null, (array) $filter->serialize());
    }

}
