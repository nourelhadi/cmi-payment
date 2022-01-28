<?php

namespace Nourelhadi\CmiPayment\Resources\Request\PaymentLink;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;
use Nourelhadi\CmiPayment\Resources\Request\RequestItemInterface;

class Extra implements XmlConverterItemRequestInterface
{
    public const SINGLE_TYPE_PAYMENT_LINK = 'SINGLE_LINK_PAYMENT';

    public const MULTIPLE_TYPE_PAYMENT_LINK = 'MULTIPLE_LINK_PAYMENT';

    public const DEFAULT_EXPIRY = '3';

    public const DEFAULT_EXPIRY_UNIT = 'D';

    public const DEFAULT_LANGUAGE = 'en';

    private const AVAILABLE_VALUES_EXPIRY_UNIT = ['D', 'W']; // D for Day : W for Week

    private ?string $paymentLinkType;

    private ?string $paymentLinkExpiry = '3';

    private ?string $paymentLinkExpiryUnit = 'D';

    private ?string $paymentLinkLanguage;

    private ?string $paymentLinkAmountEditable;

    private ?string $paymentLinkCustomerPhoneEditable;

    private ?string $paymentLinkItemEditable;

    private ?string $paymentLinkCustomerNameEditable;

    private ?string $paymentLinkAddressEditable;

    private ?string $paymentLinkDescriptionEditable;

    private ?string $paymentLinkCustomerEmailEditable;

    public function __construct(array $config)
    {
        $this->initialize($config);
    }

    private function initialize(array $config)
    {
        $this->paymentLinkType = $config['extra.payment_link_type'] ?? self::SINGLE_TYPE_PAYMENT_LINK;
        $this->paymentLinkExpiry = $config['extra.payment_link_expiry'];

        if (isset($config['extra.payment_link_expiry_unit']) && in_array($config['extra.payment_link_expiry_unit'], self::AVAILABLE_VALUES_EXPIRY_UNIT)) {
            $this->paymentLinkExpiryUnit = $config['extra.payment_link_expiry_unit'];
        }

        $this->paymentLinkLanguage = $config['extra.payment_link_language'] ?? self::DEFAULT_LANGUAGE;
        $this->paymentLinkAmountEditable = $config['extra.payment_link_amount_editable'] ?? null;
        $this->paymentLinkCustomerPhoneEditable = $config['extra.payment_link_customer_editable'] ?? null;
        $this->paymentLinkItemEditable = $config['extra.payment_link_item_editable'] ?? null;
        $this->paymentLinkCustomerNameEditable = $config['extra.payment_link_customer_name_editable'] ?? null;
        $this->paymentLinkAddressEditable = $config['extra.payment_link_address_editable'] ?? null;
        $this->paymentLinkDescriptionEditable = $config['extra.payment_link_description_editable'] ?? null;
        $this->paymentLinkCustomerEmailEditable = $config['extra.payment_link_customer_email_editable'] ?? null;
    }

    public function getPaymentLinkType(): ?string
    {
        return $this->paymentLinkType;
    }

    public function getPaymentLinkExpiry(): ?string
    {
        return $this->paymentLinkExpiry;
    }

    public function getPaymentLinkExpiryUnit(): ?string
    {
        return $this->paymentLinkExpiryUnit;
    }

    public function getPaymentLinkLanguage(): ?string
    {
        return $this->paymentLinkLanguage;
    }

    public function getPaymentLinkAmountEditable(): ?string
    {
        return $this->paymentLinkAmountEditable;
    }

    public function getPaymentLinkCustomerPhoneEditable(): ?string
    {
        return $this->paymentLinkCustomerPhoneEditable;
    }

    public function getPaymentLinkItemEditable(): ?string
    {
        return $this->paymentLinkItemEditable;
    }

    public function getPaymentLinkCustomerNameEditable(): ?string
    {
        return $this->paymentLinkCustomerNameEditable;
    }

    public function getPaymentLinkAddressEditable(): ?string
    {
        return $this->paymentLinkAddressEditable;
    }

    public function getPaymentLinkDescriptionEditable(): ?string
    {
        return $this->paymentLinkDescriptionEditable;
    }

    public function getPaymentLinkCustomerEmailEditable(): ?string
    {
        return $this->paymentLinkCustomerEmailEditable;
    }

    public function getMappingAttributes(): array
    {
        return [
            'paymentLinkType' => 'PAYMENTLINKTYPE',
            'paymentLinkExpiry' => 'PAYMENTLINKEXPIRY',
            'paymentLinkExpiryUnit' => 'PAYMENTLINKEXPIRYUNIT',
            'paymentLinkLanguage' => 'PAYMENTLINKLANGUAGE',
            'paymentLinkAmountEditable' => 'PAYMENTLINKAMOUNT_EDITABLE',
            'paymentLinkCustomerPhoneEditable' => 'PAYMENTLINKCUSTOMERPHONEEDITABLE',
            'paymentLinkItemEditable' => 'PAYMENTLINKITEMIDEDITABLE',
            'paymentLinkCustomerNameEditable' => 'PAYMENTLINKCUSTOMERNAMEEDITABLE',
            'paymentLinkAddressEditable' => 'PAYMENTLINKADDRESS_EDITABLE',
            'paymentLinkDescriptionEditable' => 'PAYMENTLINKITEMDESCRIPTIONEDITABLE',
            'paymentLinkCustomerEmailEditable' => 'PAYMENTLINKCUSTOMEREMAILEDITABLE',
        ];
    }

    public function getTag(): ?string
    {
        return 'Extra';
    }
}