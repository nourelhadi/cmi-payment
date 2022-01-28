<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;
use Nourelhadi\CmiPayment\Resources\Request\RequestItemInterface;

class OrderItemList implements XmlConverterItemRequestInterface
{
    /**
     * @var array<OrderItem>|[]
     */
    private ?array $orderItems = [];

    public function addOrderItem(OrderItem $orderItem): self
    {
        $this->orderItems[] = $orderItem;

        return $this;
    }

    public function setOrderItems(array $orderItems): self
    {
        $this->orderItems = $orderItems;

        return $this;
    }

    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    public function getTag(): ?string
    {
        return 'OrderItemList';
    }

    public function getMappingAttributes(): array
    {
        return [
            'orderItems' => 'OrderItem',
        ];
    }
}