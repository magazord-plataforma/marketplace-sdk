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

    /**
     * Descrição
     * @var string
     */
    protected $description;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $this->stringValue($orderId);
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

}
