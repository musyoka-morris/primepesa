<?php

namespace primepesa;


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
