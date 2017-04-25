<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersStatistics
 *
 * @author Maicon Sasse
 */
class OrdersStatistics extends Domain\AbstractModel
{

    /**
     * Total de pedidos
     * @var Statistic
     */
    protected $total;

    /**
     * Pedidos novos
     * @var Statistic
     */
    protected $statusNew;

    /**
     * Pedidos aprovados
     * @var Statistic
     */
    protected $statusApproved;

    /**
     * Pedidos em transporte
     * @var Statistic
     */
    protected $statusShipped;

    /**
     * Pedidos entregues
     * @var Statistic
     */
    protected $statusDelivered;

    /**
     * Pedidos cancelados
     * @var Statistic
     */
    protected $statusCanceled;

    /**
     * Pedidos devolvidos
     * @var Statistic
     */
    protected $statusReturned;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'total' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusNew' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusApproved' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusShipped' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusDelivered' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusCanceled' => '\\MagaMarketplace\\Domain\\Report\\Statistic',
        'statusReturned' => '\\MagaMarketplace\\Domain\\Report\\Statistic'
    );

    public function getTotal()
    {
        return $this->total;
    }

    public function getStatusNew()
    {
        return $this->statusNew;
    }

    public function getStatusApproved()
    {
        return $this->statusApproved;
    }

    public function getStatusShipped()
    {
        return $this->statusShipped;
    }

    public function getStatusDelivered()
    {
        return $this->statusDelivered;
    }

    public function getStatusCanceled()
    {
        return $this->statusCanceled;
    }

    public function getStatusReturned()
    {
        return $this->statusReturned;
    }

    public function setTotal(Statistic $total = null)
    {
        $this->total = $total;
    }

    public function setStatusNew(Statistic $statusNew = null)
    {
        $this->statusNew = $statusNew;
    }

    public function setStatusApproved(Statistic $statusApproved = null)
    {
        $this->statusApproved = $statusApproved;
    }

    public function setStatusShipped(Statistic $statusShipped = null)
    {
        $this->statusShipped = $statusShipped;
    }

    public function setStatusDelivered(Statistic $statusDelivered = null)
    {
        $this->statusDelivered = $statusDelivered;
    }

    public function setStatusCanceled(Statistic $statusCanceled = null)
    {
        $this->statusCanceled = $statusCanceled;
    }

    public function setStatusReturned(Statistic $statusReturned = null)
    {
        $this->statusReturned = $statusReturned;
    }

    public function init()
    {
        $this->setTotal(new Statistic());
        $this->setStatusNew(new Statistic());
        $this->setStatusApproved(new Statistic());
        $this->setStatusShipped(new Statistic());
        $this->setStatusDelivered(new Statistic());
        $this->setStatusCanceled(new Statistic());
        $this->setStatusReturned(new Statistic());
    }

}
