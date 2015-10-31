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
 * Base class
 */
abstract class Base
{

    private $secretKey = "";

    /**
     * Base constructor.
     * @param string $secretKey
     */
    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    protected function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param array $result
     * @throws PrimePesaException
     */
    protected function _assertNotError(array $result)
    {
        if ( isset($result['is_error']) && $result['is_error'] ) {
            $eCode = $result['error_code'];
            $eMessage = $result['error_msg'];
            throw new PrimePesaException($eMessage, $eCode);
        }
    }
}
