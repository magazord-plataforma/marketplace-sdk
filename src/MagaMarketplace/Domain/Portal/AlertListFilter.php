<?php

namespace MagaMarketplace\Domain\Portal;

use \MagaMarketplace\Domain;

/**
 * Description of AlertListFilter
 *
 * @author Maicon Sasse
 */
class AlertListFilter extends Domain\Filter\ListFilter
{

    protected $id;
    protected $title;
    protected $date;
    protected $sellerId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

}
