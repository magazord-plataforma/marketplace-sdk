<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersPerformanceListResponse
 *
 * @author Maicon Sasse
 */
class OrdersPerformanceListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\\MagaMarketplace\\Domain\\Report\\OrdersPerformance'
    );

    public function sortByShipping()
    {
        usort($this->list, function(OrdersPerformance $a, OrdersPerformance $b) {
            if ($a->getShipping()->getPercentage() == $b->getShipping()->getPercentage()) {
                if ($a->getShipping()->getTotal() == $b->getShipping()->getTotal()) {
                    return 0;
                } else if ($a->getShipping()->getTotal() > $b->getShipping()->getTotal()) {
                    return -1;
                } else {
                    return 1;
                }
            } else if ($a->getShipping()->getPercentage() > $b->getShipping()->getPercentage()) {
                return -1;
            } else {
                return 1;
            }
        });
    }

}
