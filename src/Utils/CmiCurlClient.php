<?php

namespace Nourelhadi\CmiPayment\Utils;

class CmiCurlClient implements CmiHttpClientInterface
{
    public function sendRequest(string $url, $postField): ?string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $postField,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: text/xml"
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            return curl_error($curl);
        }

        curl_close($curl);

        return $response;
    }
}