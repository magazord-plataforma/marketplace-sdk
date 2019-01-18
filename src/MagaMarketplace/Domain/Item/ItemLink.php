<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Description of ItemLink
 *
 * @author Maicon Sasse
 */
class ItemLink extends Domain\AbstractModel
{

    /**
     * Loja do marketplace
     * @var string
     */
    protected $store;

    /**
     * Link para acessar o recurso
     * @var string
     */
    protected $href;

    public function getStore()
    {
        return $this->store;
    }

    public function setStore($store)
    {
        $this->store = $store;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

}
