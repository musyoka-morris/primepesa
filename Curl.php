<?php

namespace primepesa;


abstract class Curl
{
    private static $endPoint = 'https://www.primepesa.com/api?';

    /**
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public static function execute(array $params)
    {
        $url = self::$endPoint.http_build_query($params);
        $headers = array('Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $errorCode = curl_errno($ch);
        $errorMsg = curl_error($ch);
        curl_close($ch);

        if ( $errorCode ) {
            throw new \Exception($errorCode, $errorMsg);
        }

        return json_decode($result, true);
    }

}
