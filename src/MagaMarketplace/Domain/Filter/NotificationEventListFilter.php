<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Description of NotificationEventListFilter
 *
 * @author Maicon Sasse
 */
class NotificationEventListFilter extends ListFilter
{

    protected $dateCreated;
    protected $sellerId;
    protected $status;
    protected $toType;
    protected $to;
    protected $resourceRel;
    protected $resourceId;
    protected $resourceStatus;
    protected $response;

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getToType()
    {
        return $this->toType;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getResourceRel()
    {
        return $this->resourceRel;
    }

    public function getResourceId()
    {
        return $this->resourceId;
    }

    public function getResourceStatus()
    {
        return $this->resourceStatus;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

    public function setStatus($status)
    {
        $this->status = $this->intValue($status);
    }

    public function setToType($toType)
    {
        $this->toType = $this->intValue($toType);
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setResourceRel($resourceRel)
    {
        $this->resourceRel = $resourceRel;
    }

    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    public function setResourceStatus($resourceStatus)
    {
        $this->resourceStatus = $resourceStatus;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

}
