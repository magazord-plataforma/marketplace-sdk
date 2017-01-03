# Marketplace Magazord SDK 

SDK PHP de integração com a API do marketplace da plataforma [Magazord](http://www.magazord.com.br)

## Instalação

Disponível via [Composer](https://packagist.org/packages/magazord-plataforma/marketplace-sdk). 

## Uso

### Envio do anúncio para o marketplace (POST /items)

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

### Consulta de anúncios (GET /items)

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

### Consulta de anúncio por id (GET /items/{id})

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

### Atualização do preço do anúncio (PUT /items/{id}/price)

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

### Atualização do Estoque do anúncio (PUT /items/{id}/stock)

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

### Ativar/desativar anúncio (PUT /items/{id}/active)

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
