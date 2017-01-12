<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of BestSeller
 *
 * @author Maicon Sasse
 */
class BestSeller extends Statistic
{

    /**
     * Anúncio
     * @var Domain\Link
     */
    protected $item;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'item' => '\\MagaMarketplace\\Domain\\Link'
    );

    public function getItem()
    {
        return $this->item;
    }

    public function setItem(Domain\Link $item = null)
    {
        $this->item = $item;
    }

}
