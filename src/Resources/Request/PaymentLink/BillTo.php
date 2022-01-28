<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

class BillTo extends BaseClientInformation
{
    protected function initialize(array $config)
    {
        $this->name = $config['bill_to.name'] ?? null;
        $this->company = $config['bill_to.company'] ?? null;
        $this->street1 = $config['bill_to.street1'] ?? null;
        $this->street2 = $config['bill_to.street2'] ?? null;
        $this->street3 = $config['bill_to.street3'] ?? null;
        $this->city = $config['bill_to.city'] ?? null;
        $this->stateProv = $config['bill_to.state_prov'] ?? null;
        $this->postalCode = $config['bill_to.postal_code'] ?? null;
        $this->country = $config['bill_to.country'] ?? null;
        $this->telVoice = $config['bill_to.tel_voice'] ?? null;
        $this->telFax = $config['bill_to.tel_fax'] ?? null;
    }

    public function getTag(): ?string
    {
        return 'BillTo';
    }
}