<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Preço do anúncio
 *
 * @author Maicon Sasse
 */
class Price extends Domain\AbstractModel
{

    /**
     * Preço "de"
     * @var float
     */
    protected $default;

    /**
     * Preço "por". Preço real de venda
     * @var float
     */
    protected $sale;

    public function getDefault()
    {
        return $this->default;
    }

    public function getSale()
    {
        return $this->sale;
    }

    public function setDefault($default)
    {
        $this->default = $this->floatValue($default);
    }

    public function setSale($sale)
    {
        $this->sale = $this->floatValue($sale);
    }

}
