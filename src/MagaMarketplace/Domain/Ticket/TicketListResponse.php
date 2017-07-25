<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Description of TicketListResponse
 *
 * @author Maicon Sasse
 */
class TicketListResponse extends Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'list' => '\\MagaMarketplace\\Domain\\Ticket\\Ticket'
    );

}
