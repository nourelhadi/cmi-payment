<?php

namespace Nourelhadi\CmiPayment\Utils;

class CmiHttpClientFactory
{
    public static function createHttpClient(): CmiHttpClientInterface
    {
        if (class_exists('Symfony\Component\HttpClient\HttpClient')) {
            //return new CmiSymfonyHttpClient(); // TODO
        }

        return new CmiCurlClient();
    }
}