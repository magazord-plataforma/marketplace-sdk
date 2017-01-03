<?php

namespace MagaMarketplace;

/**
 * Description of OrderSender
 *
 * @author Maicon Sasse
 */
class OrderSender extends AbstractSender
{

    /**
     * Envio do pedido para o marketplace (ADM)
     * @param Domain\Order\Order $order
     * @return Domain\Order\OrderResponse|Domain\Error
     */
    public function post(Domain\Order\Order $order)
    {
        $this->reset();
        $this->setMethod(self::METHOD_POST);
        $this->setResponse(new Domain\Order\OrderResponse());
        return $this->send('/orders', $order);
    }

    /**
     * Consulta de pedidos
     * @param Domain\Filter\OrderListFilter $filter
     * @return Domain\Order\OrderListResponse|Domain\Error
     */
    public function getList(Domain\Filter\OrderListFilter $filter)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Order\OrderListResponse());
        return $this->send('/orders', null, (array) $filter->serialize());
    }

    /**
     * Consulta de pedido por id
     * @param string $id
     * @return Domain\Order\Order|Domain\Error
     */
    public function get($id)
    {
        $this->reset();
        $this->setMethod(self::METHOD_GET);
        $this->setResponse(new Domain\Order\Order());
        return $this->send('/orders/' . $id);
    }

    /**
     * Atualização status do pedido para aprovado (ADM)
     * @param string $id
     * @param Domain\Order\Approved $tracking
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putApproved($id, Domain\Order\Approved $tracking)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/orders/' . $id . '/approved', $tracking);
    }

    /**
     * Atualização status do pedido para cancelado
     * @param string $id
     * @param Domain\Order\Canceled $tracking
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putCanceled($id, Domain\Order\Canceled $tracking)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/orders/' . $id . '/canceled', $tracking);
    }

    /**
     * Atualização status do pedido para enviado
     * @param string $id
     * @param Domain\Order\Shipping $tracking
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putShipped($id, Domain\Order\Shipping $tracking)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/orders/' . $id . '/shipped', $tracking);
    }

    /**
     * Atualização status do pedido para entregue
     * @param string $id
     * @param Domain\Order\Delivery $tracking
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putDelivered($id, Domain\Order\Delivery $tracking)
    {
        $this->reset();
        $this->setMethod(self::METHOD_PUT);
        $this->setResponse(new Domain\AbstractModel());
        return $this->send('/orders/' . $id . '/delivered', $tracking);
    }

    /**
     * Atualização status do pedido conforme $tracking
     * @param string $id
     * @param Domain\Order\Tracking $tracking
     * @return Domain\AbstractModel|Domain\Error
     */
    public function putStatus($id, Domain\Order\Tracking $tracking)
    {
        if ($tracking instanceof Domain\Order\Approved) {
            return $this->putApproved($id, $tracking);
        } else if ($tracking instanceof Domain\Order\Canceled) {
            return $this->putCanceled($id, $tracking);
        } else if ($tracking instanceof Domain\Order\Shipping) {
            return $this->putShipped($id, $tracking);
        } else if ($tracking instanceof Domain\Order\Delivery) {
            return $this->putDelivered($id, $tracking);
        }
    }

}
