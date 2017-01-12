<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of BestSellerListResponse
 *
 * @author Maicon Sasse
 */
class BestSellersListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\\MagaMarketplace\\Domain\\Report\\BestSeller'
    );

}
