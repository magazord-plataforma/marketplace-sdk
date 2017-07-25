<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Mensagem do protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class MessageResponse extends NewMessage
{

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Data/hora. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

}
