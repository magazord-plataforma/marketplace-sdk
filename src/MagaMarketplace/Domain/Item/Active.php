<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Ativo
 *
 * @author Maicon Sasse
 */
class Active extends Domain\AbstractModel
{

    /**
     * Ativo
     * @var boolean
     */
    protected $active;

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $this->boolValue($active);
    }

}
