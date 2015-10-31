<?php

/**
 * Copyright 2015 PrimePesa.
 * https://www.primepesa.com
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * PrimePesa.
 *
 * As with any software that integrates with the PrimePesa platform, your use
 * of this software is subject to the PrimePesa Developer Principles and
 * Policies. This copyright notice shall be included in all copies or 
 * substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */
 
 
namespace primepesa;

/**
 * Helper class to execute curl requests
 */
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
