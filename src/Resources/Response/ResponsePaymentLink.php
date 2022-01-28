<?php

namespace Nourelhadi\CmiPayment\Resources\Response;

class ResponsePaymentLink implements ResponsePaymentInterface
{
    private string $responseContent;

    private bool $isSuccessful;

    private string $message;

    private ?string $paymentUrl;

    private ?string $paymentToken;

    private function __construct(string $responseContent, bool $isSuccessful, string $message, ?string $paymentUrl = null, ?string $paymentToken = null)
    {
        $this->responseContent = $responseContent;
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->paymentUrl = $paymentUrl;
        $this->paymentToken = $paymentToken;
    }

    public static function fromClient(string $xmlResponse): self
    {
        $xmlObject = new \SimpleXMLElement($xmlResponse);

        if (!isset($xmlObject->Response) || $xmlObject->Response != 'Approved'
            || !isset($xmlObject->ErrMsg) || !empty($xmlObject->ErrMsg)
        ) {
            $message = $xmlObject->ErrMsg ?? $xmlObject->Extra->ERRORCODE ?? 'Failed';

            return new self($xmlResponse, false, $message);
        }

        return new self($xmlResponse, true, $xmlObject->Response, $xmlObject->Extra->PAYMENTLINKURL, $xmlObject->Extra->PAYMENTLINKTOKEN);
    }

    public function getResponseContent(): string
    {
        return $this->responseContent;
    }

    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getPaymentUrl(): ?string
    {
        return $this->paymentUrl;
    }

    public function getPaymentToken(): ?string
    {
        return $this->paymentToken;
    }
}