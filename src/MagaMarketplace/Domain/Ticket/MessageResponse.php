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

    /**
     * Status do atendimento no momento da resposta
     * @var string
     */
    protected $status;

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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
