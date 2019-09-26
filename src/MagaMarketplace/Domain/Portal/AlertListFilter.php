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

}
