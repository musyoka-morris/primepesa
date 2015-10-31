# primepesa
Open source Apis for PrimePesa merchant acounts <br/>
https://www.primepesa.com

#Get balance

```php
use primepesa\Balance;

$secretKey = '59D4627DB7D04FC59B0DB043D2C635BC';
$bal = new Balance($secretKey);
$bal->execute();
$myBalance = $bal->getAmount(); #Double
$myCurrency = $bal->getCurrency(); #iso currency code
/**
 * Perform your operations here
 */
```

#Handle IPN Notification
```php
use primepesa\IPNNotification;

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
```

#Exceptions
#1. PrimePesaException
This exception is thrown if the servers sent an error response. 
It is mostly caused by an invalid secret key.

#2. Exception
This happens if a system error occured while sending CURL request.
