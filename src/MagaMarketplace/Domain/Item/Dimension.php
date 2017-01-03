<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Dimensões do anúncio
 *
 * @author Maicon Sasse
 */
class Dimension extends Domain\AbstractModel
{

    /**
     * Comprimento (cm)
     * @var float
     */
    protected $length;

    /**
     * Largura (cm)
     * @var float
     */
    protected $width;

    /**
     * Altura (cm)
     * @var float
     */
    protected $height;

    public function getLength()
    {
        return $this->length;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setLength($length)
    {
        $this->length = $this->floatValue($length);
    }

    public function setWidth($width)
    {
        $this->width = $this->floatValue($width);
    }

    public function setHeight($height)
    {
        $this->height = $this->floatValue($height);
    }

}
