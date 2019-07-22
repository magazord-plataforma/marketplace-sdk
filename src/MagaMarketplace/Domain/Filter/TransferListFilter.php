<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Fechamento Financeiro - GET /reports/transfers
 *
 * @author Maicon Sasse
 */
class TransferListFilter extends ListFilter
{

    const SORT_ID = 'id';

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Pedido
     * @var string
     */
    protected $orderId;

    /**
     * Identifica se retorna o detalhamento do "summary" no Transfer. Padrão: False
     * @var bool
     */
    protected $expandSummary;

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getExpandSummary()
    {
        return $this->expandSummary;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $this->stringValue($orderId);
    }

    public function setExpandSummary($expandSummary)
    {
        $this->expandSummary = $this->boolValue($expandSummary);
    }

}
