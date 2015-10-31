# primepesa
Open source Apis for PrimePesa merchant acounts

Examples:

#Check account balance
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

#Handle IPN Notifications
#This code should be placed in the page you have set as IPN Listener on your merchant account dashboard
try {
    $secretKey = '59D4627DB7D04FC59B0DB043D2C635BC';
    $ipn = new IPNNotification($secretKey);
    if ( $ipn->isAuthentic() ) {
        $data = $ipn->getData();
        /**
         * Perform your operations here
         * Data is an array containing all IPN Notification fields
         * @visit https://www.primepesa.com/docs#ipn_notifications
         */
    } else {
        /**
         * The IPN Notification was not sent from PrimePesa servers
         */
    }
} catch (PrimePesaException $e) {
    /**
     * PrimePesa servers sent back an error response
     * This is probably caused by an invalid secret key
     * @Handle the error
     */
} catch (\Exception $e) {
    /**
     * An error occurred while executing curl request
     * @Handle the exception
     */
}
