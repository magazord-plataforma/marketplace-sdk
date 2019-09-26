<?php

namespace MagaMarketplace\Domain\Portal;

use \MagaMarketplace\Domain;

/**
 * Description of AlertListResponse
 *
 * @author Maicon Sasse
 */
class AlertListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\\MagaMarketplace\\Domain\\Portal\\Alert'
    );

}
