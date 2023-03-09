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
    'jquery',
    'mage/utils/wrapper',
    'Aceextensions_OneStepCheckout/js/action/set-payment-method'
], function ($, wrapper, setPaymentMethodAction) {
    'use strict';

    return function (originalSetPaymentMethodAction) {
        /** Override place-order-mixin for set-payment-information action as they differs only by method signature */
        return wrapper.wrap(originalSetPaymentMethodAction, function (originalAction, messageContainer) {
            return setPaymentMethodAction(messageContainer);
        });
    };
});
