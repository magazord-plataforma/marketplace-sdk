<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Description of TicketStatistics
 * @author Lucas Felicio Adriano
 */
class TicketStatistics extends Domain\ListResponse
{

    protected $opened;
    protected $in_progress;
    protected $answered;
    protected $closed;
    protected $total;

    public function getOpened()
    {
        return $this->opened;
    }

    public function getIn_progress()
    {
        return $this->in_progress;
    }

    public function getAnswered()
    {
        return $this->answered;
    }

    public function getClosed()
    {
        return $this->closed;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setOpened($opened)
    {
        $this->opened = $opened;
    }

    public function setIn_progress($in_progress)
    {
        $this->in_progress = $in_progress;
    }

    public function setAnswered($answered)
    {
        $this->answered = $answered;
    }

    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}