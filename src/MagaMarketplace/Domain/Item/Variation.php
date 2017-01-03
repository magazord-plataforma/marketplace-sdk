<?php

namespace MagaMarketplace\Domain\Item;

/**
 * Description of Variation
 *
 * @author Maicon Sasse
 */
class Variation extends Attribute
{

    const TYPE_COR = 'Cor';
    const TYPE_TAMANHO = 'Tamanho';
    const TYPE_VOLTAGEM = 'Voltagem';

    static public function getVariationList()
    {
        return array(
            self::TYPE_COR => self::TYPE_COR,
            self::TYPE_TAMANHO => self::TYPE_TAMANHO,
            self::TYPE_VOLTAGEM => self::TYPE_VOLTAGEM
        );
    }

}
