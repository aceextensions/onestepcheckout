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
    'Magento_Checkout/js/view/shipping-address/address-renderer/default',
    'Magento_Checkout/js/model/shipping-rate-service'
], function (Component, shippingRateService) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Aceextensions_OneStepCheckout/address/shipping/address-renderer/default'
        },

        /** Set selected customer shipping address  */
        selectAddress: function () {
            if (!this.isSelected()) {
                this._super();

                shippingRateService.estimateShippingMethod();
            }
        }
    });
});
