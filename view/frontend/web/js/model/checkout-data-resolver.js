/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define(
    [
        'Magento_Checkout/js/checkout-data'
    ],
    function (checkoutData) {
        'use strict';

        return {

            /**
             * Set default shipping method to local storage
             */
            resolveDefaultShippingMethod: function () {
                if (!checkoutData.getSelectedShippingRate() && window.checkoutConfig.selectedShippingRate) {
                    checkoutData.setSelectedShippingRate(window.checkoutConfig.selectedShippingRate);
                }
            },

            /**
             * Set default payment method to local storage
             */
            resolveDefaultPaymentMethod: function () {
                if (!checkoutData.getSelectedPaymentMethod() && window.checkoutConfig.selectedPaymentMethod) {
                    checkoutData.setSelectedPaymentMethod(window.checkoutConfig.selectedPaymentMethod);
                }
            }
        }
    }
);
