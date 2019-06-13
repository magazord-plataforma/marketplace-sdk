<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Description of OrderThirdPartyId
 *
 * @author Maicon Sasse
 */
class OrderThirdPartyId extends Domain\AbstractModel
{

    /**
     * Número de pedido de terceiro
     * @var string
     */
    protected $thirdPartyId;

    public function getThirdPartyId()
    {
        return $this->thirdPartyId;
    }

    public function setThirdPartyId($thirdPartyId)
    {
        $this->thirdPartyId = $this->stringValue($thirdPartyId);
    }

}
