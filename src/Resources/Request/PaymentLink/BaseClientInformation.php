<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;
use Nourelhadi\CmiPayment\Resources\Request\RequestItemInterface;

abstract class BaseClientInformation implements RequestItemInterface, XmlConverterItemRequestInterface
{
    protected ?string $name;

    protected ?string $company;

    protected ?string $street1;

    protected ?string $street2;

    protected ?string $street3;

    protected ?string $city;

    protected ?string $stateProv;

    protected ?string $postalCode;

    protected ?string $country;

    protected ?string $telVoice;

    protected ?string $telFax;

    public function __construct(array $config)
    {
        $this->initialize($config);
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getStreet1(): ?string
    {
        return $this->street1;
    }

    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    public function getStreet3(): ?string
    {
        return $this->street3;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getStateProv(): ?string
    {
        return $this->stateProv;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getTelVoice(): ?string
    {
        return $this->telVoice;
    }

    public function getTelFax(): ?string
    {
        return $this->telFax;
    }

    protected abstract function initialize(array $config);

    public function getMappingAttributes(): array
    {
        return [
            'name' => 'Name',
            'company' => 'Company',
            'street1' => 'Street1',
            'street2' => 'Street2',
            'street3' => 'Street3',
            'city' => 'City',
            'stateProv' => 'StateProv',
            'postalCode' => 'PostalCode',
            'country' => 'Country',
            'telVoice' => 'TelVoice',
            'telFax' => 'TelFax',
        ];
    }
}