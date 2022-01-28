<?php

namespace Nourelhadi\CmiPayment;

use Nourelhadi\CmiPayment\Converter\XmlConverterItemRequestInterface;
use Nourelhadi\CmiPayment\Converter\XmlConverterTrait;
use Nourelhadi\CmiPayment\Resources\Request\PaymentLink\Extra;
use Nourelhadi\CmiPayment\Resources\Request\PaymentLink\GlobalSetting;
use Nourelhadi\CmiPayment\Resources\Request\RequestItemInterface;
use Nourelhadi\CmiPayment\Resources\Response\ResponsePaymentLink;
use Nourelhadi\CmiPayment\Utils\CmiHttpClientFactory;

class CmiPaymentLink implements CmiPaymentInterface
{
    use XmlConverterTrait;

    private GlobalSetting $globalSetting;

    private Extra $extra;

    private string $url;

    /** @var RequestItemInterface[]|XmlConverterItemRequestInterface[]|[] */
    private array $listRequestItems = [];

    private array $options;

    public function __construct(string $url, array $options)
    {
        $this->url = $url;
        $this->options = array_merge($this->getDefaultOptions(), $options);
    }

    public function addRequestItem(RequestItemInterface $requestItem): self
    {
        $this->listRequestItems[] = $requestItem;
        return $this;
    }

    public function send(): ResponsePaymentLink
    {
        $this->initRequest();

        $body = $this->prepareRequest();
        $httpClient = CmiHttpClientFactory::createHttpClient();
        $clientResponse = $httpClient->sendRequest($this->url, $body);

        return ResponsePaymentLink::fromClient($clientResponse);
    }

    private function getDefaultOptions(): array
    {
        return [
            'global_setting.type' => GlobalSetting::DEFAULT_TYPE,
            'global_setting.currency' => GlobalSetting::DEFAULT_CURRENCY,
            'extra.payment_link_expiry' => Extra::DEFAULT_EXPIRY,
            'extra.payment_link_expiry_unit' => Extra::DEFAULT_EXPIRY_UNIT,
            'extra.payment_link_language' => Extra::DEFAULT_LANGUAGE
        ];
    }

    private function initRequest(): void
    {
        $this->globalSetting = new GlobalSetting($this->options);
        $this->extra = new Extra($this->options);
    }

    private function prepareRequest(): string
    {
        $itemGlobalSetting = $this->convert($this->globalSetting);
        $itemExtra = $this->convert($this->extra);

        $chains = '';
        foreach ($this->listRequestItems as $requestItem) {
            if ($chain = $this->convert($requestItem)) {
                $chains .= $chain;
            }
        }

        return sprintf('<CC5Request>%s%s%s</CC5Request>', $itemGlobalSetting, $chains, $itemExtra);
    }
}