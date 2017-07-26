<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Detalhamento do Fechamento Financeiro - GET /reports/transfers/{id}/transaction
 *
 * @author Maicon Sasse
 */
class TransferTransactionListFilter extends ListFilter
{

    /**
     * Pedido
     * @var string
     */
    protected $orderId;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $this->stringValue($orderId);
    }

}
