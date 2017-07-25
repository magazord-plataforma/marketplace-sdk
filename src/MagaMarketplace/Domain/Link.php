<?php

namespace MagaMarketplace\Domain;

/**
 * Link/referência para um recurso específico
 *
 * @author Maicon Sasse
 */
class Link extends AbstractModel
{

    const REL_ITEM = 'items';
    const REL_ORDER = 'orders';
    const REL_TICKET = 'tickets';

    /**
     * Identificador do recurso
     * @var string
     */
    protected $id;

    /**
     * Tipo do recurso: items, orders
     * @var string
     */
    protected $rel;

    /**
     * Link para acessar o recurso
     * @var string
     */
    protected $href;

    /**
     * Descrição do recurso
     * @var string
     */
    protected $description;

    public function getId()
    {
        return $this->id;
    }

    public function getRel()
    {
        return $this->rel;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setRel($rel)
    {
        $this->rel = $rel;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    static public function itemsLink($id)
    {
        $link = new Link();
        $link->setId($id);
        $link->setRel(self::REL_ITEM);
        $link->setHref('/' . $link->getRel() . '/' . $id);
        return $link;
    }

    static public function ordersLink($id)
    {
        $link = new Link();
        $link->setId($id);
        $link->setRel(self::REL_ORDER);
        $link->setHref('/' . $link->getRel() . '/' . $id);
        return $link;
    }

    static public function ticketsLink($id)
    {
        $link = new Link();
        $link->setId($id);
        $link->setRel(self::REL_TICKET);
        $link->setHref('/' . $link->getRel() . '/' . $id);
        return $link;
    }

}
