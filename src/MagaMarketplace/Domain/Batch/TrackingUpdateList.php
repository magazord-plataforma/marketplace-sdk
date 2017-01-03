<?php

namespace MagaMarketplace\Domain\Batch;

use \MagaMarketplace\Domain;

/**
 * Description of TrackingUpdateList
 *
 * @author Maicon Sasse
 */
class TrackingUpdateList extends Domain\AbstractModel
{

    /**
     * Itens modificados
     * @var TrackingUpdate[]
     */
    protected $changes;

    /**
     * Erro ocorrido durante a atualização
     * @var Domain\Error
     */
    protected $error;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'changes' => '\\MagaMarketplace\\Domain\\Batch\\TrackingUpdate',
        'error' => '\\MagaMarketplace\\Domain\\Error'
    );

    /**
     * @return TrackingUpdate[]
     */
    public function getChanges()
    {
        return $this->defaultValue($this->changes, array());
    }

    public function setChanges(array $changes = null)
    {
        $this->changes = $changes;
    }

    public function add(TrackingUpdate $item)
    {
        $list = ($this->getChanges()) ? $this->getChanges() : array();
        $list[] = $item;
        $this->setChanges($list);
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError(Domain\Error $error = null)
    {
        $this->error = $error;
    }

}
