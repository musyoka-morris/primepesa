<?php

namespace primepesa;


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
