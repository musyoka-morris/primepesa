<?php

namespace primepesa;

class IPNNotification extends Base
{

    private $data = array();

    /**
     * primepesa\IPNNotification constructor.
     * @param string $secretKey
     */
    public function __construct($secretKey)
    {
        parent::__construct($secretKey);
        $rawData = file_get_contents("php://input");
        $this->data = json_decode($rawData, true);
    }

    /**
     * @return bool
     * @throws PrimePesaException
     * @throws \Exception
     */
    public function isAuthentic()
    {
        $params = array();
        $params['cmd'] = 'verify';
        $params['secret_key'] = $this->getSecretKey();
        $params = array_merge($params, $this->data);
        $results = Curl::execute($params);
        $this->_assertNotError($results);
        return $results['status'] == 'VERIFIED';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}
