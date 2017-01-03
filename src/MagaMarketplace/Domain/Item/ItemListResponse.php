<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Description of ItemListResponse
 *
 * @author Maicon Sasse
 */
class ItemListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\MagaMarketplace\Domain\Item\ItemResponse'
    );

}
