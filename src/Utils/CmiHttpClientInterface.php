<?php

namespace Nourelhadi\CmiPayment\Utils;

interface CmiHttpClientInterface
{
    /**
     * @param string $url
     * @param array|string $postField
     * @return string|null
     */
    public function sendRequest(string $url, $postField): ?string;
}