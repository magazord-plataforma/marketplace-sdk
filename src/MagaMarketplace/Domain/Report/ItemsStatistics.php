<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of ItemStatistics
 *
 * @author Maicon Sasse
 */
class ItemsStatistics extends Domain\AbstractModel
{

    /**
     * Total de anúncios
     * @var int
     */
    protected $total = 0;

    /**
     * Anúncios pendentes
     * @var int
     */
    protected $statusPending = 0;

    /**
     * Anúncios aprovados
     * @var int
     */
    protected $statusApproved = 0;

    /**
     * Anúncios rejeitados
     * @var int
     */
    protected $statusRejected = 0;

    /**
     * Anúncios catalogados
     * @var int
     */
    protected $statusSelling = 0;

    /**
     * Anúncios ativos
     * @var int
     */
    protected $active = 0;

    /**
     * Anúncios desativados
     * @var int
     */
    protected $deactivated = 0;

    /**
     * Anúncios sem estoque
     * @var int
     */
    protected $outOfStock = 0;

    public function getTotal()
    {
        return $this->total;
    }

    public function getStatusPending()
    {
        return $this->statusPending;
    }

    public function getStatusApproved()
    {
        return $this->statusApproved;
    }

    public function getStatusRejected()
    {
        return $this->statusRejected;
    }

    public function getStatusSelling()
    {
        return $this->statusSelling;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getDeactivated()
    {
        return $this->deactivated;
    }

    public function getOutOfStock()
    {
        return $this->outOfStock;
    }

    public function setTotal($total)
    {
        $this->total = $this->intValue($total);
    }

    public function setStatusPending($statusPending)
    {
        $this->statusPending = $this->intValue($statusPending);
    }

    public function setStatusApproved($statusApproved)
    {
        $this->statusApproved = $this->intValue($statusApproved);
    }

    public function setStatusRejected($statusRejected)
    {
        $this->statusRejected = $this->intValue($statusRejected);
    }

    public function setStatusSelling($statusSelling)
    {
        $this->statusSelling = $this->intValue($statusSelling);
    }

    public function setActive($active)
    {
        $this->active = $this->intValue($active);
    }

    public function setDeactivated($deactivated)
    {
        $this->deactivated = $this->intValue($deactivated);
    }

    public function setOutOfStock($outOfStock)
    {
        $this->outOfStock = $this->intValue($outOfStock);
    }

}
