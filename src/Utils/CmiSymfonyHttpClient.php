<?php

namespace Nourelhadi\CmiPayment\Utils;

class CmiSymfonyHttpClient implements CmiHttpClientInterface
{
    public function sendRequest(string $url, $postField): ?string
    {
        return 'a string from http client symfony';
    }
}