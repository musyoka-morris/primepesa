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
