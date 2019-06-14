<?php

namespace MagaMarketplace;

/**
 * Description of TicketSender
 *
 * @author Maicon Sasse
 */
class TicketSender extends AbstractSender
{

    /**
     * Cria um novo atendimento no marketplace
     * @param Domain\Ticket\NewTicket $newTicket
     * @return Domain\Link|Domain\Error
     */
    public function post(Domain\Ticket\NewTicket $newTicket)
    {
        $this->reset();
        $this->setMethod(self::METHOD_POST);
        $this->setResponse(new Domain\Link());
        return $this->send('/tickets', $newTicket);
    }

    /**
     * Consulta de atendimentos
     * @param Domain\Filter\TicketListFilter $filter
     * @return Domain\Ticket\TicketListResponse|Domain\Error
     */
    public function getList(Domain\Filter\TicketListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Ticket\TicketListResponse());
        return $this->send('/tickets', null, (array) $filter->serialize());
    }

    /**
     * Consulta de atendimento por id
     * @param string $id
     * @return Domain\Ticket\TicketResponse|Domain\Error
     */
    public function get($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Ticket\TicketResponse());
        return $this->send('/tickets/' . $id);
    }

    /**
     * Adiciona uma nova mensagem ao atendimento no marketplace
     * @param string $id
     * @param \MagaMarketplace\Domain\Ticket\NewMessage $message
     * @return Domain\Ticket\MessageResponse|Domain\Error
     */
    public function postMessage($id, Domain\Ticket\NewMessage $message)
    {
        $this->reset();
        $this->setMethod(self::METHOD_POST);
        $this->setResponse(new Domain\Ticket\MessageResponse());
        return $this->send('/tickets/' . $id . '/messages', $message);
    }

    /**
     * Consulta de um anexo do atendimento
     * @param int $ticketId
     * @param int $attachmentId
     * @return Domain\Ticket\Attachment
     */
    public function getAttachment($ticketId, $attachmentId)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Ticket\Attachment());
        return $this->send('/tickets/' . $ticketId . '/attachments/' . $attachmentId);
    }
}