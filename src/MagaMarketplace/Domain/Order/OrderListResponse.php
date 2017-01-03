<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Description of OrderListResponse
 *
 * @author Maicon Sasse
 */
class OrderListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\MagaMarketplace\Domain\Order\OrderResponse'
    );

}
