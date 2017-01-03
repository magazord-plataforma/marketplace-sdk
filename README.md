# Marketplace Magazord SDK 

SDK PHP de integração com a API do marketplace da plataforma [Magazord](http://www.magazord.com.br)

## Instalação

Disponível via [Composer](https://packagist.org/packages/magazord-plataforma/marketplace-sdk). 

## Uso

### Anúncios (/items)

#### Envio do anúncio para o marketplace (POST /items)

```PHP
// Criar o objeto de envio
$sender = new \MagaMarketplace\ItemSender($endpoint, $user, $password);

// Criar o objeto com os dados do anúncio
$item = new \MagaMarketplace\Domain\Item\Item();
$item->setId('XT1580-PRETO');
$item->setTitle('Smartphone Motorola Moto X Force XT1580 Desbloqueado Preto');
$item->setBrand('Motorola');
$item->setCategory('Smartphone');
$item->setDescription('Feito para quem procura poder e exclusividade, o Motorola Moto X Force XT1580 chegou para conquistar um mundo de fãs...');
$item->setDimensions(new \MagaMarketplace\Domain\Item\Dimension());
$item->getDimensions()->setHeight(15.00);
$item->getDimensions()->setLength(0.90);
$item->getDimensions()->setWidth(7.80);
$item->setWeight(0.169);
$item->setEan('7892597338238');
$item->setStock(new \MagaMarketplace\Domain\Item\Stock());
$item->getStock()->setQuantity(10);
$item->setImages(array(
    'https://d2yd0u3irqwx65.cloudfront.net/img/2015/12/produto/25671/19/large/moto-x-force-xt1580-preto.jpg',
    'https://d2yd0u3irqwx65.cloudfront.net/img/2015/12/produto/25675/19/large/traseira-motorola-moto-x-force-xt1580-preto.jpg'
));
$item->setVideos(array());
$item->addAttribute('SO', 'Android');
$item->addAttribute('SO Versão', '6.0');
$item->addAttribute('Câmera Frontal', '5MP');
$item->addAttribute('Câmera', '21MP');
$item->setPrice(new \MagaMarketplace\Domain\Item\Price());
$item->getPrice()->setDefault(2499.99);
$item->getPrice()->setSale(1999.99);
$item->setProductId('8030');
$item->addVariation('Cor', 'Preto');
$item->setWarranty('1 ano');
$item->setActive(true);

// Realizando o envio
$response = $sender->post($item);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Consulta de anúncios (GET /items)

```PHP
// Criar o objeto de envio
$sender = new \MagaMarketplace\ItemSender($endpoint, $user, $password);

// Criar o objeto com os filtros da consulta
$filter = new \MagaMarketplace\Domain\Filter\ItemListFilter();
// Setar filtros necessários
// $filter->setStatus(\MagaMarketplace\Domain\Item\ItemResponse::STATUS_SELLING);
// Parametros de paginação de registros
$filter->setOffset(0);
$filter->setLimit(10);

// Realizando a consulta
$response = $sender->getList($filter);
if ($response->isSuccess()) {
    // $response é uma instancia de \MagaMarketplace\Domain\Item\ItemListResponse
    echo 'Sucesso! <br>';
    foreach ($response->getList() as $itemResponse) {
        echo $itemResponse->getId() . ' - ' . $itemResponse->getTitle() . '<br>';
    }
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Consulta de anúncio por id (GET /items/{id})

```PHP
// Criar o objeto de envio
$sender = new \MagaMarketplace\ItemSender($endpoint, $user, $password);
// Realizando a consulta
$response = $sender->get('XT1580-PRETO');
if ($response->isSuccess()) {
    // $response é uma instancia de \MagaMarketplace\Domain\Item\ItemResponse
    echo 'Sucesso! ' . $response->getTitle() . '<br>';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}

```

#### Atualização do preço do anúncio (PUT /items/{id}/price)

```PHP
$price = new \MagaMarketplace\Domain\Item\Price();
$price->setDefault(2499.99);
$price->setSale(2199.99);
$response = $sender->putPrice('XT1580-PRETO', $price);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Atualização do Estoque do anúncio (PUT /items/{id}/stock)

```PHP
$stock = new \MagaMarketplace\Domain\Item\Stock();
$stock->setQuantity(20);
$response = $sender->putStock('XT1580-PRETO', $stock);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Ativar/desativar anúncio (PUT /items/{id}/active)

```PHP
$active = new \MagaMarketplace\Domain\Item\Active();
$active->setActive(true);
$response = $sender->putActive('XT1580-PRETO', $active);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

### Pedidos (/orders)

#### Criar pedido no marketplace (POST /orders) (Somente SANDBOX)

```PHP
// Criar o objeto de envio
$sender = new \MagaMarketplace\OrderSender($endpoint, $user, $password);
// Data atual
$dateTime = new \DateTime();
// Criar o objeto com os dados do pedido
$order = new \MagaMarketplace\Domain\Order\Order();
$order->setSiteId('00120042342415');
$order->setStore('Cissa Magazine');
$order->setDateCreated($order->toDateTimeString($dateTime)); // Ex: 2017-01-03T14:09:03-02:00
$order->setClient(new \MagaMarketplace\Domain\Order\Client());
$order->getClient()->setName('Consumidor Final');
$order->getClient()->setDocumentNumber('999.999.999-99');
$order->getClient()->addPhone('47 99999999', \MagaMarketplace\Domain\Order\Telephone::TYPE_CELLPHONE);
$order->setShippingAddress(new \MagaMarketplace\Domain\Order\ShippingAddress());
$order->getShippingAddress()->setAddressType(\MagaMarketplace\Domain\Order\ShippingAddress::TYPE_RESIDENTIAL);
$order->getShippingAddress()->setReceiverName('Consumidor Final');
$order->getShippingAddress()->setReceiverPhone('47 99999999');
$order->getShippingAddress()->setStreet('Estrada da Madeira');
$order->getShippingAddress()->setNumber('1875');
$order->getShippingAddress()->setAdditionalInfo('Magamobi');
$order->getShippingAddress()->setNeighborhood('Barragem');
$order->getShippingAddress()->setCity('Rio do Sul');
$order->getShippingAddress()->setZipcode(89165063);
$order->getShippingAddress()->setState('SC');
$orderItem = new \MagaMarketplace\Domain\Order\OrderItem();
$orderItem->setItem(\MagaMarketplace\Domain\Link::itemsLink('XT1580-PRETO'));
$orderItem->setQuantity(2);
$orderItem->setPrice(1999.99);
$orderItem->setStatus(\MagaMarketplace\Domain\Order\Order::STATUS_NEW);
$orderItem->setTotal($orderItem->getPrice() * $orderItem->getQuantity());
$order->addItem($orderItem);
$order->setFreight(14.99);
$order->setTotalAmount($order->getFreight() + $orderItem->getTotal());
$dateTime->modify('+6days');
$order->setEstimatedDeliveryDate($order->toDateString($dateTime));
$order->setShippingService('PAC');
// Enviar
$response = $sender->post($order);
if ($response->isSuccess()) {
    // $response é uma instancia de \MagaMarketplace\Domain\Order\OrderResponse
    echo 'Sucesso! Número pedido ' . $response->getId();
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Consulta de pedidos (GET /orders)

```PHP
// Criar o objeto de envio
$sender = new \MagaMarketplace\OrderSender($endpoint, $user, $password);

// Criar o objeto com os filtros da consulta
$filter = new \MagaMarketplace\Domain\Filter\OrderListFilter();
// Setar filtros necessários
//$filter->setStatus(\MagaMarketplace\Domain\Order\OrderResponse::STATUS_APPROVED);
// Parametros de paginação de registros
$filter->setOffset(0);
$filter->setLimit(10);

// Realizando a consulta
$response = $sender->getList($filter);
if ($response->isSuccess()) {
    // $response é uma instancia de \MagaMarketplace\Domain\Order\OrderListResponse
    echo 'Sucesso! <br>';
    foreach ($response->getList() as $orderResponse) {
        echo $orderResponse->getId() . ' - ' . $orderResponse->getClient()->getName() . '<br>';
    }
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Consulta de pedido por id (GET /orders/{id})

```PHP
$orderId = '67';
// Criar o objeto de envio
$sender = new \MagaMarketplace\OrderSender($endpoint, $user, $password);
// Realizando a consulta
$response = $sender->get($orderId);
if ($response->isSuccess()) {
    // $response é uma instancia de \MagaMarketplace\Domain\Order\OrderResponse
    echo 'Sucesso! ' . $response->getClient()->getName() . '<br>';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Atualização status do pedido para aprovado (PUT /orders/{id}/approved) (Somente SANDBOX)

```PHP
$sender = new \MagaMarketplace\OrderSender($endpoint, $user, $password);

$tracking = new \MagaMarketplace\Domain\Order\Approved();
$tracking->addItem('XT1580-PRETO', 2);
$tracking->setEventDate($tracking->toDateTimeString(new \DateTime()));
$response = $sender->putApproved($orderId, $tracking);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Atualização status do pedido para enviado/em transporte (PUT /orders/{id}/shipped) 

```PHP
$tracking = new \MagaMarketplace\Domain\Order\Shipping();
$tracking->addItem('XT1580-PRETO', 2);
$tracking->setEventDate($tracking->toDateTimeString(new \DateTime()));
$tracking->setCarrier(new \MagaMarketplace\Domain\Order\Carrier());
$tracking->getCarrier()->setName('Correios');
$tracking->setTrackingNumber('PN424048589BR');
$tracking->setInvoice(new \MagaMarketplace\Domain\Order\Invoice());
$tracking->getInvoice()->setNumber(123456);
$tracking->getInvoice()->setLine('1');
$tracking->getInvoice()->setIssueDate($tracking->getEventDate());
$tracking->getInvoice()->setAccessKey('42160412687276000179550010005396501000415050');

$response = $sender->putShipped($orderId, $tracking);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Atualização status do pedido para entregue (PUT /orders/{id}/delivered)

```PHP
$tracking = new \MagaMarketplace\Domain\Order\Delivery();
$tracking->addItem('XT1580-PRETO', 2);
$tracking->setEventDate($tracking->toDateTimeString(new \DateTime()));

$response = $sender->putDelivered($orderId, $tracking);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```

#### Atualização status do pedido para cancelado (PUT /orders/{id}/canceled)

```PHP
$tracking = new \MagaMarketplace\Domain\Order\Canceled();
$tracking->addItem('XT1580-PRETO', 2);
$tracking->setEventDate($tracking->toDateTimeString(new \DateTime()));
$tracking->setReason('Solicitado pelo cliente');

$response = $sender->putCanceled($orderId, $tracking);
if ($response->isSuccess()) {
    echo 'Sucesso!';
} else {
    // $response é uma instancia de \MagaMarketplace\Domain\Error
    echo 'Erro:' . $response;
}
```
