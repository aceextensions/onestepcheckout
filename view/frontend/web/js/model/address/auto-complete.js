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
    'Aceextensions_OneStepCheckout/js/model/address/type/google'
], function (googleAutoComplete) {
    'use strict';

    var addressType = {
        billing: 'checkout.steps.billing-step.billingAddress.billing-address-fieldset',
        shipping: 'checkout.steps.shipping-step.shippingAddress.shipping-address-fieldset'
    };

    return {
        register: function (type) {
            if (addressType.hasOwnProperty(type)) {
                switch (window.checkoutConfig.mageConfig.autocomplete.type) {
                    case 'google':
                        new googleAutoComplete(addressType[type]);
                        break;
                    case 'pca':
                        break;
                    default :
                        break;
                }
            }
        }
    };
});


