use primepesa\IPNNotification;
use primepesa\PrimePesaException;

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
