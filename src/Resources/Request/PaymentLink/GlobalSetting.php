<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;

class GlobalSetting implements XmlConverterItemRequestInterface
{
    public const DEFAULT_TYPE = 'PreAuth';

    public const DEFAULT_CURRENCY = '504';

    private string $name;

    private string $password;

    private string $clientId;

    private ?string $orderId;

    private ?string $groupId;

    private ?string $total;

    private string $type = self::DEFAULT_TYPE;

    private string $currency = self::DEFAULT_CURRENCY;

    public function __construct(array $config)
    {
        $this->initialize($config);
    }

    private function initialize(array $config)
    {
        $this->name = $config['global_setting.name'] ?? null;
        $this->password = $config['global_setting.password'] ?? null;
        $this->clientId = $config['global_setting.client_id'] ?? null;
        $this->orderId = $config['global_setting.order_id'] ?? null;
        $this->groupId = $config['global_setting.group_id'] ?? null;
        $this->total = $config['global_setting.total'] ?? 0;
    }

    public function getMappingAttributes(): array
    {
        return [
            'name' => 'Name',
            'password' => 'Password',
            'clientId' => 'ClientId',
            'orderId' => 'OrderId',
            'groupId' => 'GroupId',
            'type' => 'Type',
            'total' => 'Total',
            'currency' => 'Currency',
        ];
    }

    public function getTag(): ?string
    {
        return '';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}