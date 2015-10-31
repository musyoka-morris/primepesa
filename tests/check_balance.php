use primepesa\Balance;
use primepesa\PrimePesaException;


try {
    $secretKey = '59D4627DB7D04FC59B0DB043D2C635BC';
    $bal = new Balance($secretKey);
    $bal->execute();
    $myBalance = $bal->getAmount(); #Double
    $myCurrency = $bal->getCurrency(); #string - iso currency code
    /**
     * Perform your operations here
     */
} catch (PrimePesaException $e) {
    /**
     * PrimePesa servers sent back an error response
     * This is probably caused by an invalid secret key
     * @Handle the error
     */
} catch (Exception $e) {
    /**
     * An error occurred while executing curl request
     * @Handle the exception
     */
}
