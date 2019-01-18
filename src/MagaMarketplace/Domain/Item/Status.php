<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Description of Status
 *
 * @author Maicon Sasse
 */
class Status extends Domain\AbstractModel
{

    /**
     * Status. (pending, approved, rejected, selling)
     * @var string
     */
    protected $status;

    /**
     * Observação sobre o status
     * @var string
     */
    protected $statusDescription;

    /**
     * Links de acesso
     * @var ItemLink[]
     */
    protected $links;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'links' => '\\MagaMarketplace\\Domain\\Item\\ItemLink'
    );

    public function getStatus()
    {
        return $this->status;
    }

    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks(array $links = null)
    {
        $this->links = $links;
    }

}
