/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
define([
    'mage/storage',
    'Aceextensions_OneStepCheckout/js/model/resource-url-manager',
    'Magento_Checkout/js/model/quote'
], function (storage, resourceUrlManager, quote) {
    'use strict';

    return function (email) {
        return storage.post(
            resourceUrlManager.getUrlForCheckIsEmailAvailable(quote),
            JSON.stringify({
                customerEmail: email
            }),
            true
        );
    };

});
