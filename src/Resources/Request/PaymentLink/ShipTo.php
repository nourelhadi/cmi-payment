<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

class ShipTo extends BaseClientInformation
{
    protected function initialize(array $config)
    {
        $this->name = $config['ship_to.name'] ?? null;
        $this->company = $config['ship_to.company'] ?? null;
        $this->street1 = $config['ship_to.street1'] ?? null;
        $this->street2 = $config['ship_to.street2'] ?? null;
        $this->street3 = $config['ship_to.street3'] ?? null;
        $this->city = $config['ship_to.city'] ?? null;
        $this->stateProv = $config['ship_to.stateProv'] ?? null;
        $this->postalCode = $config['ship_to.postalCode'] ?? null;
        $this->country = $config['ship_to.country'] ?? null;
        $this->telVoice = $config['ship_to.telVoice'] ?? null;
        $this->telFax = $config['ship_to.telFax'] ?? null;
    }

    public function getTag(): ?string
    {
        return 'ShipTo';
    }
}