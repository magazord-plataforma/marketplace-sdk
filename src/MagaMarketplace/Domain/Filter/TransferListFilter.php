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

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $this->stringValue($orderId);
    }

}
