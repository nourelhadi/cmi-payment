<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;
use Nourelhadi\CmiPayment\Resources\Request\RequestItemInterface;

class OrderItem implements RequestItemInterface, XmlConverterItemRequestInterface
{
    private ?string $itemId;

    private ?string $itemNumber;

    private ?string $productCode;

    private ?string $description;

    private ?string $quantity;

    private ?string $price;

    private ?string $total;

    public function __construct(array $params)
    {
        $this->initialize($params);
    }

    private function initialize(array $params)
    {
        $this->itemId = $params['itemId'] ?? null;
        $this->itemNumber = $params['itemNumber'] ?? null;
        $this->productCode = $params['productCode'] ?? null;
        $this->description = $params['description'] ?? null;
        $this->quantity = $params['quantity'] ?? null;
        $this->price = $params['price'] ?? null;
        $this->total = $params['total'] ?? null;
    }

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(?string $itemId): OrderItem
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getItemNumber(): ?string
    {
        return $this->itemNumber;
    }

    public function setItemNumber(?string $itemNumber): OrderItem
    {
        $this->itemNumber = $itemNumber;
        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): OrderItem
    {
        $this->productCode = $productCode;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): OrderItem
    {
        $this->description = $description;
        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): OrderItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): OrderItem
    {
        $this->price = $price;
        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): OrderItem
    {
        $this->total = $total;
        return $this;
    }

    public function getTag(): ?string
    {
        return 'OrderItem';
    }

    public function getMappingAttributes(): array
    {
        return [
            'itemId' => 'Id',
            'itemNumber' => 'ItemNumber',
            'productCode' => 'ProductCode',
            'description' => 'Desc',
            'quantity' => 'Qty',
            'price' => 'Price',
            'Total' => 'Total'
        ];
    }
}