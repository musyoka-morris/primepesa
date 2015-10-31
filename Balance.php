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
 * Class for checking account balance
 */
class Balance extends Base
{

    private $result = array();

    /**
     * @throws PrimePesaException
     * @throws \Exception
     */
    public function execute()
    {
        $params = array();
        $params['cmd'] = 'balance';
        $params['secret_key'] = $this->getSecretKey();
        $result = Curl::execute($params);
        $this->_assertNotError($result);
        $this->result = $result;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getResult()
    {
        $this->_assertExecuted();
        return $this->result;
    }


    /**
     * @return double
     * @throws \Exception
     */
    public function getAmount()
    {
        return $this->_get('amount');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getCurrency()
    {
        return $this->_get('currency');
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    private function _get($key)
    {
        $this->_assertExecuted();
        return $this->result[$key];
    }

    /**
     * @throws \Exception
     */
    private function _assertExecuted()
    {
        $res = $this->result;
        if ( !is_array($res) || empty($res) ) {
            throw new \Exception('Balance not requested');
        }
    }
}
