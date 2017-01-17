<?php

namespace MagaMarketplace;

/**
 * Description of ItemSender
 *
 * @author Maicon Sasse
 */
class ItemSender extends AbstractSender
{

    /**
     * Envio do anúncio para o marketplace
     * @param Domain\Item\Item $item
     * @return Domain\AbstractModel|Domain\Error
     */
    public function post(Domain\Item\Item $item)
    {
        $this->reset();
        $this->setMethod(self::METHOD_POST);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/items', $item);
    }

    /**
     * Consulta de anúncios
     * @param Domain\Filter\ItemListFilter $filter
     * @return Domain\Item\ItemListResponse|Domain\Error
     */
    public function getList(Domain\Filter\ItemListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Item\ItemListResponse());
        return $this->send('/items', null, (array) $filter->serialize());
    }

    /**
     * Consulta de anúncio por id
     * @param string $id
     * @return Domain\Item\ItemResponse|Domain\Error
     */
    public function get($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Item\ItemResponse());
        return $this->send('/items/' . $id);
    }

    /**
     * Atualização cadastral do anúncio
     * @param string $id
     * @param Domain\Item\Item $item
     * @return Domain\AbstractModel|Domain\Error
     */
    public function put($id, Domain\Item\Item $item)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/items/' . $id, $item);
    }

    /**
     * Exclusão do anúncio
     * @param string $id
     * @return Domain\AbstractModel|Domain\Error
     */
    public function delete($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_DELETE);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/items/' . $id);
    }

    /**
     * Atualização status do anúncio (ADM)
     * @param string $id
     * @param Domain\Item\Status $status
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putStatus($id, Domain\Item\Status $status)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/items/' . $id . '/status', $status);
    }

    /**
     * Atualização do preço do anúncio
     * @param string $id
     * @param \MagaMarketplace\Domain\Item\Price $price
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putPrice($id, Domain\Item\Price $price)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel);
        return $this->send('/items/' . $id . '/price', $price);
    }

    /**
     * Consulta de preço do anúncio por id
     * @param string $id
     * @return Domain\Item\Price|Domain\Error
     */
    public function getPrice($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Item\Price());
        return $this->send('/items/' . $id . '/price');
    }

    /**
     * Atualização do Estoque do anúncio (baseado no estoque total)
     * @param string $id
     * @param \MagaMarketplace\Domain\Item\Stock $stock
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putStock($id, Domain\Item\Stock $stock)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel);
        return $this->send('/items/' . $id . '/stock', $stock);
    }

    /**
     * Versão alternativa de putStock
     * Atualização do Estoque do anúncio (baseado no estoque disponível)
     * @param string $id
     * @param \MagaMarketplace\Domain\Item\StockAvailable $stock
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putStockAvailable($id, Domain\Item\StockAvailable $stock)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel);
        return $this->send('/items/' . $id . '/stockAvailable', $stock);
    }

    /**
     * Consulta de estoque do anúncio por id
     * @param string $id
     * @return Domain\Item\StockResponse|Domain\Error
     */
    public function getStock($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Item\StockResponse());
        return $this->send('/items/' . $id . '/stock');
    }

    /**
     * Atualização da situação do anúncio
     * @param string $id
     * @param Domain\Item\Active $active
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putActive($id, Domain\Item\Active $active)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel);
        return $this->send('/items/' . $id . '/active', $active);
    }

    /**
     * Consulta de estoque do anúncio por id
     * @param string $id
     * @return Domain\Item\Active|Domain\Error
     */
    public function getActive($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Item\Active());
        return $this->send('/items/' . $id . '/active');
    }

}
