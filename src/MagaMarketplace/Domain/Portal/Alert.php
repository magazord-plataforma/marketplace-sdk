<?php

namespace MagaMarketplace\Domain\Portal;

use \MagaMarketplace\Domain;

/**
 * Description of Alert
 *
 * @author Maicon Sasse
 */
class Alert extends Domain\AbstractModel
{

    const TYPE_BOX = 'box';
    const TYPE_POPUP = 'popup';

    protected $id;
    protected $dateCreated;
    protected $type;
    protected $title;
    protected $description;
    protected $beginDate;
    protected $endDate;
    protected $days;
    protected $sellerId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getBeginDate()
    {
        return $this->beginDate;
    }

    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function setDays(array $days = null)
    {
        $this->days = $this->arrayIntValue($days);
    }

    protected function arrayIntValue(array $values = null)
    {
        if ($values) {
            $result = array();
            foreach ($values as $value) {
                $result[] = $this->intValue($value);
            }
            return $result;
        } else {
            return null;
        }
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setSellerId(array $sellerId = null)
    {
        $this->sellerId = $this->arrayIntValue($sellerId);
    }

}
